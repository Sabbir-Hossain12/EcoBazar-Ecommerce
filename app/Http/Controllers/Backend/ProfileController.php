<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{

    public function create()
    {
        return view('backend.pages.profile');
    }
    public function check_curr_pass(Request $request)
    {
        $curr_pass= $request->all();
        if( Hash::check($curr_pass['currentPass'],Auth::guard('admin')->user()->password))
        {
            return "true";
        }
        else
        {
            return "false";
        }
        
    }
}
