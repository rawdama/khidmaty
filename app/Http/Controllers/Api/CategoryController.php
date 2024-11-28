<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductDepartment;
use App\Models\ProductDepartmentTranslation;
use App\Models\ProductStore;
use App\Models\Product;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        
        $locale = app()->getLocale();
        $productDepartments = ProductDepartment::all();

        $response = $productDepartments->map(function($department) use ($locale) {
            $translation = ProductDepartmentTranslation::where('product_department_id', $department->id)
                ->where('locale', $locale)
                ->first();
            return [
                'name' => $translation ? $translation->name : null,
                'photo' => $department->photo, 
            ];
        });

        return response()->json($response);
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
    public function getProductsByCategory($categoryId)
{
    
    $products = Product::where('product_department_id', $categoryId)->with(['productType', 'store', 'brand', 'car'])->get();
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
    public function allProducts()
    {
        
        $products=Product::all();
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
