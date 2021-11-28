<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;


class Counter extends Component
{
    public $count = 0;
    public Product $product;
    public $errorMessage;

    public function increment()
    {
        if ($this->product->stock > $this->count) {
            $this->count++;
        }
    }

    public function decrement()
    {
        if ($this->count > 0) {
            $this->count--;
        }
    }

    public function render()
    {
        $cart = Cart::content();

        return view('livewire.counter', compact('cart'));
    }

    public function addToCart()
    {
        if($this->product->stock < $this->count){
            $this->count = $this->product->stock;
        }

        if($this->count <= 0){
            $this->errorMessage = "La cantidad elegida es invalida.";
            return;
        }

        Cart::add(
            $this->product->id,
            $this->product->name,
            $this->count,
            $this->product->price,
        )->associate('Product');

        $this->emit('cart_updated');
    }
    public function removeFromCart(String $rowid)
    {   
        Cart::remove($rowid);
    }
}
