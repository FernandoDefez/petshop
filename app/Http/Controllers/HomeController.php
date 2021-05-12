<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;


class HomeController extends Controller
{
    /**
     * Display a listing of the products based on their category they belong.
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        $pets = DB::table('pets')->get();
        $categories = DB::table('categories')->get();
        $products = DB::table('products')->paginate(20);

        return view('home', [
            'selected_pet' => '',
            'selected_category' => '',
            'pets' => $pets,
            'categories' => $categories,
            'products' => $products
        ]);
    }
}
