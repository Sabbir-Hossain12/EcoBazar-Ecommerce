<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Attribute;
use App\Models\Attrvalue;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class AttrvalueController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $attributes = Attribute::get();
        return view('backend.pages.attrvalues.index', compact('attributes'));
    }

    public function getData()
    {
        $attrValues = Attrvalue::all();


        return DataTables::of($attrValues)
            ->addColumn('status', function ($attrValue) {
                if ($attrValue->status == 1) {
                    return ' <a class="status" id="adminStatus" href="javascript:void(0)"
                                               data-id="'.$attrValue->id.'" data-status="'.$attrValue->status.'"> <i
                                                        class="fa-solid fa-toggle-on fa-2x"></i>
                                            </a>';
                } else {
                    return '<a class="status" id="adminStatus" href="javascript:void(0)"
                                               data-id="'.$attrValue->id.'" data-status="'.$attrValue->status.'"> <i
                                                        class="fa-solid fa-toggle-off fa-2x" style="color: grey"></i>
                                            </a>';
                }
            })
            ->addColumn('action', function ($attrValue) {
                return '<div class="d-flex gap-3"> <a class="editButton btn btn-sm btn-primary" href="javascript:void(0)" data-id="'.$attrValue->id.'" data-bs-toggle="modal" data-bs-target="#editAttrvalueModal"><i class="fas fa-edit"></i></a>
                                                             <a class="btn btn-sm btn-danger" href="javascript:void(0)" data-id="'.$attrValue->id.'" id="deleteAttrvalue"> <i class="fas fa-trash"></i></a>
                                                           </div>';
            })
            ->rawColumns(['action', 'status'])
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
        $request->validate(
            [
                'value'=>['string']
            ]
        );
        
        $attribute_name= Attribute::where('id',$request->attribute_id)->pluck('attribute_name')->first();
        
        
        $attrValue= new Attrvalue();
        
        $attrValue->attribute_id =$request->attribute_id;
        $attrValue->attribute_name= $attribute_name;
        $attrValue->value= $request->value;
        $attrValue->status= $request->status;    
    
      $result=  $attrValue->save();
        
        if ($result)
        {
            return response()->json(['message'=>'success'],200);
        }

        return response()->json(['message'=>'failed'],200);


    }

    /**
     * Display the specified resource.
     */
    public function show(Attrvalue $attrvalue)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Attrvalue $attribute_value)
    {
        
        return response()->json(['message' => 'success', 'data' => $attribute_value], 200);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Attrvalue $attribute_value)
    {
        $attribute_name= Attribute::where('id',$request->attribute_id)->pluck('attribute_name')->first();

        $attribute_value->attribute_id = $request->attribute_id;
        $attribute_value->attribute_name = $attribute_name;
        $attribute_value->value = $request->value;
        $attribute_value->status = $request->status;

        $result=   $attribute_value->update();

        if ($result)
        {
            return response()->json(['message'=>'success'],200);
        }

        return response()->json(['message'=>'failed'],200);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Attrvalue $attribute_value)
    {
        $result=  $attribute_value->delete();

        if($result)
        {
            return response()->json(['message' => 'success'], 200);

        }
        return response()->json(['message' => 'failed'], 200);
    }
}
