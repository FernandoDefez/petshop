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

    /**
     * Declaring the validation rules
     */
    protected $rules = [
        'pet_id' => 'required|integer',
        'category' => 'required|min:3|max:20'
    ];

    /**
     * Check validation rules for all the values
     */
    public function updated($propertyName){
        $this->validateOnly($propertyName);
    }

    /**
     * Store a newly category
     */
    public function store()
    {
        $this->validate();

        Category::create([
            'name' => $this->category,
            'pet_id' => $this->pet_id
        ]);

        $this->resetModal();
        $this->emit('refresh-categories-table');
        $this->emit('category-created-alert', "Category created successfully");
    }

    /**
     * Reset the values so the modal can show empty values on the inputs
     */
    public function resetModal()
    {
        $this->reset(['pet_id', 'category']);
    }

    /**
     * The view rendered by the Create Component.
     *
     * This view is located in the following directory resources/views/livewire/admin/category
     *
     * @return view
     */
    public function render()
    {
        $this->pets = Pet::all();
        return view('livewire.admin.category.create', compact($this->pets));
    }
}
