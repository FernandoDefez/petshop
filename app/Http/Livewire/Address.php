<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\Address as User_Address;

class Address extends Component
{

    public $user_address;
    public $city;
    public $suburb;
    public $add1;
    public $add2;
    public $zip;
    public $phone_number;

    protected $rules = [
        'city' => 'required|min:4',
        'suburb' => 'required|min:4',
        'add1' => 'required|min:6',
        'add2' => 'required|min:6',
        'zip' => 'required|min:4|max:5',
        'phone_number' => 'required|max:12'
    ];

    public function mount()
    {
        $this->user_address = User::find(auth()->user()->getAuthIdentifier())->address()->first();
        if ($this->user_address) {
            $this->city = $this->user_address->city;
            $this->suburb = $this->user_address->suburb;
            $this->add1 = $this->user_address->add1;
            $this->add2 = $this->user_address->add2;
            $this->zip = $this->user_address->zip;
            $this->phone_number = $this->user_address->phone_number;
        }else{
            $this->city = '';
            $this->suburb = '';
            $this->add1 = '';
            $this->add2 = '';
            $this->zip = '';
            $this->phone_number = '';
        }
    }

    public function updated($propertyName){
        $this->validateOnly($propertyName);
    }

    public function store(){
        $this->validate();

        User_Address::updateOrCreate(
            ['user_id' => auth()->user()->getAuthIdentifier()],
            [   
                'city' => $this->city,
                'suburb' => $this->suburb,
                'add1' => $this->add1,
                'add2' => $this->add2,
                'zip' => $this->zip,
                'phone_number' => $this->phone_number
            ]
        );
        $this->mount();
        $this->render();
        $this->emit('address-alert', "Your address has been saved successfully!");
    }

    public function render()
    {
        if (auth()->user()){

            return view('livewire.address', compact($this->user_address));
        }
    }
}
