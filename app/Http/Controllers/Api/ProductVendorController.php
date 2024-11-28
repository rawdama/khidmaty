<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use  App\Traits\UploadImageTrait;
use App\Models\Product;

class ProductVendorController extends Controller
{
    use UploadImageTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $store = auth('store')->user();
        
        // Retrieve products that belong to the authenticated store
        $products = Product::where('store_id', $store->id)->get();

        $response = $products->map(function ($product) {
            return [
                'name' => $product->name,
                'photo' => $product->photo,
            ];
        });

        return response()->json([
            'success' => true,
            'products' => $response,
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name_ar' => 'required|string',
            'name_en' => 'required|string',
            'desc_ar' => 'required|string',
            'desc_en' => 'required|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'type' => 'required|in:اصلي,مقلد',
            'model' => 'nullable|string|max:255',
            'offer' => 'in:يوجد عرض,لا يوجد عرض',
            'offer_type' => 'nullable|in:قيمة,نسبة %',
            'offer_value' => 'nullable|numeric',
            'from_date' => 'nullable|date',
            'to_date' => 'nullable|date',
            'product_type_id' => 'required|exists:product_types,id',
            'product_department_id' => 'required|exists:product_departments,id',
            'brand_id' => 'required|exists:brands,id',
            'car_id' => 'required|exists:cars,id',
            'price' => 'required|numeric',
            'code' => 'required|string|unique:products,code',
        ]);
    
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
    
        $product = new Product();
    
        foreach (config('app.languages') as $locale => $language) {
            $product->translateOrNew($locale)->name = $request->input("name_$locale");
            $product->translateOrNew($locale)->desc = $request->input("desc_$locale");
        }
    
        if ($request->hasFile('photo')) {
            $filename = 'products';
            $product->photo = $this->upload($request, $filename);
        }
    
        $store = auth('store')->user();
        $product->type = $request->input('type');
        $product->model = $request->input('model');
        $product->store_id = $store->id;
    
        if ($request->has('offerCheckbox')) {
            $product->offer = 'يوجد عرض';
            $product->offer_type = $request->input('offer_type');
            $product->offer_value = $request->input('offer_value');
            $product->from_date = $request->input('from_date');
            $product->to_date = $request->input('to_date');
        } else {
            $product->offer = 'لا يوجد عرض';
            $product->offer_type = null;
            $product->offer_value = null;
            $product->from_date = null;
            $product->to_date = null;
        }
    
        $product->product_department_id = $request->input('product_department_id');
        $product->product_type_id = $request->input('product_type_id');
        $product->brand_id = $request->input('brand_id');
        $product->car_id = $request->input('car_id');
        $product->price = $request->input('price');
        $product->code = $request->input('code');
    
        // Calculate final price
        $finalPrice = $product->price;
        if ($product->offer == 'يوجد عرض') {
            $offerValue = $request->input('offer_value', 0);
            if ($request->input('offer_type') === 'قيمة') {
                $finalPrice -= $offerValue;
            } elseif ($request->input('offer_type') === 'نسبة %') {
                $finalPrice -= ($product->price * ($offerValue / 100));
            }
        }
        $product->final_price = max(0, $finalPrice);
    
        $product->save();
    
        return response()->json([
            'message' => 'Product created successfully.',
            'product' => $product,
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $store = auth('store')->user();
        $product = Product::where('id', $id)->where('store_id', $store->id)->first();

        if (!$product) {
            return response()->json([
                'success' => false,
                'message' => 'Product not found or does not belong to your store.'
            ], 404);
        }

        $response = [
            'name' => $product->name, 
            'photo' => $product->photo,
            'desc' => $product->desc,
            'price' => $product->price,
            'code' => $product->code,
            'offer' => $product->offer,
        ];

        return response()->json([
            'success' => true,
            'product' => $response,
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $store = auth('store')->user();
    
        $request->validate([
            'name_ar' => 'required|string',
            'name_en' => 'required|string',
            'desc_ar' => 'required|string',
            'desc_en' => 'required|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'type' => 'required|in:اصلي,مقلد',
            'model' => 'nullable|string|max:255',
            'offer' => 'in:يوجد عرض,لا يوجد عرض',
            'offer_type' => 'nullable|in:قيمة,نسبة %',
            'offer_value' => 'nullable|numeric',
            'from_date' => 'nullable|date',
            'to_date' => 'nullable|date',
            'product_type_id' => 'required|exists:product_types,id',
            'product_department_id' => 'required|exists:product_departments,id',
            'brand_id' => 'required|exists:brands,id',
            'car_id' => 'required|exists:cars,id',
            'price' => 'required|numeric',
            'code' => 'required|string|unique:products,code,' . $id . ',id',
        ]);
    
        try {
            $product = Product::where('id', $id)->where('store_id', $store->id)->firstOrFail();
    
            foreach (config('app.languages') as $locale => $language) {
                $translation = $product->translateOrNew($locale);
                $translation->name = $request->input("name_$locale");
                $translation->desc = $request->input("desc_$locale");
                $translation->save();
            }
    
            if ($request->hasFile('photo')) {
                $this->deleteImage($product->photo);
                $filename = 'products';
                $product->photo = $this->upload($request, $filename);
            }
    
            $product->type = $request->input('type');
            $product->model = $request->input('model');
    
            if ($request->has('offerCheckbox')) {
                $product->offer = 'يوجد عرض';
                $product->offer_type = $request->input('offer_type');
                $product->offer_value = $request->input('offer_value');
                $product->from_date = $request->input('from_date');
                $product->to_date = $request->input('to_date');
            } else {
                $product->offer = 'لا يوجد عرض';
                $product->offer_type = null;
                $product->offer_value = null;
                $product->from_date = null;
                $product->to_date = null;
            }
    
            $product->product_department_id = $request->input('product_department_id');
            $product->product_type_id = $request->input('product_type_id');
            $product->brand_id = $request->input('brand_id');
            $product->car_id = $request->input('car_id');
            $product->price = $request->input('price');
            $product->code = $request->input('code');
    
            // Calculate final price
            $finalPrice = $product->price;
            if ($product->offer == 'يوجد عرض') {
                $offerValue = $request->input('offer_value', 0);
                if ($request->input('offer_type') === 'قيمة') {
                    $finalPrice -= $offerValue;
                } elseif ($request->input('offer_type') === 'نسبة %') {
                    $finalPrice -= ($product->price * ($offerValue / 100));
                }
            }
            $product->final_price = max(0, $finalPrice);
    
            $product->save();
    
            return response()->json([
                'success' => true,
                'message' => 'Product updated successfully.',
                'product' => $product
            ], 200);
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Product not found or does not belong to your store.'
            ], 404);
        } catch (Exception $e) {
            Log::error($e);
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $store = auth('store')->user();

        try {
            $product = Product::where('id', $id)->where('store_id', $store->id)->firstOrFail();
            $imagePath = $product->photo;
            $product->delete();
            $this->deleteImage($imagePath);

            return response()->json([
                'success' => true,
                'message' => 'Product deleted successfully'
            ], 200);
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Product not found or does not belong to your store.'
            ], 404);
        } 
    }
}
