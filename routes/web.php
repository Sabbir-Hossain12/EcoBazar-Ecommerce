<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('frontend.pages.webview');
});



require __DIR__.'/admin.php';
require __DIR__.'/auth.php';

