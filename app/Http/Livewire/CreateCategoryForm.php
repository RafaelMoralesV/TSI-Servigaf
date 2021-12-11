<?php

namespace App\Http\Livewire;

use App\Models\Category;
use Livewire\Component;

class CreateCategoryForm extends Component
{
    public $groupId;
    public $category_name;
    public $background;

    public function render()
    {
        return view('livewire.create-category-form');
    }

    public function create_category()
    {
        Category::create(['category_group_id' => $this->groupId, 'name' => $this->category_name]);
    }
}
