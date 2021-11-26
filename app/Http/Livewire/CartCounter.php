<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartCounter extends Component
{
    protected $listeners = ['cart_updated'=> 'render'];

    public function render()
    {
        $cart_count = Cart::content()->count();

        return view('livewire.cart-counter', compact('cart_count'));
    }
}
