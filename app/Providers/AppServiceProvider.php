<?php

namespace App\Providers;


use App\Models\Category;
use App\Models\City;
use App\Models\Faq;
use App\Models\Vendor;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

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
    // public function boot(): void
    // {
    //     View::composer('app', function ($view) {
    //         $cities = City::where('status', 1)->get();
    //         $categories = Category::all();
    //         $faqs = Faq::all();
    //         $universalBusinessType = Vendor::with('businessTypes')->find(Auth::guard('vendor')->id());


    //         $view->with([
    //             'cities' => $cities,
    //             'categories' => $categories,
    //             'faqs' => $faqs,
    //             'universalBusinessType' => $universalBusinessType,
    //         ]);
    //     });
    // }
    public function boot(): void
    {
        // Share only on layouts.vendor
        View::composer('vendor.layouts.app', function ($view) {
            $vendor = null;
            if (Auth::guard('vendor')->check()) {
                $vendor = Vendor::with('businessTypes')->find(Auth::guard('vendor')->id());
            }
            $view->with('loggedInVendor', $vendor);
        });

        // Share globally (all views)
        View::share('cities', City::where('status', 1)->get());
        View::share('categories', Category::all());
        View::share('faqs', Faq::all());
    }

}
