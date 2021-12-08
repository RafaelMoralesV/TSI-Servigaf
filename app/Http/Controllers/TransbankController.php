<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommitTransactionRequest;
use App\Models\Client;
use App\Models\Transaction;
use Illuminate\Http\Request;
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

        if ($token = $req['token_ws'] ?? null) {
            $resp = WebpayPlus::transaction()->commit($token);
            Transaction::where('buy_order', $resp->getBuyOrder())
                ->first()
                ->update(['was_payed' => true]);

            return view('webpayplus/transaction_committed');
        } else {
            $transaction = Transaction::where('buy_order', $req['TBK_ORDEN_COMPRA'])->first();

            Client::where('id', $transaction->id)->first()->delete();

            $transaction->delete();

            return redirect()->route('mostrar_carro');
        }

    }
}
