<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductFavorite;
use App\Models\StoreFavorite;

class FavoritesController extends Controller
{
    public function addProductFavorite(Request $request)
{
    $request->validate([
        'product_id' => 'required|exists:products,id',
    ]);
    $client = auth('client')->user();
    $existingFavorite = ProductFavorite::where('client_id', $client->id)
                                    ->where('product_id', $request->product_id)
                                    ->first();
    if ($existingFavorite) {
        return response()->json(['message' => 'Product is already in favorites.'], 409); 
    }

    ProductFavorite::create([
        'client_id' => $client->id,
        'product_id' => $request->product_id,
    ]);

    return response()->json(['message' => 'Product added to favorites.']);
}

    public function removeProductFavorite(Request $request, $productId)
    {
        $client = auth('client')->user();
        $favorite = ProductFavorite::where('client_id', $client->id)->where('product_id', $productId)->first();

        if ($favorite) {
            $favorite->delete();
            return response()->json(['message' => 'Product removed from favorites.']);
        }

        return response()->json(['message' => 'Favorite not found.'], 404);
    }

    public function viewProductFavorites()
    {
        $client = auth('client')->user();
        $favorites = ProductFavorite::with('product')->where('client_id', $client->id)->get();
        $response = $favorites->map(function ($favorite) {
            $product = $favorite->product; 
    
            return [
                'name' => $product->name,
                'photo' => $product->photo,
                'desc' => $product->desc,
                'price' => $product->price,
                'code' => $product->code,
                'offer' => $product->offer,
            ];
        });
    
        return response()->json([
            'success' => true,
            'favorites' => $response,
        ], 200);
    }

    public function addStoreFavorite(Request $request)
    {
        $request->validate([
            'store_id' => 'required|exists:stores,id',
        ]);
    
        $client = auth('client')->user();
    
        
        $existingFavorite = StoreFavorite::where('client_id', $client->id)
                                        ->where('store_id', $request->store_id)
                                        ->first();
    
        if ($existingFavorite) {
            return response()->json(['message' => 'Store is already in favorites.'], 409); 
        }
        StoreFavorite::create([
            'client_id' => $client->id,
            'store_id' => $request->store_id,
        ]);
    
        return response()->json(['message' => 'Store added to favorites.']);
    }
    public function removeStoreFavorite(Request $request, $storeId)
{
    $client = auth('client')->user();
    $favorite = StoreFavorite::where('client_id', $client->id)->where('store_id', $storeId)->first();

    if ($favorite) {
        $favorite->delete();
        return response()->json(['message' => 'Store removed from favorites.']);
    }

    return response()->json(['message' => 'Favorite not found.'], 404);
}

   
    public function viewStoreFavorites()
    {
        $client = auth('client')->user();
        $favorites = StoreFavorite::with('store')->where('client_id', $client->id)->get();
        $response=$favorites->map(function($favorite){
            $store=$favorite->store;
            return [
                
                'name' => $store->name,
            ];

        });
        return response()->json([
            'success' => true,
            'favorites' => $response,
        ], 200);
        
    }


}
