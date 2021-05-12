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

    /**
     * The listeners waiting for being emitted
     */
    protected $listeners = [
        'refresh-products-table' => 'render',
        'delete-product' => 'destroy'
    ];


    /**
     * The view rendered by the ProductsTable Component.
     *
     * This view is located in the following directory resources/views/livewire/admin/product
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function render()
    {
        $this->products = Product::select(
            'products.id',
            'products.img',
            'products.name',
            'products.description',
            'products.price',
            'products.availability',
            'pets.name as pet_name',
            'categories.name as cat_name'
        )->join('categories', 'categories.id', '=', 'products.category_id')
            ->join('pets', 'pets.id', '=', 'categories.pet_id')
            ->orderBy('id', 'desc')
            ->paginate(15);

        $links = $this->products;
        $this->products = collect($this->products->items());

        return view('livewire.admin.product.products-table', ['products' => compact($this->products), 'links' => $links]);
    }

    /**
     * Removes a product from the database based on its ID
     *
     * @var $payload
     */
    public function destroy($payload)
    {
       $id = $payload['id'];
       $product = Product::find($id);
       $product->delete();
       Storage::delete('products/'.$product->img);
       $this->render();
    }
}
