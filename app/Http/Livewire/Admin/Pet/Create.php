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

    public function store()
    {
        $this->validate();

        $image = $this->image->store('pets');

        //It's saved as pet/image.png, in order to split that string out and take the image name. I use explode() method
        $image = explode ("/", $image);

        Pet::create([
            'pet_name' => $this->pet,
            'img' => $image[1]
        ]);

        $this->reset(['pet', 'image']);
        $this->input_id = rand();
        $this->emit('refresh_pets_table');
        $this->emit('pet_created_alert', "Pet created succesfully");
    }

    public function resetModal()
    {
        $this->reset(['pet', 'image']);
        $this->input_id = rand();
    }

    public function render()
    {
        return view('livewire.admin.pet.create');
    }
}
