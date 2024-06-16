<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Backend\Auth\LoginController;
use App\Http\Controllers\Backend\Auth\RegisterController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->middleware('guest')->group(function () {
    Route::get('register', [RegisterController::class, 'create'])
        ->name('admin.register');

    Route::post('register', [RegisterController::class, 'store'])->name('admin.register.store');

    Route::get('login', [LoginController::class, 'create'])
        ->name('admin.login');

    Route::post('login', [LoginController::class, 'store'])->name('admin.login.store');

});

Route::prefix('admin')->middleware('admin')->group(function () {


    Route::post('logout', [LoginController::class, 'destroy'])
        ->name('admin.logout');
});
