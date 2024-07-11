<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\brand;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;

class BrandsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend.pages.brands.index');
    }

    public function getData()
    {
        $brands = Brand::all();


        return DataTables::of($brands)
            ->addColumn('brandImage', function ($brand) {
                return '<img src="'.asset($brand->brand_image).'" width="50px" height="50px" alt=""/>';
            })
            ->addColumn('status', function ($brand) {
                if ($brand->status == 1) {
                    return '<a class="status" id="adminStatus" href="javascript:void(0)"
                        data-id="'.$brand->id.'" data-status="'.$brand->status.'"> <i
                        class="fa-solid fa-toggle-on fa-2x"></i>
                    </a>';
                } else {
                    return '<a class="status" id="adminStatus" href="javascript:void(0)"
                        data-id="'.$brand->id.'" data-status="'.$brand->status.'"> <i
                          class="fa-solid fa-toggle-off fa-2x" style="color: grey"></i>
                    </a>';
                }
            })
            ->addColumn('action', function ($brand) {
                return '<div class="d-flex gap-3"> <a class="editButton btn btn-sm btn-primary" href="javascript:void(0)" data-id="'.$brand->id.'" data-bs-toggle="modal" data-bs-target="#editBrandModal"><i class="fas fa-edit"></i></a>

                                                             <a class="btn btn-sm btn-danger" href="javascript:void(0)" data-id="'.$brand->id.'" id="deleteBrandBtn"> <i class="fas fa-trash"></i></a>
                                                           </div>';

            })
            ->rawColumns(['action', 'status', 'brandImage'])
            ->make(true);
    }


    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
                'brand_name' => 'required',
                 //    'brand_image' => 'mimes:jpeg,jpg,png|max:2048',
            ]
        );

        $brand = new Brand();
        $brand->brand_name = $request->brand_name;
        $brand->slug = Str::slug($request->brand_name);

        if ($request->hasFile('brand_image')) {
            $file = $request->file('brand_image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('public/backend/assets/images/uploads/brand/', $filename);
            $brand->brand_image = 'public/backend/assets/images/uploads/brand/'.$filename;
        }

        $brand->save();

        return response()->json(['message' => 'success'], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(brand $brands)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Brand $brand)
    {
        return response()->json(['message' => 'success', 'data' => $brand], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Brand $brand)
    {
        $request->validate([
            'brand_name' => 'required',
        ]);

        $brand->brand_name = $request->brand_name;

        if ($request->hasFile('brand_image')) {
            if ($brand->brand_image) {
                if (file_exists($brand->brand_image)) {
                    unlink($brand->brand_image);
                }
            }

            $file = $request->file('brand_image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('public/backend/assets/images/uploads/brand/', $filename);
            $brand->brand_image = 'public/backend/assets/images/uploads/brand/'.$filename;
        }


        $brand->update();
        

        return response()->json(['message' => 'success'], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Brand $brand)
    {
        if ($brand->brand_image) {
            if (file_exists($brand->brand_image)) {
                unlink($brand->brand_image);
            }
        }
        $brand->delete();
        
        return response()->json(['message' => 'success'], 200);
        
    }

    public function changeBrandStatus(Request $request)
    {

        $id = $request->id;
        $status = $request->status;


        if ($status == 1) {
            $stat = 0;
        } else {
            $stat = 1;
        }

        $page = Brand::findOrFail($id);
        $page->status = $stat;
        $page->save();

        return response()->json(['message' => 'success', 'status' => $stat, 'id' => $id]);
    }
}
