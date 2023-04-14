<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\ProductController;
use App\Http\Controllers\api\CartController;
use App\Http\Controllers\api\OrderController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/


Route::controller(ProductController::class)->group( function(){
    Route::post('/store-product', 'store_product')->name('store-product');
});

Route::controller(CartController::class)->group(function () {
    Route::any('/add-cart', 'add_to_cart')->name('add-cart');
});


Route::controller(OrderController::class)->group(function () {
    Route::post('/checkout-cart', 'checkout')->name('checkout-cart');
});