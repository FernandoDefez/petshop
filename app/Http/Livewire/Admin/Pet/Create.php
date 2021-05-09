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

    /*
     * Validation rules
     */
    protected $rules = [
        'pet' => 'required|min:3|max:20',
        'image' => 'required|image|max:5120'
    ];

    public function mount(){
        $this->input_id = rand();
    }

    public function updated($propertyName){
        $this->validateOnly($propertyName);
    }

    /*
     * @method store() store a newly pet
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

    /*
     * @method resetModal() reset the modal after creating a pet
     */
    public function resetModal()
    {
        $this->reset(['pet', 'image']);
        $this->input_id = rand();
    }

    /*
     * @method render() renders the modal for creating a new pet
     */
    public function render()
    {
        return view('livewire.admin.pet.create');
    }
}
