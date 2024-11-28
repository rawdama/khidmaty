<?php

namespace App\Http\Controllers;

use App\Models\Wallet;
use Illuminate\Http\Request;
use App\Models\Store;
use Illuminate\Support\Facades\DB;


class WalletController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       
        $stores = Store::with(['orderItems' => function ($query) {
            $query->select('store_id', DB::raw('SUM(order_items.total_price) as total_sales')) 
                  ->join('orders', 'order_items.order_id', '=', 'orders.id')
                  ->whereNotIn('orders.status', ['مرفوض', 'قيد المعالجة']) 
                  ->groupBy('store_id');
        }])->get();
    
        
        $storeData = $stores->map(function ($store) {
            $totalSales = $store->orderItems->sum('total_sales') ?? 0;
    
            
            Wallet::updateOrCreate(
                ['store_id' => $store->id],
                ['total_sales' => $totalSales, 'name' => $store->name, 'email' => $store->email, 'phone' => $store->phone]
            );
    
            return [
                'name' => $store->name,
                'email' => $store->email,
                'phone' => $store->phone,
                'total_sales' => $totalSales,
            ];
        });
    
        return view('pages.wallet.index', compact('storeData'));
    }
    public function topSellingStores()
    {
       
        $topStores = Wallet::orderBy('total_sales', 'desc')
            ->with('store')
            ->take(10)
            ->get();
        return view('pages.wallet.top-selling', compact('topStores'));
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
    public function show(Wallet $wallet)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Wallet $wallet)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Wallet $wallet)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Wallet $wallet)
    {
        //
    }
}
