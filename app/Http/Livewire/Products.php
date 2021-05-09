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

    public function mount($products)
    {
        $this->products = $products;
    }

    /**
     * This function renders livewire.products view when suffers changes.
     *
     * @method render
     */
    public function render()
    {
        $links = $this->products->links();
        $products = collect($this->products->items());
        return view('livewire.products', ['products' => compact($products), 'links' => $links]);
    }


    /**
     * This attributes that contains the product id so it can be stored in the user cart.
     *
     * @int $product_id
     * @method store
     */
    public function store($product_id)
    {
        $cart = Cart::create([
            'user_id' => auth()->user()->getAuthIdentifier(),
            'product_id' =>  $product_id
        ]);

    }
}
