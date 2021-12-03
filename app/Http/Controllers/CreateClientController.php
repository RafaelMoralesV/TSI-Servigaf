<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreClientRequest;
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

        return redirect()->route('transbank');
    }
}
