<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Coupon;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend.pages.coupon.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    public function getData()
    {
        $coupons= Coupon::all();
        
        return DataTables::of($coupons)
            ->addColumn('discount', function ($coupon) {
                    return '<span class="badge bg-primary">'. $coupon->discount .'%</span>';
            })
            ->addColumn('status', function ($coupon) {
                if ($coupon->status == 1) {
                    return ' <a class="status" id="status" href="javascript:void(0)"
                        data-id="'.$coupon->id.'" data-status="'.$coupon->status.'"> <i
                            class="fa-solid fa-toggle-on fa-2x"></i>
                    </a>';
                } else {
                    return '<a class="status" id="status" href="javascript:void(0)"
                        data-id="'.$coupon->id.'" data-status="'.$coupon->status.'"> <i
                            class="fa-solid fa-toggle-off fa-2x" style="color: grey"></i>
                    </a>';
                }
            })

            ->addColumn('action', function ($coupon) {
                return '<div class="d-flex gap-3"> 
                    <a class="btn btn-sm btn-primary" id="editButton" href="javascript:void(0)" data-id="'.$coupon->id.'" data-bs-toggle="modal" data-bs-target="#editModal"><i class="fas fa-edit"></i></a>
                    <a class="btn btn-sm btn-danger" href="javascript:void(0)" data-id="'.$coupon->id.'" id="deleteBtn"> <i class="fas fa-trash"></i></a>
                </div>';
            })
            
            ->rawColumns(['discount','status','action'])
            ->make(true);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $coupon = new Coupon();

        $coupon->code            = Str::lower($request->code);
        $coupon->discount        = $request->discount;
        $coupon->amount          = $request->amount;
        $coupon->expire_date     = $request->expire_date;
        $coupon->status          = $request->status;
        
        // dd($coupon);
        $coupon->save();
        
        return response()->json(['message'=> "Successfully Coupon Created!", 'status' => true]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    public function changeCouponStatus(Request $request)
    {
        $id = $request->id;
        $Current_status = $request->status;

        if ($Current_status == 1) {
            $status = 0;
        } else {
            $status = 1;
        }

        $page = Coupon::findOrFail($id);
        $page->status = $status;
        $page->save();

        return response()->json(['message' => 'success', 'status' => $status, 'id' => $id]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Coupon $coupon)
    {
        // dd($coupon);
        return response()->json(['success' => $coupon]);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Coupon $coupon)
    {
        $coupon->code            = Str::lower($request->code);
        $coupon->discount        = $request->discount;
        $coupon->amount          = $request->amount;
        $coupon->expire_date     = $request->expire_date;
        $coupon->status          = $request->status;
        
        $coupon->save();

        return response()->json(['message'=> "success"],200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Coupon $coupon)
    {
        $coupon->delete();
        
        return response()->json(['message' => 'Coupon has been deleted.'], 200);
    }
}
