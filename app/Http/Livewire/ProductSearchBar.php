<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;

class ProductSearchBar extends Component
{

    /**
     * The variables for this component. Which will be rendered everytime the DOM get changed
     */
    public $query;
    public $products;

    /**
     * The ProductSearchBar's init/constructor method.
     */
    public function mount()
    {
        $this->query = '';
        $this->products = [];
    }

    /**
     * The updated method for the user query.
     */
    public function updatedQuery()
    {
        $this->products = Product::where('name', 'like', '%' . $this->query . '%')
            ->take(4)
            ->get()
            ->toArray();
    }

    /**
     * The view rendered by the ProductSearchBar Component.
     *
     * This view is located in the following directory resources/views/livewire/
     *
     * @return view
     */
    public function render()
    {
        return view('livewire.product-search-bar');
    }
}
