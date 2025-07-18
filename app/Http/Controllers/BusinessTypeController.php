<?php

namespace App\Http\Controllers;
use App\Models\BusinessType;
use Illuminate\Http\Request;

class BusinessTypeController extends Controller
{
    public function index()
    {
        $types = BusinessType::all();
        return view('admin.business_types.index', compact('types'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:business_types,name',
        ]);

        BusinessType::create(['name' => strtolower($request->name)]);

        return redirect()->back()->with('success', 'Business type added.');
    }

    public function update(Request $request, BusinessType $businessType)
    {
        $request->validate([
            'name' => 'required|unique:business_types,name,' . $businessType->id,
        ]);

        $businessType->update(['name' => strtolower($request->name)]);

        return redirect()->route('business-types.index')->with('success', 'Business type updated.');
    }

    public function destroy(BusinessType $businessType)
    {
        $businessType->delete();

        return redirect()->back()->with('success', 'Business type deleted.');
    }

}
