<?php

namespace App\Http\Livewire\Admin\Category;

use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use App\Models\Pet;
use App\Models\Category;
use App\Models\Product;

class CategoriesTable extends Component
{
    public $categories;

    /**
     * The listeners waiting for being emitted
     */
    protected $listeners = [
        'refresh-categories-table' => 'render',
        'delete-category' => 'destroy'
    ];

    /**
     * Removes a category from the database based on its ID
     *
     * @var payload
     */
    public function destroy($payload)
    {
        $id = $payload['id'];
        $category = Category::find($id);

        $products = Product::select(
            'products.img',
            'products.category_id'
        )->join('categories', 'categories.id', '=', 'products.category_id')
            ->join('pets', 'pets.id', '=', 'categories.pet_id')->where('products.category_id', '=', $category->id)
            ->get();

        foreach ($products as $product){
            Storage::delete('products/'.$product->img);
        }

        $category->delete();
        $this->render();
    }

    /**
     * The view rendered by the CategoriesTable Component.
     *
     * This view is located in the following directory resources/views/livewire/admin/pet
     *
     * @return view
     */
    public function render()
    {
        $this->categories = Category::select(
            'categories.id',
            'categories.name as cat_name',
            'pets.name as pet_name'
        )->join('pets', 'pets.id', '=', 'categories.pet_id')->get();

        return view('livewire.admin.category.categories-table', compact($this->categories));
    }

}
