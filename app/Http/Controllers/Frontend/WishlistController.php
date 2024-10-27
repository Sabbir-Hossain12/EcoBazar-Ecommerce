<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
     $wishlists=   Wishlist::where('user_id',Auth::user()->id)->with('product')->get();
        
//     dd($wishlist);
     return view('frontend.pages.products.wishlist',compact('wishlists'));
     
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
      
        $product_id=$request->product_id;
        $user_id=auth()->user()->id;
        $check = Wishlist::where('user_id',$user_id)->where('product_id',$product_id)->first();
        if($check)
        {
            $check->delete();
            return response()->json(['message' => 'Product Removed From Wishlist'],204);
        }
        
        $wishlist = new Wishlist();
        $wishlist->user_id = $user_id;
        $wishlist->product_id = $product_id;
        $wishlist->save();
        
        
        return response()->json(['message' => 'Product Added To Wishlist'],200);
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Wishlist $wishlist)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Wishlist $wishlist)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Wishlist $wishlist)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Wishlist $wishlist)
    {
        $wishlist->delete();
        return response()->json(['message' => 'Removed From Wishlist'],200);
    }


    public function wishlistValidate(Request $request)
    {
        $user_id=auth()->user()->id;
        $product_id=$request->product_id;
        
        $check = Wishlist::where('user_id',$user_id)->where('product_id',$product_id)->first();
        if($check)
        {
            return response()->json(['message' => 'Product Added To Wishlist','check' => true],200);
        }
        return response()->json(['message' => 'Product Not Added To Wishlist','check' => false],200);
    }
}
