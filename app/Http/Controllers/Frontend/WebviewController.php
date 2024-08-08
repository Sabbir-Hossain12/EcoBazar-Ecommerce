<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use http\Client\Curl\User;
use Illuminate\Http\Request;

class WebviewController extends Controller
{
    public function index()
    {
        return view('frontend.pages.webview');
    }

    public function userDashboard ()
    {
        $user= User:: get();
        return view('frontend.pages.dashboard.user-dashboard',compact('user'));
    }
}
