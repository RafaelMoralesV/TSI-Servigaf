<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommitTransactionRequest;
use App\Models\Client;
use App\Models\Product;
use App\Models\Transaction;
use App\Services\InvoiceService;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Session;
use Transbank\Webpay\WebpayPlus;

class TransbankController extends Controller
{
    public function __construct()
    {
        if (app()->environment('production')) {
            WebpayPlus::configureForProduction(config('services.transbank.webpay_plus_cc'), config('services.transbank.webpay_plus_api_key'));
        } else {
            WebpayPlus::configureForTesting();
        }
    }

    public function createdTransaction()
    {
        if(Session::missing('transaction'))
        {
            return redirect()->route('mostrar_carro')->withErrors(['Transactionless'=>'Ha ocurrido un error en la transacción']);
        }
        $transaction = Session::get('transaction');

        $resp = WebpayPlus::transaction()
            ->build()
            ->create(
                $transaction->buy_order,
                Session::getId(),
                $transaction->final_price,
                route('transbank.returnUrl')
            );


        return view('webpayplus/transaction_created', compact('resp'));
    }

    public function commitTransaction(CommitTransactionRequest $request)
    {
        $req = $request->validated();

        if (!$token = $req['token_ws'] ?? null) {
            // Hubo un problema, no se pudo llevar a cabo la transaccion.
            $transaction = Transaction::where('buy_order', $req['TBK_ORDEN_COMPRA'])->first();

            Client::where('id', $transaction->id)->first()->delete();

            $transaction->delete();

            return redirect()->route('mostrar_carro')->withErrors([
                'Transaccion anormal' => 'Ocurrió un error inesperado al momento de procesar la transacción.'
            ]);
        }

        // La transaccion fue llevada exitosamente
        $resp = WebpayPlus::transaction()->commit($token);

        if (!$resp->isApproved()) {
            // La transaccion no fue aprobada.
            return redirect()->route('mostrar_carro')->withErrors([
                'Aprobacion' => 'La compra no fue aprobada por tu banco.'
            ]);
        }

        Transaction::where('buy_order', $resp->getBuyOrder())->update(['was_payed' => true]);

        foreach(Cart::content() as $product){
            $aux = Product::where('id',$product->id)->first();
            $aux->stock = ($aux->stock - $product->qty );
            $aux->save();
        }

        Cart::destroy();

        return redirect()->route('transbank.finished');
    }
}
