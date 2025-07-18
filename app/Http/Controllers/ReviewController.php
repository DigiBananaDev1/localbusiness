<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $request->validate([
            'user_id' => 'required|exists:users,id', // Ensure user exists in the users table
            'vendor_id' => 'required|exists:vendors,id', // Ensure vendor exists
            'service_id' => 'nullable|exists:services,id', // If service_id is provided, it must exist
            'rating' => 'required|numeric|between:1,5',
            'review' => 'required|string|max:1000', // Optional: Limit review length
        ]);
        
        // dd($request->all());
        $review = new Review();
        $review->user_id = $request->user_id;
        $review->vendor_id = $request->vendor_id;
        $review->service_id = $request->service_id;
        $review->rating = $request->rating;
        $review->review = $request->review;
        $review->save();

        return back()->with(['success' => 'Review submitted successfully.']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Review $review)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Review $review)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Review $review)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Review $review)
    {
        //
    }
}
