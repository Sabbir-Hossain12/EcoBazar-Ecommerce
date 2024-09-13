<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    public function index()
    {
        $user = User::find(auth()->user()->id);
        $total_orders = $user->orders->count();
        $pending_orders = $user->orders->where('status', 'Pending')->count();
        return view('frontend.pages.dashboard.user-dashboard', compact('user', 'total_orders', 'pending_orders'));
    }


    public function updateProfileImage(Request $request)
    {
//        dd($request->all());
        $user = User::find(auth()->user()->id);
        if ($request->hasFile('profile_pic')) {
            if ($user->profile_pic && file_exists($user->profile_pic)) {
                unlink($user->profile_pic);
            }

            $file = $request->file('profile_pic');
            $filename = time().uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path('/frontend/images/upload/profile/'), $filename);
            $url = 'public/frontend/images/upload/profile/'.$filename;
            $user->profile_pic = $url;
            $user->save();
        }

        return redirect()->back()->with('success', 'Profile Image Updated Successfully');
    }
}
