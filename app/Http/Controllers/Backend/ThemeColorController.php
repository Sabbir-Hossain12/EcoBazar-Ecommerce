<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\ThemeColor;
use Illuminate\Http\Request;

class ThemeColorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $themes= ThemeColor::first();
        
        return view('backend.pages.settings.theme-color',compact('themes'));
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
//        dd($request->all());
        
        $request->validate([
            'primary_color_value' => 'string',
            'secondary_color_value' => 'string',
        ]);

        $themeColor= new ThemeColor();
        $themeColor->primary_color_value=$request->primary_color_value;
        $themeColor->secondary_color_value=$request->secondary_color_value;
        $themeColor->save();
        
   
        return redirect()->back()->with('success', 'Theme Color Updated Successfully');
    }
    

    /**
     * Display the specified resource.
     */
    public function show(ThemeColor $themeColor)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ThemeColor $themeColor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ThemeColor $themeColor)
    {
        $request->validate([
            'primary_color_value' => 'string',
            'secondary_color_value' => 'string',
        ]);


        $themeColor->primary_color_value=$request->primary_color_value;
        $themeColor->secondary_color_value=$request->secondary_color_value;
        $themeColor->save();

        
        return redirect()->back()->with('success', 'Theme Color Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ThemeColor $themeColor)
    {
        //
    }
}
