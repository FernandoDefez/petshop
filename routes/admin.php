<?php

use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Http\Controllers\AuthenticatedSessionController;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register admin routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "admin" middleware group. Now create something great!
|
*/

Route::prefix('admin')->middleware('theme:admin')->name('admin.')->group(function () {

     Route::view('/home', 'home')->middleware('auth:admin')->name('home');

     Route::get('/login', function () {
          return view('auth.login');
     })->middleware('guest:admin')->name('login');

     $limiter = config('fortify.limiters.login');
     Route::post('/login', [AuthenticatedSessionController::class, 'store'])
          ->middleware(array_filter([
               'guest:admin',
               $limiter ? 'throttle:' . $limiter : null,
          ]));

     Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
          ->middleware('auth:admin')
          ->name('logout');
});