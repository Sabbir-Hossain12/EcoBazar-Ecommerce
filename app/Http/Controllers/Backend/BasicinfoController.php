<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\BasicInfo;
use Illuminate\Http\Request;

class BasicinfoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = BasicInfo::first();

        return view('backend.pages.settings.basic-info', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
      
        $data = BasicInfo::first();

        if ($data) {
            $data->email = $request->email;
            $data->phone_1 = $request->phone_1;
            $data->fb_link = $request->fb_link;
            $data->x_link = $request->x_link;
            $data->p_link = $request->p_link;
            $data->youtube_link = $request->youtube_link;
            $data->insta_link = $request->insta_link;
            $data->inside_dhaka_charge = $request->inside_dhaka_charge;
            $data->outside_dhaka_charge = $request->outside_dhaka_charge;
            $data->store_location = $request->store_location;
            $data->fb_pixel = $request->fb_pixel;
            $data->google_analytics = $request->google_analytics;
            $data->chatbox_script = $request->chatbox_script;
            $data->marquee_text = $request->marquee_text;
            $data->short_desc = $request->short_desc;
            
            if ($request->hasFile('black_logo')) {
                
                if ($data->black_logo && file_exists($data->black_logo)) {
                    unlink($data->black_logo);
                }
                $file = $request->file('black_logo');
                $filename = time().$file->getClientOriginalName();
                $file->move('public/backend/images/logo/',$filename);
                $data->black_logo ='public/backend/images/logo/'.$filename;
            }

            if ($request->hasFile('light_logo')) {

                if ($data->light_logo && file_exists($data->light_logo)) {
                    unlink($data->light_logo);
                }
                $file = $request->file('light_logo');
                $filename = time().$file->getClientOriginalName();
                $file->move('public/backend/images/logo/',$filename);
                $data->light_logo ='public/backend/images/logo/'.$filename;
            }
            
            $data->save();
            
            return redirect()->back()->with('success_message','Data Updated Successfully');
            
        }
        return redirect()->back()->with('error_message','Data Update Failed');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
