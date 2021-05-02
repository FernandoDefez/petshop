<?php

namespace App\Http\Livewire\Admin\Category;

use Livewire\Component;
use App\Models\Pet;
use App\Models\Category;

class CategoriesTable extends Component
{
    public $categories;

    protected $listeners = [
        'refresh_categories_table' => 'render'
    ];

    public function render()
    {
        $this->categories = Pet::select(
            'categories.id',
            'categories.category_name',
            'pets.pet_name',
            'categories.created_at',
            'categories.updated_at'
        )->join('categories', 'pets.id', '=', 'categories.pet_id')->get();

        return view('livewire.admin.category.categories-table', compact($this->categories));
    }
}
