<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\CategoryGroup;
use Livewire\Component;
use Livewire\WithPagination;

class CategoryGroupTable extends Component
{
    use WithPagination;

    public function render()
    {
        $groups = CategoryGroup::with(['categories', 'categories.products'])
            ->withCount(['products'])
            ->paginate(5);
        return view('livewire.category-group-table', compact('groups'));
    }

    public function destroy_category(Category $category)
    {
        $category->delete();
    }
}
