<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

use App\Models\Product;
use App\Models\Pet;
use App\Models\Category;
use Illuminate\Support\Facades\App;

class HomeController extends Controller
{
    /**
     * Display a listing of the products based on their category they belong.
     * @param string $selected_pet
     * @param string $selected_category
     * @return \Illuminate\Http\Response
     */
    public function index(string $selected_pet, string $selected_category)
    {
        $petModel = new Pet;
        $pets = $petModel::all();

        $pet = $petModel->where('name', $selected_pet)->get()->first();

        $category = $pet->categories()->where('name', $selected_category)->get()->first();

        $products = $category->products()->paginate(25);

        $categoryModel = new Category;
        $categories = $categoryModel::all();


        return view('home', [
            'selected_pet' => $selected_pet, 'selected_category' => $selected_category,
            'pets' => $pets, 'categories' => $categories, 'products' => $products,
            'pet' => $pet, 'category' => $category
        ]);
    }

    /**
     * Display the product page base on its slug.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function show(string $slug)
    {
        $productModel = new Product;
        $featured_products = $productModel::all()->sortByDesc('created_at')->take(10);
        $product = $productModel->where('slug', $slug)->get()->first();

        $categoryModel = new Category;
        $categories = $categoryModel::all();
        $category = $categoryModel->where('id', $product->category_id)->get()->first();


        $petModel = new Pet;
        $pets = $petModel::all();
        $pet = $petModel->where('id', $category->pet_id)->get()->first();

        return view('product-page', [
            'selected_pet' => $pet->name, 'selected_category' => $category->name, 'product' => $product,
            'pets' => $pets, 'categories' => $categories, 'featured_products' => $featured_products
        ]);
    }
}
