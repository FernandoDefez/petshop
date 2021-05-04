<?php

namespace App\Http\Livewire\Admin\Product;

use Livewire\Component;
use App\Models\Pet;
use App\Models\Category;
use App\Models\Product;

class ProductsTable extends Component
{
    public $products;

    protected $listeners = [
        'refresh_products_table' => 'render'
    ];

    public function render()
    {
        $this->products = Category::select(
            'products.id',
            'products.img',
            'products.product',
            'products.description',
            'products.price',
            'pets.pet_name',
            'categories.category_name'
        )->join('products', 'categories.id', '=', 'products.category_id')->join('pets', 'pets.id', '=', 'categories.pet_id')->orderBy('id', 'desc')->get();

        return view('livewire.admin.product.products-table', compact($this->products));
    }
}
