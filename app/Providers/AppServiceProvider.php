<?php

namespace App\Providers;

use App\Models\Banner;
use App\Models\BasicInfo;
use App\Models\Category;
use App\Models\Product;
use App\Models\Slider;
use App\Models\ThemeColor;
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
            $frontCategories = Category::where('status', 1)->where('front_status', 1)->limit(9)->get();
            $navCategories = Category::where('status', 1)->where('front_status', 1)->limit(6)->get();

            $view->with([
                'basic_info' => $basic_info, 'frontCategories' => $frontCategories, 'navCategories' => $navCategories
            ]);
        });


        View()->composer('frontend.include.footer', function ($view) {
            $basic_info = BasicInfo::first();
            $view->with('basic_info', $basic_info);
        });

        View()->composer('backend.include.topbar', function ($view) {
            $basic_info = BasicInfo::first();
            $view->with('basic_info', $basic_info);
        });
        
        View()->composer('*', function ($view)
        {
            $basic_info = BasicInfo::first();
            $themeColor= ThemeColor::first();
            $view->with(['basic_info'=> $basic_info,'themeColor'=> $themeColor]);
        }
        );
        

        View()->composer('frontend.pages.webview', function ($view) {
            $popular_categories = Category::where('status', 1)->where('topCategory_status', 1)->get();
            $frontend_categories = Category::where('status', 1)->where('front_status', 1)->latest()->get();
            $sliders= Slider::where('status', 1)->get();
            $smallBanners= Banner::where('status', 1)->where('banner_type', 'small')->get();
            $largeBanner= Banner::where('status', 1)->where('banner_type', 'large')->first();
            $mediumBanners= Banner::where('status', 1)->where('banner_type', 'medium')->get();
            $popular_products = Product::with([
                'productDetail', 'weights', 'colors', 'sizes'
            ])->whereHas('productDetail')->where('status', 1)->where('isPopular', 1)->get();

            $featured_products= Product::with([
                'productDetail', 'weights', 'colors', 'sizes'
            ])->whereHas('productDetail')->where('status', 1)->where('isFeatured', 1)->get();

            $view->with([
                'frontend_categories' => $frontend_categories, 'popular_categories' => $popular_categories,
                'popular_products' => $popular_products,
                'sliders' => $sliders,
                'featured_products' => $featured_products,
                'smallBanners' => $smallBanners
                ,'largeBanner' => $largeBanner,
                'mediumBanners' => $mediumBanners
            ]);
        });
    }
}
