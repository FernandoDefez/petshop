<?php

namespace App\Http\Livewire\Admin\Category;

use Livewire\Component;
use App\Models\Pet;
use App\Models\Category;

class Create extends Component
{
    public $pets;
    public $pet_id;
    public $category;

    protected $rules = [
        'pet_id' => 'required|integer',
        'category' => 'required|min:3|max:20'
    ];

    public function updated($propertyName){
        $this->validateOnly($propertyName);
    }

    public function store()
    {
        $this->validate();

        Category::create([
            'category_name' => $this->category,
            'pet_id' => $this->pet_id
        ]);

        $this->resetModal();
        $this->emit('refresh_categories_table');
        $this->emit('category_created_alert', "Category created succesfully");
    }

    public function resetModal()
    {
        $this->reset(['pet_id', 'category']);
    }

    public function render()
    {
        $this->pets = Pet::all();
        return view('livewire.admin.category.create', compact($this->pets));
    }
}
