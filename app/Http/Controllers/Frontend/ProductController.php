<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Color;
use App\Models\Product;
use App\Models\Size;
use App\Models\Weight;
use Illuminate\Http\Request;
use Jorenvh\Share\Share;

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
        $sliderimgs = json_decode($product->productDetail->product_img, true);

        $productTags = json_decode($product->tag, true);

        $reviewRatingAvg = $product->reviews->avg('rating');
        $product->load('activeReviews');
        $ActiveReviews = $product->activeReviews;
        $relatedProducts = Product::where('category_id', $product->category_id)->where('id', '!=',
            $product->id)->inRandomOrder()->take(10)->get();


       $shareLinks = (new \Jorenvh\Share\Share)->page(url('/product-details/' . $product->slug), $product->name)
            ->facebook()
            ->twitter()
            ->linkedin('Extra linkedin summary can be passed here')
            ->whatsapp();
//            ->getRawLinks();

        return view('frontend.pages.products.product-details', [
            'product' => $product,
            'sliderimgs' => $sliderimgs,
            'productTags' => $productTags,
            'reviewRatingAvg' => $reviewRatingAvg,
            'ActiveReviews' => $ActiveReviews,
            'relatedProducts' => $relatedProducts,
            'shareLinks' => $shareLinks
        ]);
    }

    public function getPriceByColor(Request $request)
    {
        $productPrice = Color::where('product_id', $request->product_id)->where('attrvalue_id', $request->attrvalue_id)->select([
            'productRegularPrice', 'productSalePrice', 'discount_percentage','color_title'
        ])->first();
        
        return response()->json($productPrice);
    }

    public function getPriceBySize(Request $request)
    {
        $productPrice = Size::where('product_id', $request->product_id)->where('attrvalue_id', $request->attrvalue_id)->select([
            'productRegularPrice', 'productSalePrice', 'discount_percentage','size_title'
        ])->first();

        return response()->json($productPrice);
    }

    public function getPriceByWeight(Request $request)
    {
        $productPrice = Weight::where('product_id', $request->product_id)->where('attrvalue_id', $request->attrvalue_id)->select([
            'productRegularPrice', 'productSalePrice', 'discount_percentage','weight_title'
        ])->first();

        return response()->json($productPrice);
    }

}
