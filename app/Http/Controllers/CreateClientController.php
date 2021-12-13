<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreClientRequest;
use App\Models\Client;
use App\Models\Order;
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
            'phone' => $req['phone'],
            'email' => $req['email'],
        ]);

        $transaction = Transaction::create([
            'client_id' => $client->id,
            'final_price' => (int) Cart::subtotal(0, '', '')+3000, //precio de envio
            'buy_order' => now()->format("Ymdhis")
        ]);

        foreach(Cart::content() as $product){
            Order::create([
                'transaction_id' => $transaction->id,
                'product_id' => $product->id,
                'amount' => $product->qty,
                'total_price' => $product->qty * $product->price,
            ]);
        }
        session(['transaction'=>$transaction]);
        return redirect()->route('transbank.create');
    }
}
