<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;

class MakeFeatured extends Component
{

    public Product $product;

    protected $rules = [
        "product.is_featured" => 'boolean',
    ];

    public function render()
    {
        $this->validate();
        $this->product->save();

        return view('livewire.make-featured');
    }
}
