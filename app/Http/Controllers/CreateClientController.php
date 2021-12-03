<?php

namespace App\Http\Controllers;

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

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

    public function store(Request $request)
    {

    }
}
