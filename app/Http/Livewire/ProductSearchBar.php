<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;

class ProductSearchBar extends Component
{

    public $query;
    public $products;

    public function mount()
    {
        $this->query = '';
        $this->products = [];
    }

    public function updatedQuery()
    {
        $this->products = Product::where('product', 'like', '%' . $this->query . '%')
            ->get()
            ->toArray();
    }

    public function render()
    {
        return view('livewire.product-search-bar');
    }
}
