<?php

namespace App\Providers;

use App\Models\BasicInfo;
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
    }
}
