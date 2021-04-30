<?php

namespace App\Http\Livewire\Admin\Pet;
use App\Models\Pet;
use Livewire\Component;

class PetsTable extends Component
{
    public $pets;

    protected $listeners = [
        'refresh_pets_table' => 'render'
    ];

    public function render()
    {
        $this->pets = Pet::all();
        return view('livewire.admin.pet.pets-table', compact($this->pets));
    }
}
