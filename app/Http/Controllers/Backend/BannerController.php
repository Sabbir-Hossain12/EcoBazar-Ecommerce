<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend.pages.banners.index');
    }

    public function getData()
    {
        $banners = Banner::all();


        return DataTables::of($banners)
            ->addColumn('bannerImage', function ($banner) {
                return '<img src="'.asset($banner->banner_img).'" width="200px" alt=""/>';
            })
            ->addColumn('status', function ($banner) {
                if ($banner->status == 1) {
                    return '<a class="status" id="adminStatus" href="javascript:void(0)"
                        data-id="'.$banner->id.'" data-status="'.$banner->status.'"> <i
                        class="fa-solid fa-toggle-on fa-2x"></i>
                    </a>';
                } else {
                    return '<a class="status" id="adminStatus" href="javascript:void(0)"
                        data-id="'.$banner->id.'" data-status="'.$banner->status.'"> <i
                          class="fa-solid fa-toggle-off fa-2x" style="color: grey"></i>
                    </a>';
                }
            })
            ->addColumn('action', function ($banner) {
                return '<div class="d-flex gap-2"> <a class="editButton btn btn-sm btn-primary" href="javascript:void(0)" data-id="'.$banner->id.'" data-bs-toggle="modal" data-bs-target="#editBannerModal"><i class="fas fa-edit"></i></a>

                                                             <a class="btn btn-sm btn-danger" href="javascript:void(0)" data-id="'.$banner->id.'" id="deleteBannerBtn"> <i class="fas fa-trash"></i></a>
                                                           </div>';

            })
            ->rawColumns(['action', 'status', 'bannerImage'])
            ->make(true);
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
        $request->validate([
            'banner_title_1' => [ 'string'],
            'banner_title_2' => [ 'string'],
            'banner_img' => ['max:2048'],
           
            'banner_btn_name'=> [ 'string'],
           
        ]);


        $banner = new Banner();
        $banner->banner_type = $request->banner_type;
        $banner->banner_title_1 = $request->banner_title_1;
        $banner->banner_title_2 = $request->banner_title_2;
        $banner->banner_title_3 = $request->banner_title_3;

        $banner->slug= Str::slug($request->banner_title_1);

        $banner->banner_link = $request->banner_link;
        $banner->banner_btn_name = $request->banner_btn_name;
        $banner->banner_btn_link = $request->banner_btn_link;


        if ($request->hasFile('banner_img')) {

            //create new manager instance with desired driver
            $manager = new ImageManager(new Driver());

            //Read Image
            $imgs = $manager->read($request->banner_img);

            // encoding jpeg data
            $encoded = $imgs->toWebp(80);

            // Save the encoded image to the file system
            $encodedFilename = time() . '.webp';
            $encoded->save(public_path('backend/assets/images/uploads/banners') . '/' . $encodedFilename);

            //Save image to Database

            $banner->banner_img = 'public/backend/assets/images/uploads/banners/'.$encodedFilename;


        }

        $banner->save();


        return response()->json(['message' => 'success'], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Banner $banner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Banner $banner)
    {
        return response()->json(['message' => 'success', 'data' => $banner], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Banner $banner)
    {
        $request->validate([
            'banner_title_1' => [ 'string'],
            'banner_title_2' => [ 'string'],
            'banner_img' => ['max:2048'],
            'banner_btn_name'=> [ 'string'],
            
        ]);


        $banner->banner_type = $request->banner_type;
        $banner->banner_title_1 = $request->banner_title_1;
        $banner->banner_title_2 = $request->banner_title_2;
        $banner->banner_title_3 = $request->banner_title_3;
        

        $banner->banner_link = $request->banner_link;
        $banner->banner_btn_name = $request->banner_btn_name;
        $banner->banner_btn_link = $request->banner_btn_link;


        if ($request->hasFile('banner_img')) {

            if ($banner->banner_img) {
                if (file_exists($banner->banner_img)) {
                    unlink($banner->banner_img);
                }
            }




            //create new manager instance with desired driver
            $manager = new ImageManager(new Driver());

            //Read Image
            $imgs = $manager->read($request->banner_img);

            // encoding jpeg data
            $encoded = $imgs->toWebp(80);

            // Save the encoded image to the file system
            $encodedFilename = time() . '.webp';
            $encoded->save(public_path('backend/assets/images/uploads/banners') . '/' . $encodedFilename);

            //Save image to Database

            $banner->banner_img = 'public/backend/assets/images/uploads/banners/'.$encodedFilename;


        }

        $banner->update();


        return response()->json(['message' => 'success'], 201);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Banner $banner)
    {
        $result=   $banner->delete();


        if ($result &&  $banner->banner_img) {
            if (file_exists($banner->banner_img)) {
                unlink($banner->banner_img);
            }
        }

        return response()->json(['message' => 'success'], 200);
    }

    public function changeBannerStatus(Request $request)
    {

        $id = $request->id;
        $status = $request->status;


        if ($status == 1) {
            $stat = 0;
        } else {
            $stat = 1;
        }

        $banner = Banner::findOrFail($id);
        $banner->status = $stat;
        $banner->save();

        return response()->json(['message' => 'success', 'status' => $stat, 'id' => $id]);
    }
}
