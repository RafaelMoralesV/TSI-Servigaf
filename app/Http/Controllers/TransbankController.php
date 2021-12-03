<?php

namespace App\Http\Controllers;

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Session;
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

    public function commitTransaction(Request $request)
    {
        $req = $request->except('_token');
        $resp = WebpayPlus::transaction()->commit($req["token_ws"]);

        return view('webpayplus/transaction_committed', compact('req', 'resp'));
    }
}
