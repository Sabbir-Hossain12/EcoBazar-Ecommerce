<?php

namespace App\Providers;

use App\Models\BasicInfo;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\ServiceProvider;
use Illuminate\View\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
//        
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
         View()->composer('frontend.include.header', function ($view) {
            
            $basic_info = BasicInfo::first();
            
            $view->with('basic_info', $basic_info);
        });
         
         
        View()->composer('frontend.include.footer', function ($view) {
             $basic_info = BasicInfo::first();
             $view->with('basic_info', $basic_info);
         });

        View()->composer('backend.include.topbar', function ($view) {
            $basic_info = BasicInfo::first();
            $view->with('basic_info', $basic_info);
        }); 
        
        View()->composer('frontend.pages.webview', function ($view) {
            $popular_categories = Category::where('status', 1)->where('topCategory_status', 1)->get();
            $frontend_categories = Category::where('status', 1)->where('front_status', 1)->latest()->get();
            
            $popular_products=Product::with(['productDetail','weights','colors','sizes'])->whereHas('productDetail')->where('status', 1)->where('isPopular', 1)->get();
            
//            dd($popular_categories);
            $view->with(['frontend_categories' => $frontend_categories, 'popular_categories'=> $popular_categories, 'popular_products' => $popular_products]);
        });
    }
}
