<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::latest()->get();
        return view('backend.pages.categories.index', compact('categories'));
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
        // dd($request->all());

        $category = new Category();

        $category->category_name          = $request->category_name;
        $category->slug                   = Str::slug($request->category_name);
        $category->front_status           = $request->front_status;
        $category->topCategory_status     = $request->topCategory_status;
        $category->status                 = $request->status;

        if( $request->file('category_img') ){
            $images = $request->file('category_img');

            $imageName          = $request->category_name . rand(1, 99999999) . '.' . $images->getClientOriginalExtension();
            $imagePath          = 'public/backend/images/category/';
            $images->move($imagePath, $imageName);

            $category->category_img   =  $imagePath . $imageName;
        }

        $category->save();

        return redirect()->back()->with("success", "Successfully Category Created!");
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        // dd($request->all());
        $category->category_name          = $request->category_name;
        $category->slug                   = Str::slug($request->category_name);
        $category->front_status           = $request->front_status;
        $category->topCategory_status     = $request->topCategory_status;
        $category->status                 = $request->status;

        if( $request->file('category_img') ){
            $images = $request->file('category_img');

            if ( !is_null($category->category_img) && file_exists($category->category_img))  {
                unlink($category->category_img); // Delete the existing category_img
            }

            $imageName          = $request->category_name . rand(1, 99999999) . '.' . $images->getClientOriginalExtension();
            $imagePath          = 'public/backend/images/category/';
            $images->move($imagePath, $imageName);

            $category->category_img   =  $imagePath . $imageName;
        }

        $category->save();

        return redirect()->back()->with("success", "Successfully Category Updated!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {

        // dd($category);
        $category->status = 0;
        $category->save();

        return redirect()->back()->with("error", "Category Deleted!");
    }
}
