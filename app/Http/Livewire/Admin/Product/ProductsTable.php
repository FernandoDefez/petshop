<?php

namespace App\Http\Livewire\Admin\Product;

use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use App\Models\Pet;
use App\Models\Category;
use App\Models\Product;

class ProductsTable extends Component
{
    public $products;

    protected $listeners = [
        'refresh-products-table' => 'render',
        'delete-product' => 'destroy'
    ];

    public function render()
    {
        $this->products = Product::select(
            'products.id',
            'products.img',
            'products.name',
            'products.description',
            'products.price',
            'pets.name',
            'categories.name'
        )->join('categories', 'categories.id', '=', 'products.category_id')
            ->join('pets', 'pets.id', '=', 'categories.pet_id')
            ->orderBy('id', 'desc')
            ->paginate(15);

        $links = $this->products;
        $this->products = collect($this->products->items());

        return view('livewire.admin.product.products-table', ['products' => compact($this->products), 'links' => $links]);
    }

    public function destroy($payload)
    {
       $id = $payload['id'];
       $product = Product::find($id);
       $product->delete();
       Storage::delete('products/'.$product->img);
       $this->render();
    }
}
