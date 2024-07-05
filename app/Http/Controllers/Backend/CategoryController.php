<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;

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

    public function getData()
    {
        // get all data
        $categories= Category::all();
        
        return DataTables::of($categories)
            
            ->addColumn('categoryImg', function ($category) {    
                return '<img src="'.asset( $category->category_img ).'" width="50px" height="50px">';
            })

            ->addColumn('frontStatus', function ($category) {
                if ($category->front_status == 1) {
                    return '<a class="status" id="front-status" href="javascript:void(0)"
                        data-id="'.$category->id.'" data-status="'.$category->front_status.'"> <i
                        class="fa-solid fa-toggle-on fa-2x"></i>
                    </a>';
                } else {
                    return '<a class="status" id="front-status" href="javascript:void(0)"
                        data-id="'.$category->id.'" data-status="'.$category->front_status.'"> <i
                          class="fa-solid fa-toggle-off fa-2x" style="color: grey"></i>
                    </a>';
                }
            })

            ->addColumn('topCategoryStatus', function ($category) {
                if ($category->topCategory_status == 1) {
                    return ' <a class="status" id="topCategory_status" href="javascript:void(0)"
                        data-id="'.$category->id.'" data-status="'.$category->topCategory_status.'"> <i
                            class="fa-solid fa-toggle-on fa-2x"></i>
                    </a>';
                } else {
                    return '<a class="status" id="topCategory_status" href="javascript:void(0)"
                        data-id="'.$category->id.'" data-status="'.$category->topCategory_status.'"> <i
                            class="fa-solid fa-toggle-off fa-2x" style="color: grey"></i>
                    </a>';
                }
            })

            ->addColumn('status', function ($category) {
                if ($category->status == 1) {
                    return ' <a class="status" id="status" href="javascript:void(0)"
                        data-id="'.$category->id.'" data-status="'.$category->status.'"> <i
                            class="fa-solid fa-toggle-on fa-2x"></i>
                    </a>';
                } else {
                    return '<a class="status" id="status" href="javascript:void(0)"
                        data-id="'.$category->id.'" data-status="'.$category->status.'"> <i
                            class="fa-solid fa-toggle-off fa-2x" style="color: grey"></i>
                    </a>';
                }
            })

            ->addColumn('action', function ($category) {
                return '<div class="d-flex gap-3"> 
                    <a class="editButton btn btn-sm btn-primary" href="javascript:void(0)" data-id="'.$category->id.'" data-bs-toggle="modal" data-bs-target="#editBrandModal"><i class="fas fa-edit"></i></a>
                    <a class="btn btn-sm btn-danger" href="javascript:void(0)" data-id="'.$category->id.'" id="deleteBrandBtn"> <i class="fas fa-trash"></i></a>
                </div>';
            })
            
            ->rawColumns(['categoryImg','frontStatus','topCategoryStatus','status','action'])
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function changeCategoryFrontStatus(Request $request)
    {
        $id = $request->id;
        $Current_status = $request->status;

        if ($Current_status == 1) {
            $status = 0;
        } else {
            $status = 1;
        }

        $page = Category::findOrFail($id);
        $page->front_status = $status;
        $page->save();

        //Debugged this code --> return response()->json(['message' => 'success', 'status' => $status, 'id' => $id]);
        return response()->json(['message' => 'success', 'status' => $status, 'id' => $id]);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function changeTopCategoryStatus(Request $request)
    {
        $id = $request->id;
        $Current_status = $request->status;

        if ($Current_status == 1) {
            $status = 0;
        } else {
            $status = 1;
        }

        $page = Category::findOrFail($id);
        $page->topCategory_status = $status;
        $page->save();

        //Debugged this code --> return response()->json(['message' => 'success', 'status' => $status, 'id' => $id]);
        return response()->json(['message' => 'success', 'status' => $status, 'id' => $id]);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function changeCategoryStatus(Request $request)
    {
        $id = $request->id;
        $Current_status = $request->status;

        if ($Current_status == 1) {
            $status = 0;
        } else {
            $status = 1;
        }

        $page = Category::findOrFail($id);
        $page->status = $status;
        $page->save();

        //Debugged this code --> return response()->json(['message' => 'success', 'status' => $status, 'id' => $id]);
        return response()->json(['message' => 'success', 'status' => $status, 'id' => $id]);
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
