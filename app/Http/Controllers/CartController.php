<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\User;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display the cart's items user
     */
    public function index()
    {
        return view('cart');
    }

    /**
     * Store a newly product in the user cart.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function store(Request $request)
    {
        $user = User::find(auth()->user()->getAuthIdentifier());

        $user->products()->detach($request->product_id);
        $user->products()->attach($request->product_id, ['total_price' => $request->product_price]);

        return redirect()->route('cart');
    }

    public function view()
    {
        if (auth()->user()) {
            $user = User::find(auth()->user()->getAuthIdentifier());
            $items = Product::select([
                'carts.quantity',
                'products.id',
                'products.availability',
            ])->join('carts', 'carts.product_id', '=', 'products.id')
                ->where('carts.user_id', '=', $user->id)->get();


            foreach ($items as $item){
                Product::where('id', '=', $item->id)->decrement('availability', $item->quantity);
            }
        }
    }
}
