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

    /*
     * Validation rules
     */
    protected $rules = [
        'pet_id' => 'required|integer',
        'category' => 'required|min:3|max:20'
    ];

    /*
     * Update when DOM gets changed
     */
    public function updated($propertyName){
        $this->validateOnly($propertyName);
    }

    /*
     * @method store() store a newly category
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

    /*
     * @method resetModal() resets the modal inputs after creating a category
     */
    public function resetModal()
    {
        $this->reset(['pet_id', 'category']);
    }

    /*
     * Renders the available pets so the user can choose wich belongs to this category
     */
    public function render()
    {
        $this->pets = Pet::all();
        return view('livewire.admin.category.create', compact($this->pets));
    }
}
