<?php

namespace App\Http\Livewire\Admin\Pet;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Pet;

class Create extends Component
{
    use WithFileUploads;

    public $pet;
    public $image;
    public $input_id;

    /**
     * Declaring the validation rules
     */
    protected $rules = [
        'pet' => 'required|min:3|max:20',
        'image' => 'required|image|max:5120'
    ];

    /**
     * The Create Component's constructor.
     */
    public function mount(){
        $this->input_id = rand();
    }

    /**
     * Check validation rules for all the values
     */
    public function updated($propertyName){
        $this->validateOnly($propertyName);
    }

    /**
     * Store a newly pet
     */
    public function store()
    {
        $this->validate();

        $image = $this->image->store('pets');

        //It's saved as pet/image.png, in order to split that string out and take the image name. I use explode() method
        $image = explode ("/", $image);

        Pet::create([
            'name' => $this->pet,
            'img' => $image[1]
        ]);

        $this->reset(['pet', 'image']);
        $this->input_id = rand();
        $this->emit('refresh-pets-table');
        $this->emit('pet-created-alert', "Pet created successfully");
    }

    /**
     * Reset the values so the modal can show empty values on the inputs
     */
    public function resetModal()
    {
        $this->reset(['pet', 'image']);
        $this->input_id = rand();
    }

    /**
     * The view rendered by the Create Component.
     *
     * This view is located in the following directory resources/views/livewire/admin/pet
     *
     * @return view
     */
    public function render()
    {
        return view('livewire.admin.pet.create');
    }
}
