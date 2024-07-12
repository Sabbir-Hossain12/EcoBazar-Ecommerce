<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Image;

class ProfileController extends Controller
{

    public function create()
    {
        return view('backend.pages.profile.profile');
    }

    public function check_curr_pass(Request $request)
    {
        $curr_pass = $request->all();
        if (Hash::check($curr_pass['currentPass'], Auth::guard('admin')->user()->password)) {
            return "true";
        } else {
            return "false";
        }
    }

    public function update_password(Request $request)
    {
//        dd($request->all());
        $currentPass = $request->currentPass;
        $newPass = $request->newPass;
        $confirm_newPass = $request->confirm_newPass;

        if (Hash::check($currentPass, Auth::guard('admin')->user()->password)) {
            if ($newPass === $confirm_newPass) {
                $profile = Admin::findOrFail(Auth::guard('admin')->user()->id);

                $profile->password = Hash::make($newPass);
                $profile->save();

                return redirect()->back()->with('success_message', 'Password Updated !');
            } else {
                return redirect()->back()->with('error_message', 'New and Confirm Password Should be Same');
            }
        } else {
            return redirect()->back()->with('error_message', 'Current Password Does Not Match');
        }
    }

    public function update_admin_info(Request $request)
    {
//        dd($request->all());
       
        $request->validate(
            [
                'name' => ['string'],
                'phone' => ['string']
            ]
        );

        $profile = Admin::findOrFail(Auth::guard('admin')->user()->id);

        $profile->name = $request->name;
        $profile->phone = $request->phone;
        $profile->save();

        return redirect()->back()->with('success_message_details', 'Admin Details Updated');
    }


}
