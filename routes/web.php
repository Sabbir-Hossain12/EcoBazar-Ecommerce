<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

//Route::get('/dashboard', function () {
//    return view('dashboard');
//})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


//admin panel starts
Route::prefix('admin')->middleware('admin')->group(function () {
    Route::view('/dashboard', 'backend.pages.dashboard')->name('admin.dashboard');
    Route::view('/basic-info', 'backend.pages.basic-info')->name('admin.basic');
//categories
    Route::view('/categories', 'backend.pages.categories')->name('admin.categories');
//sub-categories
    Route::view('/sub-categories', 'backend.pages.sub-categories')->name('admin.subcategories');
//brands
    Route::view('/brands', 'backend.pages.brands')->name('admin.brands');
//products
    Route::view('/products', 'backend.pages.products')->name('admin.products');

});

require __DIR__.'/admin.php';
require __DIR__.'/auth.php';


//Dummy routes
//Route::view('/register','backend.auth.register');