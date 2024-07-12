<?php

use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\AdminPermissionController;
use App\Http\Controllers\Backend\AdminRoleController;
use App\Http\Controllers\Backend\AttributeController;
use App\Http\Controllers\Backend\AttrvalueController;
use App\Http\Controllers\Backend\BannerController;
use App\Http\Controllers\Backend\BasicinfoController;
use App\Http\Controllers\Backend\BrandsController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\PagesController;
use App\Http\Controllers\Backend\ProductsController;
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
    Route::get('/category-data', [CategoryController::class, 'getData'])->name('admin.category-data');
    Route::post('/categories/front-status', [CategoryController::class, 'changeCategoryFrontStatus'])->name('admin.category.frontStatus');
    Route::post('/categories/topCategory-status', [CategoryController::class, 'changeTopCategoryStatus'])->name('admin.category.topCategoryStatus');
    Route::post('/categories/status', [CategoryController::class, 'changeCategoryStatus'])->name('admin.category.status');
    Route::get('/categories/edit/{id}', [CategoryController::class, 'categoryEdit'])->name('category.edit');

    
    //______ Subcategory _____//
    Route::resource('/subcategories', SubcategoryController::class)->names('admin.subcategory');
    Route::get('/subcategory-data', [SubcategoryController::class, 'getData'])->name('admin.subcategory-data');
    Route::post('/subcategory/status', [SubcategoryController::class, 'changeSubCategoryStatus'])->name('admin.subcategory.status');
    Route::get('/subcategory/edit/{id}', [SubcategoryController::class, 'subCategoryEdit'])->name('subcategory.edit');


    //______ Brand _____//
    Route::resource('/brands', BrandsController::class)->names('admin.brand');
    Route::get('/brand-data', [BrandsController::class, 'getData'])->name('admin.brand-data');
    Route::post('/change-brand-status', [BrandsController::class, 'changeBrandStatus'])->name('admin.brand.status');
    
    //______ Product _____//
    Route::resource('/products', ProductsController::class)->names('admin.product');
    Route::get('/product-data', [ProductsController::class, 'getData'])->name('admin.product-data');
    //______ Sliders _____//
    Route::resource('/sliders',SliderController::class)->names('admin.slider');
    Route::get('/slider-data',[SliderController::class,'getData'])->name('admin.slider-data');
    Route::post('/change-slider-status',[SliderController::class,'changeSliderStatus'])->name('admin.slider.status');

    //______ Banners _____//
    Route::resource('/banners',BannerController::class)->names('admin.banner');
    Route::get('/banners-data',[BannerController::class,'getData'])->name('admin.banner-data');
    Route::post('/change-banners-status',[BannerController::class,'changeBannerStatus'])->name('admin.banner.status');


    //______ Attribute _____//
    Route::resource('/attributes', AttributeController::class)->names('admin.attribute');
    Route::get('/attribute-data',[AttributeController::class,'getData'])->name('admin.attribute-data');
    
    //______ Attribute Value _____//
    Route::resource('/attribute-values', AttrvalueController::class)->names('admin.attribute-value'); 
    Route::get('/attribute-values-data',[AttrvalueController::class,'getData'])->name('admin.attrvalue-data');
    
    
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