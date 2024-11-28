<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Product;

class CartController extends Controller
{
    public function addToCart(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
        ]);
    
        $client = auth('client')->user();
        $product = Product::find($request->product_id);
    
        
        $inputQuantity = $request->quantity;
        $totalPrice = $product->final_price* $inputQuantity;
    
  
        $cartItem = Cart::where('client_id', $client->id)
            ->where('product_id', $request->product_id)
            ->first();
    
        if ($cartItem) {
          
            $cartItem->quantity += $inputQuantity;
            $cartItem->total_price = $cartItem->quantity * $product->final_price; 
        } else {
            $cartItem = new Cart();
            $cartItem->client_id = $client->id;
            $cartItem->product_id = $request->product_id;
            $cartItem->quantity = $inputQuantity;
            $cartItem->total_price = $totalPrice;
        }
    
        $cartItem->save();
    
        return response()->json(['message' => 'Product added to cart successfully.']);
    }

    public function viewCart()
{
    $client = auth('client')->user();
    $cartItems = Cart::with('product')->where('client_id', $client->id)->get();
    $formattedCartItems = $cartItems->map(function ($cartItem) {
    
        $totalPrice = $cartItem->quantity * $cartItem->product->final_price;

        return [
            'quantity' => $cartItem->quantity,
            'name' => $cartItem->product->name, 
           // 'price' => $cartItem->product->price,
            'total_price' => $totalPrice, 
        ];
    });

    return response()->json($formattedCartItems);
}

    public function removeFromCart($id)
    {
        $client = auth('client')->user();
        if (!$client) {
            return response()->json(['message' => 'Client not authenticated.'], 401);}
        $cartItem = Cart::where('client_id', $client->id)->where('product_id', $id)->first();
        if ($cartItem) {
            $cartItem->delete();
            return response()->json(['message' => 'Product removed from cart successfully.']);
        }

        return response()->json(['message' => 'Cart item not found.'], 404);
    }
}