<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\CartController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/**
 * These are the app routes those that the user is going to see
 */

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('cart', function (){ return view('cart'); })->name('cart');
Route::post('cart', [CartController::class, 'store'])->name('cart');

Route::get('profile', function (){ return view('profile');})->name('profile');

Route::get('checkout', function (){ return view('checkout'); })->name('checkout');

Route::get('products/{pet}/{category}', [ShopController::class, 'index'])->name('products');

Route::get('product/{product}', [ShopController::class, 'show'])->name('product');

require __DIR__ . '/admin.php';
