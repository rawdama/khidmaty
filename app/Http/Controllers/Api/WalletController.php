<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

use App\Models\Wallet;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use App\Models\Store;

class WalletController extends Controller
{
    public function salesWithorders(){
        $store=auth('store')->user();
        $wallet=Wallet::where('store_id',$store->id)->first(['total_sales']);
        $orders = Order::whereHas('orderItems', function ($query) use ($store) {
            $query->where('store_id', $store->id);
        })->get('payment_type','total_price');
        return response()->json([
            'wallet' => $wallet,
            'orders' => $orders,
        ], 200);


    } 
}
