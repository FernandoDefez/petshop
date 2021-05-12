<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Pet;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     * @param string $selected_pet
     * @param string $selected_category
     * @return \Illuminate\Contracts\View\View
     */
    public function index(String $selected_pet, String $selected_category)
    {
        $petModel = new Pet;
        $pets = $petModel::all();

        $pet = $petModel->where('name', $selected_pet)->get()->first();

        $category = $pet->categories()->where('name', $selected_category)->get()->first();

        $products = $category->products()->paginate(25);

        $categoryModel = new Category;
        $categories = $categoryModel::all();

        return view('home', [
            'selected_pet' => $selected_pet,
            'selected_category' => $selected_category,
            'pets' => $pets,
            'categories' => $categories,
            'products' => $products,
            'pet' => $pet,
            'category' => $category
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
     * Display the product page base on its slug.
     *
     * @param  string  $slug
     * @return \Illuminate\Contracts\View\View
     */
    public function show(string $slug)
    {
        $pets = DB::table('pets')->get();
        $categories = DB::table('categories')->get();
        $mayAlsoLike = Product::where('slug', '!=', $slug)->inRandomOrder()->take(10)->get();

        $product = DB::table('products')->where('slug', '=', $slug)->get()->first();
        $category = Category::where('id', $product->category_id)->get()->first();
        $pet = Pet::where('id', $category->pet_id)->get()->first();

        return view('product-page', [
            'selected_pet' => $pet->name,
            'selected_category' => $category->name,
            'product' => $product,
            'pets' => $pets,
            'categories' => $categories,
            'mayAlsoLike' => $mayAlsoLike
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
