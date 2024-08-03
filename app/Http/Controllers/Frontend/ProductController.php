<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }


    public function productDetails(Product $product)
    {
        $sliderimgs= json_decode($product->productDetail->product_img,true);

        $productTags= json_decode($product->tag,true);
        
        $reviewRatingAvg=$product->reviews->avg('rating');
         $product->load('activeReviews');
         $ActiveReviews=$product->activeReviews;
        
        return view('frontend.pages.products.product-details', [
            'product' => $product,
            'sliderimgs' => $sliderimgs,
            'productTags' => $productTags,
            'reviewRatingAvg' => $reviewRatingAvg,
            'ActiveReviews' => $ActiveReviews
        ]);
    }
}
