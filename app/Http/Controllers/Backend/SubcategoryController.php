<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;

class SubcategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        // dd($categories);
        return view('backend.pages.subcategories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function getData()
    {
        // get all data
        $subCategories= Category::join('subcategories', 'subcategories.category_id', '=', 'categories.id')
        ->select('categories.category_name', 'subcategories.subcategory_name', 'subcategories.*')
        ->get();

        return DataTables::of($subCategories)
            
        ->addColumn('subCategoryImg', function ($subCategory) {    
            return '<img src="'.asset( $subCategory->subcategory_img ).'" width="50px" height="50px">';
        })

        ->addColumn('status', function ($subCategory) {
            if ($subCategory->status == 1) {
                return ' <a class="status" id="status" href="javascript:void(0)"
                    data-id="'.$subCategory->id.'" data-status="'.$subCategory->status.'"> <i
                        class="fa-solid fa-toggle-on fa-2x"></i>
                </a>';
            } else {
                return '<a class="status" id="status" href="javascript:void(0)"
                    data-id="'.$subCategory->id.'" data-status="'.$subCategory->status.'"> <i
                        class="fa-solid fa-toggle-off fa-2x" style="color: grey"></i>
                </a>';
            }
        })

        ->addColumn('action', function ($subCategory) {
            return '<div class="d-flex gap-3"> 
                <a class="btn btn-sm btn-primary" id="editButton" href="javascript:void(0)" data-id="'.$subCategory->id.'" data-bs-toggle="modal" data-bs-target="#editModal"><i class="fas fa-edit"></i></a>

                <a class="btn btn-sm btn-danger" href="javascript:void(0)" data-id="'.$subCategory->id.'" id="deleteBtn"> <i class="fas fa-trash"></i></a>
            </div>';
        })
        
        ->rawColumns(['subCategoryImg','status','action'])
        ->make(true);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $SubCategory = new Subcategory();

        $SubCategory->category_id            = $request->category_id;
        $SubCategory->subcategory_name       = $request->subcategory_name;
        $SubCategory->slug                   = Str::slug($request->subcategory_name);
        $SubCategory->status                 = $request->status;
        
        
        if( $request->file('subcategory_img') ){
            $images = $request->file('subcategory_img');

            $imageName          = $request->slug . rand(1, 99999999) . '.' . $images->getClientOriginalExtension();
            $imagePath          = 'public/backend/images/subCategory/';
            $images->move($imagePath, $imageName);

            $SubCategory->subcategory_img   =  $imagePath . $imageName;
        }
        
        // dd($category);
        $SubCategory->save();
        
        return response()->json(['message'=> "Successfully SubCategory Created!", 'status' => true]);
    }

    /**
     * Display the specified resource.
     */
    public function changeSubCategoryStatus(Request $request)
    {
        $id = $request->id;
        $Current_status = $request->status;

        if ($Current_status == 1) {
            $status = 0;
        } else {
            $status = 1;
        }

        $page = Subcategory::findOrFail($id);
        $page->status = $status;
        $page->save();

        //Debugged this code --> return response()->json(['message' => 'success', 'status' => $status, 'id' => $id]);
        return response()->json(['message' => 'success', 'status' => $status, 'id' => $id]);
    }


    public function subCategoryEdit()
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Subcategory $subcategory)
    {
        // dd($subcategory);
        return response()->json(['success' => $subcategory]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Subcategory $subcategory)
    {
        $subcategory->category_id            = $request->category_id;
        $subcategory->subcategory_name       = $request->subcategory_name;
        $subcategory->slug                   = Str::slug($request->subcategory_name);
        $subcategory->status                 = $request->status;

        if( $request->file('subcategory_img') ){
            $images = $request->file('subcategory_img');

            if ( !is_null($subcategory->category_img_path) && file_exists($subcategory->category_img_path))  {
                unlink($subcategory->category_img_path); // Delete the existing category_img
            }

            $imageName          = $request->slug . rand(1, 99999999) . '.' . $images->getClientOriginalExtension();
            $imagePath          = 'public/backend/images/subCategory/';
            $images->move($imagePath, $imageName);

            $subcategory->subcategory_img   =  $imagePath . $imageName;
        }

        $subcategory->save();

        return response()->json(['message'=> "success"],200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Subcategory $subcategory)
    {
        if ($subcategory->subcategory_img) {
            if (file_exists($subcategory->subcategory_img)) {
                unlink($subcategory->subcategory_img);
            }
        }
        $subcategory->delete();
        
        return response()->json(['message' => 'SubCategory has been deleted.'], 200);
    }
}
