<?php

namespace App\Http\Livewire;

use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;

class ShoppingCart extends Component
{
    public function render()
    {
        $products = Cart::content();
        $total = Cart::subtotal(0);
        return view('livewire.shopping-cart', compact('products','total'));
    }

    public function remove_from_cart(String $rowId)
    {
        Cart::remove($rowId);
        $this->emit('cart_updated');
    }


}
