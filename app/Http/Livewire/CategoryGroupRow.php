<?php

namespace App\Http\Livewire;

use App\Models\Category;
use Livewire\Component;

class CategoryGroupRow extends Component
{
    public Category $category;
    public int $iteration;

    public function render()
    {
        return view('livewire.category-group-row');
    }
}
