<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::orderBy('id', 'DESC')->paginate(10);
        return view('admin.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.category.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     'name' => 'required',
        //     'image' => 'required|image|mimes:jpg,jpeg,png,gif,svg|max:2048',
        // ]);
        // $imageName = time() . '.' . $request->image->getClientOriginalExtension();
        // $request->image->move(public_path('images/category'), $imageName);

        $categories = [
            ['name' => 'AC Services', 'image' => 'acservice.svg'],
            ['name' => 'Astrologers', 'image' => 'astrologers.svg'],
            ['name' => 'Body Massage Centers', 'image' => 'masseur.svg'],
            ['name' => 'Beauty Spa', 'image' => 'beauty.svg'],
            ['name' => 'Car Hire', 'image' => 'cabcarrental.svg'],
            ['name' => 'Caterers', 'image' => 'caterers.svg'],
            ['name' => 'Chartered Accountant', 'image' => 'charteredaccountants.svg'],
            ['name' => 'Computer Training Institute', 'image' => 'computertraininginstitutes.svg'],
            ['name' => 'Courier Services', 'image' => 'internationalcourierservices.svg'],
            ['name' => 'Computer & Laptop Repair & Services', 'image' => 'computerrepairs.svg'],
            ['name' => 'Car Repair & Services', 'image' => 'carrepairservices.svg'],
            ['name' => 'Dermatologists', 'image' => 'dermatologists.svg'],
            ['name' => 'Dentists', 'image' => 'dentists.svg'],
            ['name' => 'Electricians', 'image' => 'electricians.svg'],
            ['name' => 'Event Organizer', 'image' => 'eventorganizers.svg'],
            ['name' => 'Real Estate', 'image' => 'realestate.svg'],
            ['name' => 'Fabricators', 'image' => 'fabricators.svg'],
            ['name' => 'Furniture Repair Services', 'image' => 'furniture.svg'],
            ['name' => 'House Keeping Services', 'image' => 'housekeeping.svg'],
            ['name' => 'Hobbies', 'image' => 'hobbies.svg'],
            ['name' => 'Interior Designers', 'image' => 'interiordesigners.svg'],
            ['name' => 'Internet Website Designers', 'image' => 'internet.svg'],
            ['name' => 'Jwellery Showrooms', 'image' => 'jewellery.svg'],
            ['name' => 'Lawyers', 'image' => 'lawyers.svg'],
            ['name' => 'Transporters', 'image' => 'transporters.svg'],
            ['name' => 'Photographers', 'image' => 'photographers.svg'],
            ['name' => 'Nursing Services', 'image' => 'nursebureaus.svg'],
            ['name' => 'Printing & Publishing Services', 'image' => 'flexprintingservices.svg'],
            ['name' => 'Placement Services', 'image' => 'jobs.svg'],
            ['name' => 'Pest Control Services', 'image' => 'pestcontrol.svg'],
            ['name' => 'Painting Contractors', 'image' => 'paintingcontractors.svg'],
            ['name' => 'Packers & Movers', 'image' => 'packersandmovers.svg'],
            ['name' => 'Scrap Dealers', 'image' => 'scrap-dealers.svg'],
            ['name' => 'Scrap Buyers', 'image' => 'scrap-dealers.svg'],
            ['name' => 'Registration Consultants', 'image' => 'registrationconsultants.svg'],
            ['name' => 'Security System', 'image' => 'securitycctv.svg'],
            ['name' => 'Coaching', 'image' => 'coaching.svg'],
            ['name' => 'Vocational Training', 'image' => 'traininginstitutes.svg'],
        ];
        Category::insert($categories);

        // Category::create([
        //     'name' => $request->name,
        //     'image' => $imageName,
        // ]);

        Log::info('Admin Log', ['message' => $request->name . 'Category Created by admin']);

        return redirect()->route('admin.category')->with('success', 'Category created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $category = Category::find($id);
        return view('admin.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'image|mimes:jpg,jpeg,png,gif,svg|max:2048',
        ]);

        $category = Category::find($id);
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->getClientOriginalExtension();
            $request->image->move(public_path('images/category'), $imageName);
            $category->update([
                'name' => $request->name,
                'image' => $imageName,
            ]);
        } else {
            $category->update([
                'name' => $request->name,
            ]);
        }
        Log::info('Admin Log', ['message' => $category->name . ' category updated']);

        return redirect()->route('admin.category')->with('success', 'Category updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $decoded_id = base64_decode($id);
        $category = Category::find($decoded_id);
        $category->delete();
        Log::warning('Admin Log', ['message' => $category->name . ' category deleted']);
        return redirect()->route('admin.category')->with('success', 'Category Deleted successfully');
    }
}
