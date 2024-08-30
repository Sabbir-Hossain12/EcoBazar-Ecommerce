<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\Frontend\CheckoutController;
use App\Http\Controllers\Frontend\OrderController;
use App\Http\Controllers\Frontend\ProductController;
use App\Http\Controllers\Frontend\WebviewController;
use App\Http\Controllers\SslCommerzPaymentController;
use Illuminate\Support\Facades\Route;


//Webview Routes

Route::get('/',[WebviewController::class,'index'])->name('home');

//product routes
Route::get('/product-details/{product:slug}',[ProductController::class,'productDetails'])->name('product-details');
Route::get('/get/price-by-color',[ProductController::class,'getPriceByColor'])->name('get-price-by-color');
Route::get('/get/price-by-size',[ProductController::class,'getPriceBySize'])->name('get-price-by-size');
Route::get('/get/price-by-weight',[ProductController::class,'getPriceByWeight'])->name('get-price-by-weight');

//Cart Routes
Route::resource('/carts',CartController::class)->names('cart');
Route::post('/add-to-cart',[CartController::class,'addToCart'])->name('add-to-cart');
Route::get('cart-data',[CartController::class,'cartData'])->name('cart-data');
Route::post('remove-cart-item',[CartController::class,'removeCartItem'])->name('remove-cart-item');

//Orders
Route::resource('/orders', OrderController::class)->names('order');

//Checkout
Route::resource('/checkouts', CheckoutController::class)->names('checkout');

//User Dashboard
Route::get('/user-dashboard',[WebviewController::class,'userDashboard'])->name('user-dashboard');
//Route::view('/checkout', 'frontend.pages.products.checkout');
//Route::view('/cart', 'frontend.pages.products.cart');
Route::view('/wishlist', 'frontend.pages.products.wishlist');


Route::view('/about', 'frontend.pages.static-pages.about');
Route::view('/contact', 'frontend.pages.static-pages.contact');
Route::view('/order-success', 'frontend.pages.orders.order-success')->name('order.success');
Route::view('/order-tracking', 'frontend.pages.orders.order-tracking');
Route::view('/user-profile', 'frontend.pages.dashboard.user-profile');
Route::view('/shop', 'frontend.pages.products.shop-page');


// SSLCOMMERZ Start
//Route::get('/example1', [SslCommerzPaymentController::class, 'exampleEasyCheckout']);
//Route::get('/example2', [SslCommerzPaymentController::class, 'exampleHostedCheckout']);

//Route::post('/pay', [SslCommerzPaymentController::class, 'index']);
//Route::post('/pay-via-ajax', [SslCommerzPaymentController::class, 'payViaAjax']);

Route::post('/success', [SslCommerzPaymentController::class, 'success']);
Route::post('/fail', [SslCommerzPaymentController::class, 'fail']);
Route::post('/cancel', [SslCommerzPaymentController::class, 'cancel']);

Route::post('/ipn', [SslCommerzPaymentController::class, 'ipn']);
//SSLCOMMERZ END




require __DIR__.'/auth.php';
require __DIR__.'/admin.php';


Route::fallback(function () {
    
    return view('frontend.pages.static-pages.404');
});