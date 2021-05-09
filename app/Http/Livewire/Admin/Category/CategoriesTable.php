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

    /*
     * Listeners waiting for being emitted
     */
    protected $listeners = [
        'refresh-categories-table' => 'render',
        'delete-category' => 'destroy'
    ];

    /*
     * @method render() shows the categories
     */
    public function render()
    {
        $this->categories = Category::select(
            'categories.id',
            'categories.name',
            'pets.name',
            'categories.created_at',
            'categories.updated_at'
        )->join('pets', 'pets.id', '=', 'categories.pet_id')->get();

        return view('livewire.admin.category.categories-table', compact($this->categories));
    }


    /**
     * @array payload contains the id that comes from the frontend,
     * specifically from the view Themes\Admin\categories.blade.php
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
}
