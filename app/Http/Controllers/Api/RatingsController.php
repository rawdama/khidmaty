<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Rating;
use App\Models\Product;
use App\Models\Store;

class RatingsController extends Controller
{
    public function rateProduct(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'store_id' => 'required|exists:stores,id',
            'rating' => 'required|integer|between:1,5',
            'comment' => 'nullable|string',
        ]);

        $client = auth('client')->user();

        // Check if the client has already rated the product
        $rating = Rating::updateOrCreate(
            ['client_id' => $client->id, 
            'product_id' => $request->product_id,
            'store_id'=>$request->store_id
        ],
            ['rating' => $request->rating, 
            'comment' => $request->comment]
        );

        return response()->json(['message' => 'Rating submitted successfully.']);
    }
    
    public function viewProductRatings($productId)
    {
        $ratings = Rating::with('client')->where('product_id', $productId)->get();

        return response()->json($ratings);
    }

    public function removeRating($id)
    {
        $client = auth('client')->user();
        $rating = Rating::where('client_id', $client->id)->where('id', $id)->first();

        if ($rating) {
            $rating->delete();
            return response()->json(['message' => 'Rating removed successfully.']);
        }

        return response()->json(['message' => 'Rating not found.'], 404);
    }

}
