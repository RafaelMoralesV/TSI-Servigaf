<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CartCounter extends Component
{
    protected $listener = ['cart_updated  '=> 'render'];

    public function render()
    {
        $cart_count = Cart::content()->count();

        return view('livewire.cart-counter', compact('$cart_count'));
    }
}
