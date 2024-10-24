<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Review;
use App\Models\Subcategory;
use App\Models\ThemeColor;
use http\Client\Curl\User;
use Illuminate\Http\Request;

class WebviewController extends Controller
{
    public function index()
    {
        return view('frontend.pages.webview');
    }
    
    public function aboutPage()
    {
        return view('frontend.pages.static-pages.about');
    }

    public function contactPage()
    {
        return view('frontend.pages.static-pages.contact');
    }

    public function searchProduct(Request $request)
    {
        $products = Product::where('product_name', 'like', '%'.$request->search.'%')->with('productDetail', 'weights',
            'colors', 'sizes')->get();

        $categories = Category::where('status', 1)->with('products')->get();
        return view('frontend.pages.products.search', compact('products', 'categories'));
    }

    public function productByCategory(Category $category)
    {
        $products = Product::where('category_id', $category->id)->with('productDetail', 'weights', 'colors',
            'sizes')->get();

        $categories = Category::where('status', 1)->with('products')->get();
        return view('frontend.pages.products.category-product', compact('products', 'categories','category'));
    }


    public function productBySubCategory(Subcategory $subcategory)
    {
        $products = Product::where('subcategory_id', $subcategory->id)->with('productDetail', 'weights', 'colors',
            'sizes')->get();
        $categories = Category::where('status', 1)->with('products')->get();
        return view('frontend.pages.products.subcategory-product', compact('products','categories'));

    }


    public function allProducts()
    {
        $products= Product::with('productDetail', 'weights', 'colors', 'sizes')->get();
        $categories = Category::where('status', 1)->with('products')->get();

        return view('frontend.pages.products.all-product', compact('products', 'categories'));

    }

    public function getThemeColor()
    {
        $themeColor= ThemeColor::first();
        
//        dd($themeColor);
        if ($themeColor)
        {
            return response()->view('css.dynamic-theme', compact('themeColor'));
//                ->header('Content-Type', 'text/css');
        }
        return response('/* Default CSS if no theme settings are found */', 200)
            ->header('Content-Type', 'text/css');
    }


    public function getReviews($id)
    {
         $reviews=   Review::where('status', 1)->where('product_id', $id)  ->with('user')->get();
            
            
            return response()->json(['reviews' => $reviews], 200);
    }

    public function submitReview(Request $request)
    {
//        dd($request->all());
        $request->validate([
            'rating' => 'required|numeric|min:1|max:5',
            'review_text' => 'required|string',
        ]);
        
        $review= new Review();
        $review->user_id = auth()->user()->id;
        $review->product_id = $request->product_id;
        $review->rating = $request->rating;
        $review->review_text = $request->review_text;
        $review->status = 0;
        $review->review_date=today();
        $review->save();
        
        return response()->json(['message' => 'Review submitted successfully and Pending for Approval'], 200);
    }
        


}
