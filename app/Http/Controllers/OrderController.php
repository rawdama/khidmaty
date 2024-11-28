<?php

namespace App\Http\Controllers;
use App\Models\Order;
use  App\Models\Client;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
{
    $productId = $request->query('product_id');

    if ($productId) {
        $orders = Order::whereHas('orderItems', function ($query) use ($productId) {
            $query->where('product_id', $productId);
        })->with('client')->get();
    } else {
        $orders = Order::with('client')->get();
    }

    return view('pages.orders.index', compact('orders'));
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
   
    $order = Order::with('orderItems.product')->findOrFail($id);
    return response()->json($order); 
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
