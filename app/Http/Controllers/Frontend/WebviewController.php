<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use http\Client\Curl\User;
use Illuminate\Http\Request;

class WebviewController extends Controller
{
    public function index()
    {
        return view('frontend.pages.webview');
    }

    public function userDashboard ()
    {
//        $user= User:: get();
        return view('frontend.pages.dashboard.user-dashboard');
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
     $products=   Product::where('product_name', 'like', '%' . $request->search . '%')->with('productDetail', 'weights', 'colors', 'sizes')->get();
        
     $categories= Category::where('status', 1)->with('products')->get();
     return view('frontend.pages.products.shop-page', compact('products','categories'));
    }
    
    public function productByCategory(Product $product)
    {
        return view('frontend.pages.products.shop-page', compact('product'));
    }
    
    
}
