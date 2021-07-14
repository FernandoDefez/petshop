<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\CheckoutController;

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

Route::get('/cart', [CartController::class, 'index'])->middleware('auth')->name('cart');
Route::get('/cart/view', [CartController::class, 'view'])->middleware('auth')->name('cart');
Route::post('/cart', [CartController::class, 'store'])->middleware('auth')->name('cart');

Route::get('/profile', [ProfileController::class, 'index'])->middleware('auth')->name('profile');

Route::get('/logout', function (){ return redirect('home'); })->name('logout');

Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout');

Route::get('/products/{pet}/{category}', [ShopController::class, 'index'])->name('products');

Route::get('/product/{product}', [ShopController::class, 'show'])->name('product');

Route::get('/paypal/payment', [PaymentController::class, 'paypalPaymentRequest'])->middleware('auth')->name('paypal.payment');
Route::get('/paypal/checkout/{status}', [PaymentController::class, 'paypalCheckout'])->middleware('auth')->name('paypal.checkout');

require __DIR__ . '/admin.php';
