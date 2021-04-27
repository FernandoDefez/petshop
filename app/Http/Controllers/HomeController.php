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
     * Display a listing of the resource.
     * @param string $selected_pet
     * @param string $selected_category
     * @return \Illuminate\Http\Response
     */
    public function index(string $selected_pet, string $selected_category)
    {
        $petModel = new Pet;
        $pets = $petModel::all();

        $pet = $petModel->where('pet_name', $selected_pet)->get()->first();

        $category = $pet->categories()->where('category_name', $selected_category)->get()->first();

        $products = $category->products()->get();

        $categoryModel = new Category;
        $categories = $categoryModel::all();


        return view('home', [
            'selected_pet' => $selected_pet, 'selected_category' => $selected_category,
            'pets' => $pets, 'categories' => $categories, 'products' => $products,
            'pet' => $pet, 'category' => $category
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function show(string $slug)
    {
        $productModel = new Product;
        $products = $productModel::all()->take(5);
        $product = $productModel->where('slug', $slug)->get()->first();

        $categoryModel = new Category;
        $categories = $categoryModel::all();
        $category = $categoryModel->where('id', $product->category_id)->get()->first();

        $petModel = new Pet;
        $pets = $petModel::all();
        $pet = $petModel->where('id', $category->pet_id)->get()->first();

        return view('show-product', [
            'selected_pet' => '', 'selected_category' => '',
            'pets' => $pets, 'categories' => $categories, 'products' => $products,
            'pet' => $pet, 'category' => $category, 'product' => $product
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
