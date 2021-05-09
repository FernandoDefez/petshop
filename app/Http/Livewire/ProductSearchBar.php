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
        $this->products = Product::where('name', 'like', '%' . $this->query . '%')
            ->take(4)
            ->get()
            ->toArray();
    }

    public function render()
    {
        return view('livewire.product-search-bar');
    }
}
