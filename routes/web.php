<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;

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

Route::middleware(['auth'])->group(function () {
    Route::get('product', [ProductController::class, 'index'])->name('productIndex');
    Route::get('create', [ProductController::class, 'create'])->name('productCreate');
    Route::post('createPost', [ProductController::class, 'add'])->name('productAdd');
    Route::get('product-edit/{id}', [ProductController::class, 'edit'])->name('productEdit');
    Route::post('product-edit/{id}', [ProductController::class, 'update'])->name('productUpdate');
    Route::get('product-delete/{id}', [ProductController::class, 'delete'])->name('productDelete');
});

Route::middleware(['auth'])->group(function () {
    
    Route::get('cart-store', [CartController::class, 'store'])->name('cartStore');

});

Route::get('products', [CartController::class, 'product_all'])->name('productAll');
Route::get('add-to-cart/{id}', [CartController::class, 'addtocart'])->name('addToCart');
Route::get('cart', [CartController::class, 'cart'])->name('cart');
Route::patch('cart-update', [CartController::class, 'cart_update'])->name('cartUpdate');
Route::delete('cart-remove', [CartController::class, 'cart_remove'])->name('cartRemove');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/logout', [App\Http\Controllers\HomeController::class, 'logout'])->name('authLogout');
