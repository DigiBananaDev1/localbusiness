<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\City;
use App\Models\Faq;
use App\Models\Review;
use App\Models\Service;
use App\Models\Vendor;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()

    {
        // $services = Service::all();
        // $vendors = Vendor::where('status', 1)->get();
        $cities = City::where('status', 1)->get();
        $categories = Category::all();
        $vendorCategories = Vendor::with('category')
            ->where('status', 1)
            ->get()
            ->groupBy(function ($vendor) {
                return $vendor->category ? $vendor->category->name : 'Others';
            });
        return view('welcome', compact('categories', 'cities', 'vendorCategories'));
    }
    public function selectedQuates($id)
    {
        $vendor = Vendor::findOrFail($id);

        if (empty($vendors)) {
            return view('404')->with('error', 'No Vendors Found');
        }

        return view('quates', ['vendors' => $vendor]);
    }
    public function businessAndServises()
    {

        $vendors = Vendor::where('categories', 'Manufacturer')->get();
        $services = Service::all();
        return view('businessAndServices', ['services' => $services, 'vendors' => $vendors]);
    }
    public function quates()
    {
        return view('404')->with('error', 'No Vendors Found');
        // return view('quates');
    }
    public function listyourbussiness()
    {
        return view('list-your-bussiness');
    }
    public function ads()
    {
        return view('ads');
    }
    public function leads()
    {
        return view('/leads');
    }
    public function footerpage()
    {
        return view('/footer-page');
    }

    public function venderServices($id)
    {
        // dd($id);
        $services = Service::with('vendor')->where('vendor_id', $id)->get();
        $categories = Category::all();
        $reviews = Review::where('vendor_id', $id)
            ->with('user')
            ->get();
        $userSum = $reviews->sum('user_id');

        $ratingAverage = $reviews->avg('rating');

        $faqs = Faq::all();

        return view('vendor_services', compact('services', 'categories', 'reviews', 'ratingAverage', 'userSum', 'faqs'));
    }
    public function venders($id)
    {
        $venders = Vendor::where('categories', $id)->get();
        $categories = Category::all();
        $faqs = Faq::all();
        return view('venders', compact('venders', 'categories', 'faqs'));
    }

    public function search(Request $request)
    {

        $city = $request->input('city');
        $searchText = $request->input('search_text');
        $categories = Category::all();
        $vendors = Vendor::query();
        $faqs = Faq::all();

        if (empty($city) && empty($searchText)) {
            return redirect()->back()->with('error', 'Please provide at least one filter to search.');
        }
        if (!empty($searchText)) {
            $vendors->where(function ($query) use ($searchText) {
                $query->where('business_name', 'LIKE', '%' . $searchText . '%')
                    ->orWhere('description', 'LIKE', '%' . $searchText . '%')
                    ->orWhere('categories', 'LIKE', '%' . $searchText . '%')
                    ->orWhere('search_terms', 'LIKE', '%' . $searchText . '%');
            });
        }

        if (!empty($city)) {
            $vendors->where('city', $city); // City filter
        }

        $filteredVendors = $vendors->get();

        // Query for Services (filtering via Vendors)
        $services = Service::query();

        if (!empty($city)) {
            // Only include services linked to vendors in the specified city
            $services->whereHas('vendor', function ($query) use ($city) {
                $query->where('city', $city);
            });
        }

        if (!empty($searchText)) {
            $services->where(function ($query) use ($searchText) {
                $query->where('name', 'LIKE', '%' . $searchText . '%')
                    ->orWhere('description', 'LIKE', '%' . $searchText . '%')
                    ->orWhere('search_tags', 'LIKE', '%' . $searchText . '%');
            });
        }

        $filteredServices = $services->get();

        return view('search', compact('filteredVendors', 'filteredServices', 'categories', 'city', 'searchText', 'faqs'));
    }

    public function privacyPolicy()
    {
        return view('privacyPolicy');
    }
    public function t_and_c()
    {
        return view('t_and_c');
    }
}
