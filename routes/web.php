<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AddressController;
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

Route::get('cart', [CartController::class, 'index'])->name('cart');
Route::post('cart', [CartController::class, 'store'])->name('cart');

Route::get('profile', [ProfileController::class, 'index'])->name('profile');
Route::post('address', [AddressController::class, 'store'])->name('address');

Route::get('logout', function (){ return redirect(''); })->name('logout');

Route::get('checkout', function (){ return view('checkout'); })->name('checkout');
Route::post('checkout', function (){ return view('checkout'); })->name('checkout');

Route::get('products/{pet}/{category}', [ShopController::class, 'index'])->name('products');

Route::get('product/{product}', [ShopController::class, 'show'])->name('product');

require __DIR__ . '/admin.php';
