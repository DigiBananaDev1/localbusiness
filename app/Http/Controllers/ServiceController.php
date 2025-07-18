<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Vendor;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($vendor_id)
    {
        $vendor = Vendor::where('id', $vendor_id)
            ->with('category')
            ->first();
        // dd($vendor);
        $services = Service::where('vendor_id', $vendor_id)->get();
        return view('vendor.viewServices', compact('vendor', 'services'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    public function bulkServices($vendor_id)
    {
        $vendor = Vendor::where('id', $vendor_id)->with('category')->first();
        return view('vendor.service.bulkServices', ['vendor' => $vendor]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $vendor_id)
    {
        $request->validate([
            'name' => 'required',
            'mrp' => 'required',
            'description' => 'required',
            'image' => 'required|image|mimes:jpg,jpeg,png,gif,svg|max:2048',
            'search_tags' => 'required',
        ]);

        // Store the image
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . 'upload' . '.' . $image->getClientOriginalExtension();
            $ImageWithpath = $image->storeAs('uploads', $imageName, 'public'); // Save to storage/app/public/upload
        }
        // dd($request->all(), $ImageWithpath);

        $service = new Service();
        $service->name = $request->name;
        $service->image = $ImageWithpath;
        // $service->path = $path;
        $service->mrp = $request->mrp;
        $service->description = $request->description;
        $service->search_tags = $request->search_tags;
        $service->vendor_id = $vendor_id;
        $service->save();
        return redirect()->route('vendor.viewServices', $vendor_id)->with('success', 'Service Added Successfully');
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
    public function edit($service_id, $vendor_id)
    {
        $vendor = Vendor::where('id', $vendor_id)
            ->with('category')
            ->first();
        $service = Service::find($service_id);
        return view('vendor.service.editServices', compact('service', 'vendor'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $service_id)
    {

        $request->validate([
            'name' => 'required',
            'mrp' => 'required',
            'description' => 'required',
            'image' => 'image|mimes:jpg,jpeg,png,gif,svg|max:2048',
            'search_tags' => 'required',
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . 'upload' . '.' . $image->getClientOriginalExtension();
            $ImageWithpath = $image->storeAs('uploads', $imageName, 'public'); // Save to storage/app/public/upload
        }
        $service = Service::find($service_id);

        if (!empty($ImageWithpath)) {
            $service->image = $ImageWithpath;
        }
        $service->name = $request->name;
        $service->mrp = $request->mrp;
        $service->description = $request->description;
        $service->search_tags = $request->search_tags;
        $service->save();

        return redirect()->route('vendor.viewServices', [$service->vendor_id])->with('success', 'Service Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($service_id)
    {
        $service = Service::find($service_id);

        $service->delete();
        // return redirect()->route('vendor.viewServices', [$service->vendor_id])->with(
        //     'success',
        //     'Service Deleted Successfully'
        // );
        return back()
            ->with('success', 'Service Deleted Successfully');
    }
}
