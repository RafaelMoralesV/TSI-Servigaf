<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;

class Counter extends Component
{
    public $count = 0;
    public Product $product;
 
    public function increment()
    {  
        if($this->product->stock > $this->count){
        $this->count++;
        }
    }
    public function decrement()
    {  
        if($this->count > 0){
        $this->count--;
        }
    }
 
    public function render()
    {
        return view('livewire.counter');
    }
}
