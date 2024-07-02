<?php

use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\AdminPermissionController;
use App\Http\Controllers\Backend\AdminRoleController;
use App\Http\Controllers\Backend\BannerController;
use App\Http\Controllers\Backend\BasicinfoController;
use App\Http\Controllers\Backend\BrandsController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\PagesController;
use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Backend\SubcategoryController;
use App\Http\Controllers\Backend\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


//______ Admin Panel Starts _____//

Route::prefix('admin')->middleware('admin')->group(function () {

  //______ Dashboard _____//
  Route::resource('/dashboard', DashboardController::class)->names('admin.dashboard');

    //______ Admins _____//
    Route::resource('/admins', AdminController::class)->names('admin.admins');
    Route::post('/change-admin-status', [AdminController::class, 'changeAdminStatus'])->name('admin.status');
    Route::get('/data', [AdminController::class, 'getData'])->name('admin.data');

    //______ Role and Permission _____//
    Route::resource('/roles', AdminRoleController::class)->names('admin.role');
    Route::resource('/permissions', AdminPermissionController::class)->names('admin.permission');
    Route::get('/roles-data', [AdminRoleController::class, 'getData'])->name('admin.role.data');
    Route::get('/permissions-data', [AdminPermissionController::class, 'getData'])->name('admin.permission.data');

    Route::get('/assign-permission-page/{id}', [AdminRoleController::class, 'assignPermissionsToRolePage'])->name('role.permission.edit');
    Route::put('role/{id}/permission/update', [AdminRoleController::class, 'assignPermissionsToRole'])->name('role.permission.update');


    //______ Users _____//
    Route::resource('/users', UserController::class)->names('admin.user');
    Route::get('/users-data', [UserController::class, 'getData'])->name('user.data');


    //______ Sliders _____//
    Route::resource('/sliders', SliderController::class)->names('admin.slider');

    
   //______ Banners _____//
    Route::resource('/banners', BannerController::class)->names('admin.banner');


    //______ Category _____//
    Route::resource('/categories', CategoryController::class)->names('admin.category');


    //______ Subcategory _____//
    Route::resource('/subcategories', SubcategoryController::class)->names('admin.subcategory');


    //______ Brand _____//
    Route::resource('/brands', BrandsController::class)->names('admin.brand');


    //______ Product _____//
    Route::view('/products', 'backend.pages.products')->name('admin.products');

    
    //______ Profile _____//
    Route::get('/profiles', [ProfileController::class, 'create'])->name('admin.profile');
    Route::post('/check-current-pass', [ProfileController::class, 'check_curr_pass']);
    Route::post('/update-password', [ProfileController::class, 'update_password']);
    Route::post('/update-admin-details', [ProfileController::class, 'update_admin_info']);


   //______ Pages _____//
    Route::resource('/pages', PagesController::class)->names('admin.pages');
    Route::post('/change-pages-status', [PagesController::class, 'changePagesStatus']);


    //______ Settings _____//
    Route::resource('/basic-info', BasicinfoController::class)->names('admin.basic');
});


require __DIR__.'/admin.php';
require __DIR__.'/auth.php';


//Dummy routes
//Route::view('/register','backend.auth.register');