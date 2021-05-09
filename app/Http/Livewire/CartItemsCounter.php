<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Cart;

class CartItemsCounter extends Component
{
    public $cart_items_counter = 0;

    protected $listeners = [
        'refresh-cart-items-counter' => 'render'
    ];

    public function render()
    {
        if (auth()->user())
        {
            $this->cart_items_counter = Cart::where('user_id', '=', auth()->user()->getAuthIdentifier())->count();
        }

        return view('livewire.cart-items-counter', compact((int) $this->cart_items_counter));
    }

}