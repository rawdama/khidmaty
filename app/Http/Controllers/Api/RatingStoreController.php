<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RatingStore;
use App\Models\Store;

class RatingStoreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $client = auth('client')->user();
        $ratings = RatingStore::where('client_id', $client->id)->get();
        return response()->json($ratings);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'store_id' => 'required|exists:stores,id',
            'rating' => 'required|integer|between:1,5',
            'comment' => 'nullable|string',
        ]);

        $client = auth('client')->user();

        // Check if the client has already rated the store
        $rating = RatingStore::updateOrCreate(
            [
                'client_id' => $client->id, 
                'store_id' => $request->store_id
            ],
            [
                'rating' => $request->rating, 
                'comment' => $request->comment
            ]
        );

        return response()->json(['message' => 'Rating submitted successfully.'], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $rating = RatingStore::with('client')->findOrFail($id);
        return response()->json($rating);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'rating' => 'required|integer|between:1,5',
            'comment' => 'nullable|string',
        ]);

        $client = auth('client')->user();
        $rating = RatingStore::where('client_id', $client->id)->where('id', $id)->firstOrFail();

        $rating->update($request->only(['rating', 'comment']));

        return response()->json(['message' => 'Rating updated successfully.']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $client = auth('client')->user();
        $rating = RatingStore::where('client_id', $client->id)->where('id', $id)->first();

        if ($rating) {
            $rating->delete();
            return response()->json(['message' => 'Rating removed successfully.']);
        }

        return response()->json(['message' => 'Rating not found.'], 404);
    }
}