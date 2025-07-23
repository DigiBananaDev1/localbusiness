<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Service;
use App\Models\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // public function index($vendor_id)
    // {
    //     $vendor = Vendor::where('id', $vendor_id)
    //         ->with('category')
    //         ->first();



    //     $products = Product::where('vendor_id', $vendor_id)->get();


    //     return view('vendor.viewServices', compact('vendor', 'products'));
    // }
    public function index($vendor_id)
    {
        $vendor = Vendor::with('products.category')->findOrFail($vendor_id);
        $products = $vendor->products()->with('category')->latest()->get();

        return view('vendor.product.index', compact('products', 'vendor'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($vendor_id)
    {
        //
        $vendor = Vendor::where('id', $vendor_id)
            ->with('category')
            ->first();
        $categories = Category::with('children.children')->whereNull('parent_id')->get();

        foreach ($categories as $main) {
            $main->depth = 0;
            foreach ($main->children as $sub) {
                $sub->depth = 1;
                foreach ($sub->children as $child) {
                    $child->depth = 2;
                }
            }
        }
        return view('vendor.product.create', compact('categories', 'vendor'));
    }

    public function bulkServices($vendor_id)
    {
        $vendor = Vendor::where('id', $vendor_id)->with('category')->first();
        return view('vendor.service.bulkServices', ['vendor' => $vendor]);
    }

    /**
     * Store a newly created resource in storage.
     */
    // public function store(Request $request, $vendor_id)
    // {
    //     $request->validate([
    //         'name' => 'required',
    //         'mrp' => 'required',
    //         'description' => 'required',
    //         'image' => 'required|image|mimes:jpg,jpeg,png,gif,svg|max:2048',
    //         'search_tags' => 'required',
    //     ]);

    //     // Store the image
    //     if ($request->hasFile('image')) {
    //         $image = $request->file('image');
    //         $imageName = time() . '_' . 'upload' . '.' . $image->getClientOriginalExtension();
    //         $ImageWithpath = $image->storeAs('uploads', $imageName, 'public'); // Save to storage/app/public/upload
    //     }
    //     // dd($request->all(), $ImageWithpath);

    //     $service = new Service();
    //     $service->name = $request->name;
    //     $service->image = $ImageWithpath;
    //     // $service->path = $path;
    //     $service->mrp = $request->mrp;
    //     $service->description = $request->description;
    //     $service->search_tags = $request->search_tags;
    //     $service->vendor_id = $vendor_id;
    //     $service->save();
    //     return redirect()->route('vendor.viewProduct', $vendor_id)->with('success', 'Service Added Successfully');
    // }



    public function store(Request $request, $vendor_id)
    {
        // Step 1: Validation
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'mrp' => 'required|numeric',
            'image' => 'required|image|max:2048',
            'category_id' => 'required|exists:categories,id',
            'search_tags' => 'required|string',
            'bunch' => 'nullable|string',
        ]);

        // Step 2: Handle Image Upload
        $imagePath = null;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();

            // Move file to 'public/uploads/products' folder
            $destinationPath = public_path('products');
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0755, true); // Create directory if not exists
            }

            $image->move($destinationPath, $imageName);

            // Set relative path to save in DB
            $imagePath = 'products/' . $imageName;
        }


        // Step 3: Create Product
        $product = new Product();
        $product->vendor_id = $vendor_id;
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->mrp = $request->mrp;
        $product->image = $imagePath;
        $product->category_id = $request->category_id;
        $product->search_tags = $request->search_tags;
        $product->bunch = $request->bunch;
        $product->save();

        // Step 4: Redirect or JSON Response
        return redirect()->back()->with('success', 'Product created successfully!');
    }
    public function storeBulk(Request $request, $vendor_id)
    {
        $request->validate([
            'excelFile' => 'required|mimes:xls,xlsx,csv',
        ]);

        $data = Excel::toArray(null, $request->file('excelFile'));
        $rows = $data[0];
        foreach ($rows as $index => $row) {
            // Skip heading row if needed (optional)
            if ($index === 0 && $row['0'] === 'name') {
                continue;
            }

            $service = new Service();
            $service->name = $row['0'];
            $service->image = $row['2'];
            $service->mrp = $row['3'];
            $service->description = $row['1'];
            $service->search_tags = $row['4'];
            $service->vendor_id = $vendor_id;
            $service->save();
        }
        return redirect()->route('vendor.viewServices', $vendor_id)->with('success', 'Service Added Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    // public function edit($service_id, $vendor_id)
    // {
    //     $vendor = Vendor::where('id', $vendor_id)
    //         ->with('category')
    //         ->first();
    //     $service = Service::find($service_id);
    //     return view('vendor.service.editServices', compact('service', 'vendor'));
    // }

    // /**
    //  * Update the specified resource in storage.
    //  */
    // public function update(Request $request, $service_id)
    // {

    //     $request->validate([
    //         'name' => 'required',
    //         'mrp' => 'required',
    //         'description' => 'required',
    //         'image' => 'image|mimes:jpg,jpeg,png,gif,svg|max:2048',
    //         'search_tags' => 'required',
    //     ]);

    //     if ($request->hasFile('image')) {
    //         $image = $request->file('image');
    //         $imageName = time() . '_' . 'upload' . '.' . $image->getClientOriginalExtension();
    //         $ImageWithpath = $image->storeAs('uploads', $imageName, 'public'); // Save to storage/app/public/upload
    //     }
    //     $service = Service::find($service_id);

    //     if (!empty($ImageWithpath)) {
    //         $service->image = $ImageWithpath;
    //     }
    //     $service->name = $request->name;
    //     $service->mrp = $request->mrp;
    //     $service->description = $request->description;
    //     $service->search_tags = $request->search_tags;
    //     $service->save();

    //     return redirect()->route('vendor.viewServices', [$service->vendor_id])->with('success', 'Service Updated Successfully');
    // }


    // Edit View
    public function edit($vendor_id, $product_id)
    {
        $vendor = Vendor::findOrFail($vendor_id);
        $product = Product::where('vendor_id', $vendor_id)->findOrFail($product_id);
        $categories = Category::with('children.children')
            ->whereNull('parent_id')
            ->where('id', '!=', $product->category_id) // prevent selecting itself as parent
            ->get();

        return view('vendor.product.edit', compact('vendor', 'product', 'categories'));
    }

    // Update Logic
    public function update(Request $request, $product_id, $vendor_id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'mrp' => 'nullable|numeric',
            'price' => 'required|numeric',
            'bunch' => 'nullable|numeric',
            'category_id' => 'required|exists:categories,id',
            'description' => 'required|string',
            'search_tags' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $product = Product::where('vendor_id', $vendor_id)->findOrFail($product_id);

        $product->name = $request->name;
        $product->mrp = $request->mrp;
        $product->price = $request->price;
        $product->bunch = $request->bunch;
        $product->category_id = $request->category_id;
        $product->description = $request->description;
        $product->search_tags = $request->search_tags;

        // Handle image update
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $destinationPath = public_path('products');

            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0755, true);
            }

            $image->move($destinationPath, $imageName);
            $product->image = 'products/' . $imageName;
        }

        $product->save();

        return redirect()->route('vendor.viewproducts', $vendor_id)->with('success', 'Product updated successfully!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($vendor_id, $product_id)
    {
        $product = Product::where('vendor_id', $vendor_id)->findOrFail($product_id);

        // Optional: delete image file from storage
        if ($product->image && file_exists(public_path($product->image))) {
            unlink(public_path($product->image));
        }

        $product->delete();

        return redirect()->route('vendor.viewproducts', $vendor_id)->with('success', 'Product deleted successfully.');
    }




    public function storeMultiple(Request $request, $vendor_id)
    {
        $request->validate([
            'products.*.name' => 'required|string|max:255',
            'products.*.description' => 'required|string',
            'products.*.price' => 'required|numeric',
            'products.*.mrp' => 'required|numeric',
            'products.*.image' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'products.*.category_id' => 'required|exists:categories,id',
            'products.*.search_tags' => 'nullable|string',
            'products.*.bunch' => 'required|numeric',

        ]);

        foreach ($request->products as $index => $data) {
            $product = new Product();
            $product->vendor_id = $vendor_id;
            $product->name = $data['name'];
            $product->description = $data['description'];
            $product->price = $data['price'];
            $product->mrp = $data['mrp'] ?? null;
            $product->bunch = $data['bunch'] ?? null;
            $product->category_id = $data['category_id'];
            $product->search_tags = $data['search_tags'] ?? null;
            $product->slug = Str::slug($data['name']);

            // Handle image upload (using move)
            if (isset($data['image'])) {
                $image = $data['image'];
                $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('products'), $imageName);
                $product->image = 'products/' . $imageName;
            }

            $product->save();
        }

        return redirect()->route('vendor.viewproducts', $vendor_id)->with('success', 'Products added successfully!');
    }



}
