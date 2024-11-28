<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductType;
use App\Models\Store;
use App\Models\ProductDepartment;
use App\Models\Brand;
use App\Models\Car;
use App\Models\Rating;
use Illuminate\Http\Request;
use  App\Traits\UploadImageTrait;

class ProductController extends Controller
{
    use UploadImageTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rating=Rating::all();
        $products=Product::all();
        $productTypes=ProductType::all();
        $stores=Store::all();
        $productDepartments=ProductDepartment::all();
        $brands=Brand::all();
        $cars=Car::all();
        return view('pages.products.index',compact('products','productTypes',
        'stores','productDepartments','brands','cars','rating'));
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
            'store_id' => 'required|exists:stores,id',
            'brand_id' => 'required|exists:brands,id', 
            'car_id' => 'required|exists:cars,id', 
            'price' => 'required|numeric', 
            'code' => 'required|string|unique:products,code',
        ]);
    
        $product = new Product();
    
        foreach (config('app.languages') as $locale => $language) {
            $product->translateOrNew($locale)->name = $request->input("name_$locale");
            $product->translateOrNew($locale)->desc = $request->input("desc_$locale");
        }
    
        if ($request->hasFile('photo')) {
            $filename = 'products';
            $product->photo = $this->upload($request, $filename); 
        }
    
        $product->type = $request->input('type');
        $product->model = $request->input('model');
    
        $store = Store::findOrFail($request->input('store_id'));
        $isOfferActivated = $store->offer === 'Activated';
    
        if ($request->has('offerCheckbox')) {
            $product->offer = 'يوجد عرض';
            $product->offer_type = trim($request->input('offer_type'));
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
        $product->store_id = $request->input('store_id');
        $product->brand_id = $request->input('brand_id'); 
        $product->car_id = $request->input('car_id');
        $product->price = $request->input('price'); 
    
        
        $finalPrice = $product->price;
    
        if ($isOfferActivated && $product->offer == 'يوجد عرض') {
            $offerValue = $request->input('offer_value', 0);
            if ($product->offer_type === 'قيمة') {
                $finalPrice -= $offerValue; 
            } elseif ($product->offer_type === 'نسبة %') {
                $finalPrice -= ($product->price * ($offerValue / 100)); 
            }
        }
    
        
        $product->final_price = max(0, $finalPrice);
    
       
        if ($product->offer == 'يوجد عرض' && $product->to_date && strtotime($product->to_date) < time()) {
            $product->offer = 'لا يوجد عرض';
            $product->final_price = $product->price; 
        }
    
        $product->code = $request->input('code'); 
        $product->save();
    
        return redirect()->route('products.index')->with('success', 'Product created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
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
            'store_id' => 'required|exists:stores,id',
            'brand_id' => 'required|exists:brands,id',
            'car_id' => 'required|exists:cars,id',
            'price' => 'required|numeric',
            'code' => 'required|string|unique:products,code,' . $id . ',id',
        ]);
    
        $product = Product::findOrFail($id);
    
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
    
        // Check the store's offer status
        $store = Store::findOrFail($product->store_id);
        $isOfferActivated = $store->offer === 'Activated';
    
        // Set the product's offer based on the request
        if ($request->has('offerCheckbox')) {
            $product->offer = 'يوجد عرض';
            $product->offer_type = $request->input('offer_type');
            $product->offer_value = $request->input('offer_value');
            $product->from_date = $request->input('from_date');
            $product->to_date = $request->input('to_date');
    
            // Calculate final price if the store's offer is activated
            $finalPrice = $product->price; 
            $offerValue = $request->input('offer_value', 0);
    
            if ($isOfferActivated) {
                if ($product->offer_type === 'قيمة') {
                    $finalPrice -= $offerValue; 
                } elseif ($product->offer_type === 'نسبة %') {
                    $finalPrice -= ($product->price * ($offerValue / 100));
                }
            }
    
            $product->final_price = max(0, $finalPrice); 
        } else {
            $product->offer = 'لا يوجد عرض';
            $product->offer_type = null;
            $product->offer_value = null;
            $product->from_date = null;
            $product->to_date = null;
            $product->final_price = $product->price; 
        }
    
     
        $product->product_department_id = $request->input('product_department_id');
        $product->product_type_id = $request->input('product_type_id');
        $product->brand_id = $request->input('brand_id');
        $product->car_id = $request->input('car_id');
        $product->price = $request->input('price');
        $product->code = $request->input('code');
   
        if ($product->offer == 'يوجد عرض' && $product->to_date && strtotime($product->to_date) < time()) {
            $product->offer = 'لا يوجد عرض';
            $product->final_price = $product->price; 
        }
    
        $product->save();
    
        return redirect()->route('products.index')->with('success', 'Product updated successfully.');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        try {
            $imagePath = $product->photo;
            $product->delete();
            $this->deleteImage($imagePath);
    
            return \Jeybin\Toastr\Toastr::success('opnion is deleted successfully')->redirect('products.index');
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
