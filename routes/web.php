<?php

use Illuminate\Support\Facades\Route;


//Webview Routes
Route::view('/', 'frontend.pages.webview');
Route::view('/product-details', 'frontend.pages.products.product-details');
Route::view('/checkout', 'frontend.pages.products.checkout');
Route::view('/cart', 'frontend.pages.products.cart');
Route::view('/wishlist', 'frontend.pages.products.wishlist');
Route::view('/error', 'frontend.pages.static-pages.404');
Route::view('/about', 'frontend.pages.static-pages.about');
Route::view('/contact', 'frontend.pages.static-pages.contact');
Route::view('/logins', 'frontend.pages.auth.login');
Route::view('/order-success', 'frontend.pages.orders.order-success');
Route::view('/order-tracking', 'frontend.pages.orders.order-tracking');
Route::view('/user-dashboard', 'frontend.pages.dashboard.user-dashboard');
Route::view('/user-profile', 'frontend.pages.dashboard.user-profile');
Route::view('/shop', 'frontend.pages.products.shop-page');






require __DIR__.'/auth.php';
require __DIR__.'/admin.php';


Route::fallback(function () {
   
    return view('frontend.pages.static-pages.404');
});