<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Cart;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderItem;


class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $client=auth('client')->user();
        $clientId=$client->id;
        $orders=Order::where('client_id',$clientId)->get();
        return response()->json($orders, 201);

    }
    public function getCurrentOrdersForClient()
{
    $client = auth('client')->user();
    $clientId = $client->id;

    
    $currentOrders = Order::where('client_id', $clientId)
        ->whereNotIn('status', ['تم الشحن', 'مرفوض']) 
        ->get();

    return response()->json($currentOrders, 200);
}

public function getPreviousOrdersForClient()
{
    $client = auth('client')->user();
    $clientId = $client->id;

    // Fetch previous orders (shipped) for the client
    $previousOrders = Order::where('client_id', $clientId)
        ->where('status', 'تم الشحن')
        ->get();

    return response()->json($previousOrders, 200);
}

public function getCurrentOrdersForStore()
{
    $store = auth('store')->user();
    $storeId = $store->id;
    $previousOrders = Order::whereHas('orderItems', function ($query) use ($storeId) {
        $query->where('store_id', $storeId);
    })-> whereNotIn('status', ['تم الشحن', 'مرفوض'])->get();

    return response()->json($previousOrders, 200);

}

public function getPreviousOrdersForStore()
{
    $store = auth('store')->user();
    $storeId = $store->id;
    $previousOrders = Order::whereHas('orderItems', function ($query) use ($storeId) {
        $query->where('store_id', $storeId);
    })->where('status', 'تم الشحن')->get();

    return response()->json($previousOrders, 200);
}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'address' => 'required|string',
            'delivery_method' => 'required|in:توصيل,استلام من المتاجر',
            'payment_type' => 'required|in:الكاش,باي بال',
            'notes' => 'nullable|string',
        ]);
    
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }
    
        $client = auth('client')->user();
        $clientId = $client->id; 
        $clientName = $client->name;
        $cartItems = Cart::where('client_id', $clientId)->get();
    
        if ($cartItems->isEmpty()) {
            return response()->json(['message' => 'Cart is empty'], 400);
        }
    
        $totalPrice = 0;
    
       
        $order = Order::create([
            'client_id' => $clientId,
            'client_name' => $clientName,
            'address' => $request->address,
            'delivery_method' => $request->delivery_method,
            'payment_type' => $request->payment_type,
            'notes' => $request->notes,
            'total_price' => $totalPrice, 
        ]);
    
        foreach ($cartItems as $item) {
            $product = $item->product;
    
          
            $finalPrice = $product->final_price;  
            $lineTotal = $finalPrice * $item->quantity; 
            $totalPrice += $lineTotal; 
    
            OrderItem::create([
                'order_id' => $order->id, 
                'cart_id' => $item->id, 
                'product_id' => $product->id, 
                'store_id' => $product->store_id,
                'quantity' => $item->quantity, 
                'price' => $finalPrice,  
                'total_price' => $lineTotal,
            ]);
        }
        $order->update(['total_price' => $totalPrice]);

        Cart::where('client_id', $clientId)->delete();
    
        return response()->json($order, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
       
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $orderId)
    {
        $client = auth('client')->user();
        $order = Order::where('client_id', $client->id)->where('id', $orderId)->first();
    
        if (!$order) {
            return response()->json(['message' => 'Order not found.'], 404);
        }

        if (in_array($order->status, ['قيد المعالجة', 'تمت الموافقة'])) {
            $order->delete();
            return response()->json(['message' => 'Order removed successfully.']);
        }
    
        return response()->json(['message' => 'Order cannot be deleted due to its current status.'], 403);
    }
    


 
public function acceptOrder($orderId)
{
    $store = auth('store')->user(); 
    $order = Order::find($orderId);

    if (!$order) {
        return response()->json(['message' => 'Order not found.'], 404);
    }
    $orderItems = $order->orderItems()->where('store_id', $store->id)->get();

    if ($orderItems->isEmpty()) {
        return response()->json(['message' => 'You do not have permission to modify this order.'], 403);
    }

    $order->status = 'تمت الموافقة'; 
    $order->save();

    return response()->json(['message' => 'Order accepted.', 'order' => $order], 200);
}

public function rejectOrder($orderId)
{
    $store = auth('store')->user();
    $order = Order::find($orderId);

    if (!$order) {
        return response()->json(['message' => 'Order not found.'], 404);
    }

    $orderItems = $order->orderItems()->where('store_id', $store->id)->get();

    if ($orderItems->isEmpty()) {
        return response()->json(['message' => 'You do not have permission to modify this order.'], 403);
    }

    $order->delete(); 
     $order->orderItems()->delete(); 

    return response()->json(['message' => 'Order rejected and deleted.'], 200);
}


public function shipOrder($orderId)
{
    $store = auth('store')->user();
    $order = Order::find($orderId);

    if (!$order) {
        return response()->json(['message' => 'Order not found.'], 404);
    }

    $orderItems = $order->orderItems()->where('store_id', $store->id)->get();

    if ($orderItems->isEmpty()) {
        return response()->json(['message' => 'You do not have permission to modify this order.'], 403);
    }

    $order->status = 'جاري الشحن';
    $order->save();

    return response()->json(['message' => 'Order is now being shipped.', 'order' => $order], 200);
}

public function completeShipping($orderId)
{
    $store = auth('store')->user();
    $order = Order::find($orderId);

    if (!$order) {
        return response()->json(['message' => 'Order not found.'], 404);
    }

    $orderItems = $order->orderItems()->where('store_id', $store->id)->get();

    if ($orderItems->isEmpty()) {
        return response()->json(['message' => 'You do not have permission to modify this order.'], 403);
    }

    $order->status = 'تم الشحن';
    $order->save();

    return response()->json(['message' => 'Order has been shipped.', 'order' => $order], 200);
}
public function storeOrders(){
    $store=auth('store')->user();
    $orders = Order::with('orderItems')->get();
    $storeOrders = $orders->filter(function ($order) use ($store) {
    return $order->orderItems->contains('store_id', $store->id);
    });
    return response()->json($storeOrders, 200);
}
}
