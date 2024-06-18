<?php

use App\Http\Controllers\Backend\PagesController;
use App\Http\Controllers\Backend\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
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

//    profiles
    Route::get('/profiles', [ProfileController::class, 'create'])->name('admin.profile');
    Route::post('/check-current-pass', [ProfileController::class, 'check_curr_pass']);
    Route::post('/update-password', [ProfileController::class, 'update_password']);
    Route::post('/update-admin-details', [ProfileController::class, 'update_admin_info']);

//Pages
    Route::resource('/pages', PagesController::class)->names('admin.pages');
    Route::post('/change-pages-status', [PagesController::class, 'changePagesStatus']);
});


require __DIR__.'/admin.php';
require __DIR__.'/auth.php';


//Dummy routes
//Route::view('/register','backend.auth.register');