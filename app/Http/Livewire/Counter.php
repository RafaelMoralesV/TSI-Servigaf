<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;


class Counter extends Component
{
    public $count;
    public $message;
    public Product $product;

    public function mount()
    {
        $this->count = Cart::content()->where('id', $this->product->id)->first()->qty ?? 1;
    }

    public function render()
    {
        $is_in_cart = Cart::content()->where('id', $this->product->id)->count();
        $is_in_stock = $this->product->stock > 0;

        if($this->product->stock < $this->count){
            $this->count = $this->product->stock;
        }

        return view('livewire.counter', compact('is_in_cart', 'is_in_stock'));
    }

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

    public function add_to_cart()
    {
        if($this->count <= 0){
            $this->addError('quantity', 'La cantidad deseada no es valida.');
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

    public function update_cart()
    {
        if($this->count <= 0){
            $this->addError('quantity', 'La cantidad deseada no es valida.');
            return;
        }

        $rowId = Cart::content()->where('id', $this->product->id)->first()->rowId;

        Cart::update($rowId, $this->count);
        $this->emit('cart_updated');
    }

    public function delete_from_cart()
    {
        $rowId = Cart::content()->where('id', $this->product->id)->first()->rowId;

        Cart::remove($rowId);
        $this->count = 0;

        $this->emit('cart_updated');
    }
}
