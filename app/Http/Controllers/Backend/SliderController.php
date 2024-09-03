<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;
use Yajra\DataTables\DataTables;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend.pages.sliders.index');
    }


    public function getData()
    {
        $sliders = Slider::all();


        return DataTables::of($sliders)
            ->addColumn('sliderImage', function ($slider) {
                return '<img src="'.asset($slider->slider_img).'" width="200px" alt=""/>';
            })
            ->addColumn('status', function ($slider) {
                if ($slider->status == 1) {
                    return '<a class="status" id="adminStatus" href="javascript:void(0)"
                        data-id="'.$slider->id.'" data-status="'.$slider->status.'"> <i
                        class="fa-solid fa-toggle-on fa-2x"></i>
                    </a>';
                } else {
                    return '<a class="status" id="adminStatus" href="javascript:void(0)"
                        data-id="'.$slider->id.'" data-status="'.$slider->status.'"> <i
                          class="fa-solid fa-toggle-off fa-2x" style="color: grey"></i>
                    </a>';
                }
            })
            ->addColumn('action', function ($slider) {
                return '<div class="d-flex gap-2"> <a class="editButton btn btn-sm btn-primary" href="javascript:void(0)" data-id="'.$slider->id.'" data-bs-toggle="modal" data-bs-target="#editSliderModal"><i class="fas fa-edit"></i></a>

                                                             <a class="btn btn-sm btn-danger" href="javascript:void(0)" data-id="'.$slider->id.'" id="deleteSliderBtn"> <i class="fas fa-trash"></i></a>
                                                           </div>';

            })
            ->rawColumns(['action', 'status', 'sliderImage'])
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
            'slider_title_1' => [ 'string'],
            'slider_title_2' => [ 'string'],
            'slider_title_3' => [ 'string'],
            'slider_img' => ['max:2048'],
            'slider_text'=> [ 'string'],
            'slider_btn_name'=> [ 'string'],
            'slider_btn_link'=> [ 'string'],
        ]);
        

        $slider = new Slider();
        $slider->slider_title_1 = $request->slider_title_1;
        $slider->slider_title_2 = $request->slider_title_2;
        $slider->slider_title_3 = $request->slider_title_3;
     
        $slider->slug= Str::slug($request->slider_title_1);
      
        $slider->slider_text = $request->slider_text;
        $slider->slider_btn_name = $request->slider_btn_name;
        $slider->slider_btn_link = $request->slider_btn_link;
       
        
        if ($request->hasFile('slider_img')) {

            //create new manager instance with desired driver
            $manager = new ImageManager(new Driver());

            //Read Image
            $imgs = $manager->read($request->slider_img);

            // encoding jpeg data
            $encoded = $imgs->toWebp(80);
            $encoded=$imgs->resize(884,549);
            // Save the encoded image to the file system
            $encodedFilename = time() . '.webp';
            $encoded->save(public_path('backend/assets/images/uploads/sliders') . '/' . $encodedFilename);

            //Save image to Database

            $slider->slider_img = 'public/backend/assets/images/uploads/sliders/'.$encodedFilename;
           
            
        }
        
        $slider->save();
        
        
        return response()->json(['message' => 'success'], 201);
        
        

       
       
    }

    /**
     * Display the specified resource.
     */
    public function show(Slider $slider)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Slider $slider)
    {
        return response()->json(['message' => 'success', 'data' => $slider], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Slider $slider)
    {
        $request->validate([
            'slider_title_1' => [ 'string'],
            'slider_title_2' => [ 'string'],
            'slider_title_3' => [ 'string'],
            'slider_img' => ['max:2048'],
            'slider_text'=> [ 'string'],
            'slider_btn_name'=> [ 'string'],
            'slider_btn_link'=> [ 'string'],
        ]);

        
        $slider->slider_title_1 = $request->slider_title_1;
        $slider->slider_title_2 = $request->slider_title_2;
        $slider->slider_title_3 = $request->slider_title_3;

        $slider->slider_text = $request->slider_text;
        $slider->slider_btn_name = $request->slider_btn_name;
        $slider->slider_btn_link = $request->slider_btn_link;
        

        if ($request->hasFile('slider_img')) {
            
            if ($slider->slider_img) {
                if (file_exists($slider->slider_img)) {
                    unlink($slider->slider_img);
                }
            }


            //create new manager instance with desired driver
            $manager = new ImageManager(new Driver());

            //Read Image
            $imgs = $manager->read($request->slider_img);

            // encoding jpeg data
            $encoded = $imgs->toWebp(80);
            $encoded=$imgs->resize(884,549);

            // Save the encoded image to the file system
            $encodedFilename = time() . '.webp';
            $encoded->save(public_path('backend/assets/images/uploads/sliders') . '/' . $encodedFilename);

            //Save image to Database

            $slider->slider_img = 'public/backend/assets/images/uploads/sliders/'.$encodedFilename;
            
        }
        
        $slider->update();
        return response()->json(['message' => 'success'], 201);
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Slider $slider)
    {
     $result=   $slider->delete();

     
        if ($result &&  $slider->slider_img) {
            if (file_exists($slider->slider_img)) {
                unlink($slider->slider_img);
            }
        }
        
        return response()->json(['message' => 'success'], 200);
    }


    public function changeSliderStatus(Request $request)
    {

        $id = $request->id;
        $status = $request->status;


        if ($status == 1) {
            $stat = 0;
        } else {
            $stat = 1;
        }

        $slider = Slider::findOrFail($id);
        $slider->status = $stat;
        $slider->save();

        return response()->json(['message' => 'success', 'status' => $stat, 'id' => $id]);
    }
}
