<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreClientRequest;
use App\Models\Client;
use App\Models\Transaction;
use Gloudemans\Shoppingcart\Facades\Cart;

class CreateClientController extends Controller
{
    public function create()
    {
        $cart_items = Cart::content();

        if(!$cart_items->count()){
            return redirect()->route('landing');
        }

        return view("clients.create", compact('cart_items'));
    }

    public function store(StoreClientRequest $request)
    {
        $req = $request->validated();

        $client = Client::create([
            'name' => $req['name'],
            'address' => $req['address'] . '. ' . $req['city'],
            'phone' => $req['phone']
        ]);

        $transaction = Transaction::create([
            'client_id' => $client->id,
            'final_price' => (int) Cart::subtotal(0, '', ''),
            'buy_order' => now()->format("Ymdhis")
        ]);

        return redirect()->route('transbank.create')->with('transaction', $transaction);
    }
}
