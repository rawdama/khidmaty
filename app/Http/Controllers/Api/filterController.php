<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class filterController extends Controller
{
    public function filterBybrand($brandId){
        $products=Product::where('brand_id',$brandId)->get();

        $response = $products->map(function ($product) {
            return [
                'name' => $product->name, 
                'desc' => $product->desc,
                'photo' => $product->photo,
                'price' => $product->price,
                'code' => $product->code,
                'offer' => $product->offer,
               
            ];
        }
    );
    
        return response()->json($response);
    }

    public function filterBymodel(Request $request){
        $model = $request->input('model');
        if (!$model) {
            return response()->json(['error' => 'Model date is required'], 400);
        }
        $products=Product::where('model',$model)->get();
    
        $response = $products->map(function ($product) {
            return [
                
                'name' => $product->name, 
                'desc' => $product->desc,
                'photo' => $product->photo,
                'price' => $product->price,
                'code' => $product->code,
                'offer' => $product->offer,
               
            ];
        }
    );
    
        return response()->json($response);
    }

    public function filterBycar($carId){
        $products=Product::where('car_id',$carId)->get();
    
    
        $response = $products->map(function ($product) {
            return [
                
                'name' => $product->name, 
                'desc' => $product->desc,
                'photo' => $product->photo,
                'price' => $product->price,
                'code' => $product->code,
                'offer' => $product->offer,
               
            ];
        }
    );
    
        return response()->json($response);
    }

    
}
