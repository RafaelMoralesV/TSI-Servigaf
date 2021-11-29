<?php

namespace App\Http\Livewire;

use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;

class ShoppingCart extends Component
{
    public function render()
    {
        $products = Cart::content();
        return view('livewire.shopping-cart', compact('products'));
    }

    public function remove_from_cart(String $rowId)
    {
        Cart::remove($rowId);
    }
}
