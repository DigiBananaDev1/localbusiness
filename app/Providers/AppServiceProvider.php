<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\City;
use App\Models\Faq;
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
    public function boot(): void
    {
        View::composer('app', function ($view) {
            $cities = City::where('status', 1)->get();
            $categories = Category::all();
            $faqs = Faq::all();
            $view->with(['cities'=> $cities, 'categories' => $categories, 'faqs' => $faqs]);
        });
    }
}
