<?php

namespace App\Http\Livewire\Admin\Pet;

use Livewire\Component;
use App\Models\Pet;

class CreatePet extends Component
{
    public $pet = '';
    public $img_path = 'default.png';

    public function store()
    {
        Pet::create([
            'pet_name' => $this->pet,
            'img_path' => $this->img_path
        ]);

        $this->emit('refresh_pets_table');
    }

    public function render()
    {
        return view('livewire.admin.pet.create-pet');
    }
}
