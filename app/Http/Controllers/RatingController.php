<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\OrderItem;
use Illuminate\Support\Facades\DB;

use App\Models\Rating;
class RatingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $productId = $request->query('product_id'); 
        $ratings = Rating::where('product_id', $productId)->with(['client'])->get();
        $firstRating = $ratings->first();
        return view('pages.ratings.show', compact('ratings', 'firstRating', 'productId'));
    }
    public function mostPreferred(){
        $preferedStores=Rating::orderBy('rating','desc')
        ->take(10)
        ->get();
        return view('pages.ratings.preferedProduct', compact('preferedStores'));
            
    }

    public function mostSoldProducts()
{
    
    $products = Product::withCount('orderItems')
        ->orderBy('order_items_count', 'desc')
        ->get();

        $totalSold = $products->sum('order_items_count');
    return view('pages.wallet.top-selling-product', compact('products','totalSold'));
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
    public function show(string $id)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
