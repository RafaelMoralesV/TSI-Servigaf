<?php

namespace App\Http\Controllers;

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Session;
use Transbank\Webpay\WebpayPlus;

class TransbankController extends Controller
{
    public function __construct(){
        if (app()->environment('production')) {
            WebpayPlus::configureForProduction(config('services.transbank.webpay_plus_cc'), config('services.transbank.webpay_plus_api_key'));
        } else {
            WebpayPlus::configureForTesting();
        }
    }

    public function createdTransaction(Request $request)
    {
        $buy_order = now()->format("Ymdhis");
        $session_id = Session::getId();
        $amount = (int) Cart::subtotal(0, '', '');
        $return_url = route('transbank.returnUrl');

        $resp = WebpayPlus::transaction()
            ->build()
            ->create($buy_order, $session_id, $amount, $return_url);

        return view('webpayplus/transaction_created', compact('resp'));
    }

    public function commitTransaction(Request $request)
    {
        $req = $request->except('_token');
        $resp = WebpayPlus::transaction()->commit($req["token_ws"]);

        return view('webpayplus/transaction_committed', compact('req', 'resp'));
    }
}
