<?php

namespace App\Http\Controllers;

use App\Models\RatingStore;
use Illuminate\Http\Request;

class RatingStoreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function mostPreferred(){
        $preferedStores=RatingStore::orderBy('rating','desc')
        ->take(10)
        ->get();
        return view('pages.ratings.preferedStore', compact('preferedStores'));
            
    }
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(RatingStore $ratingStore)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(RatingStore $ratingStore)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, RatingStore $ratingStore)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RatingStore $ratingStore)
    {
        //
    }
}
