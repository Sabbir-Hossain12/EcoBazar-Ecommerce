<?php

use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\BasicinfoController;
use App\Http\Controllers\Backend\BrandsController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\PagesController;
use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\Backend\SubcategoryController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


//admin panel starts
Route::prefix('admin')->middleware('admin')->group(function () {
    Route::view('/dashboard', 'backend.pages.dashboard')->name('admin.dashboard');

//categories
    Route::resource('/categories', CategoryController::class)->names('admin.category');

//sub-categories
    Route::resource('/subcategories', SubcategoryController::class)->names('admin.subcategory');
//brands
    Route::resource('/brands', BrandsController::class)->names('admin.brand');
    
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

//    Basic Info
    Route::resource('/basic-info', BasicinfoController::class)->names('admin.basic');

//    Admins
    Route::resource('/admins', AdminController::class)->names('admin.admins');
    Route::post('/change-admin-status', [AdminController::class, 'changeAdminStatus'])->name('admin.status');
    Route::get('/data', [AdminController::class, 'getData'])->name('admin.data');
});


require __DIR__.'/admin.php';
require __DIR__.'/auth.php';


//Dummy routes
//Route::view('/register','backend.auth.register');