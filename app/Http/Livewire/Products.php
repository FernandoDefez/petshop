<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\User;
use App\Models\Product;
use App\Models\Cart;

class Products extends Component
{
    use WithPagination;

    public $products;
    public $links;

    /**
     * The Products' init/constructor method.
     */
    public function mount($products)
    {
        $this->products = $products;
    }

    /**
     * This attributes that contains the product ID, so it can be stored in the user cart.
     *
     * @int $product_id
     */
    public function store($product_id)
    {
        $cart = Cart::create([
            'user_id' => auth()->user()->getAuthIdentifier(),
            'product_id' =>  $product_id
        ]);

    }


    /**
     * The view rendered by the Products Component.
     *
     * This view is located in the following directory resources/views/livewire/
     *
     * @return view
     */
    public function render()
    {
        $links = $this->products->links();
        $products = collect($this->products->items());
        return view('livewire.products', ['products' => compact($products), 'links' => $links]);
    }
}
