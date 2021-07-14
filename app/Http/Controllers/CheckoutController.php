<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class CheckoutController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->user()){

            $shipping_cost = 95.00;

            $amount = Product::select([
                'carts.total_price',
                'products.id',
                'products.name',
            ])->join('carts', 'carts.product_id', '=', 'products.id')
                ->where('carts.user_id', '=', auth()->user()->getAuthIdentifier())
                ->sum('carts.total_price');

            return view('checkout', [
                'subtotal' => $amount,
                'shipping_cost' => $shipping_cost,
                'total' => $shipping_cost + $amount
            ]);
        }
        return redirect()->route('home');
    }
}
