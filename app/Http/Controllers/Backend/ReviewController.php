<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Review;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend.pages.review.index');
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
        $reviews= DB::table('reviews')
                  ->join('users', 'users.id' ,'reviews.user_id')
                  ->join('products', 'products.id', 'reviews.product_id')
                  ->select('users.*', 'products.*','reviews.*') 
                  ->get();
        
        return DataTables::of($reviews)

            ->addColumn('status', function ($review) {
                if ($review->status == 1) {
                    return ' <a class="status" id="status" href="javascript:void(0)"
                        data-id="'.$review->id.'" data-status="'.$review->status.'"> <i
                            class="fa-solid fa-toggle-on fa-2x"></i>
                    </a>';
                } else {
                    return '<a class="status" id="status" href="javascript:void(0)"
                        data-id="'.$review->id.'" data-status="'.$review->status.'"> <i
                            class="fa-solid fa-toggle-off fa-2x" style="color: grey"></i>
                    </a>';
                }
            })

            ->addColumn('action', function ($review) {
                return '<div class="d-flex gap-3"> 
                    <a class="btn btn-sm btn-danger" href="javascript:void(0)" data-id="'.$review->id.'" id="deleteBtn"> <i class="fas fa-trash"></i></a>
                </div>';
            })
            
            ->rawColumns(['status','action'])
            ->make(true);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Review $review)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Review $review)
    {
        //
    }

    public function changeReviewStatus(Request $request)
    {
        $id = $request->id;
        $Current_status = $request->status;

        if ($Current_status == 1) {
            $status = 0;
        } else {
            $status = 1;
        }

        $page = Review::findOrFail($id);
        $page->status = $status;
        $page->save();

        return response()->json(['message' => 'success', 'status' => $status, 'id' => $id]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Review $review)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Review $review)
    {
        $review->delete();
        
        return response()->json(['message' => 'Review has been deleted.'], 200);
    }
}
