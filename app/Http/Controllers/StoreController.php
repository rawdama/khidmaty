<?php

namespace App\Http\Controllers;

use App\Models\Store;
use Illuminate\Http\Request;
use App\Models\ProductStore;
use  App\Traits\UploadImageTrait;
use Illuminate\Validation\Rule;


class StoreController extends Controller
{
    use UploadImageTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        $stores=Store::all();
        $productStores=ProductStore::all();
        return view('pages.stores.index',compact('stores','productStores'));
        
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
            'name' => 'required|string',
            'countryCode' => 'required|string',
            'phone' => 'required|string',
            'email' => 'required|string|email|unique:clients,email',
            'password' => 'required|string|min:6', 
            'address' => 'required|string',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'product_store_id' => 'required|integer',
            'Commercial_register' => 'required|file|mimes:pdf,jpg,jpeg,png|max:2048',
            'offer' => 'nullable|string',
        ]);

        $store = new Store();

        $store->name = $request->input('name');
        $store->countryCode = $request->input('countryCode');
        $store->phone = $request->input('phone');
        $store->email = $request->input('email');
        $store->password = bcrypt($request->input('password')); 
        $store->address = $request->input('address');
        $store->product_store_id = $request->input('product_store_id');
        $store->offer = 'Not activated';

        if ($request->hasFile('photo')) {
            $photoPath = $this->upload($request, 'stores');
            $store->photo = $photoPath;
        }

        if ($request->hasFile('Commercial_register')) {
            $registerPath = $this->uploadFile($request, 'commercial_registers', 'Commercial_register');
            $store->Commercial_register = $registerPath;
        }

        $store->save();
        return redirect()->route('stores.index')->with('success', 'Slider created successfully.');
    }
   
    public function updateOffer(Request $request, $id)
    {
        $request->validate([
            'offer' => 'required|string',
        ]);
    
        $store = Store::findOrFail($id);
        $store->offer = $request->offer;
        $store->save();
    

        $products = Product::where('store_id', $store->id)->get();
        foreach ($products as $product) {
            if ($store->offer === 'Activated') {

                if ($product->offer === 'يوجد عرض') {
                    
                    $finalPrice = $product->price; 
                    if ($product->offer_type === 'قيمة') {
                        $finalPrice -= $product->offer_value; 
                    } elseif ($product->offer_type === 'نسبة %') {
                        $finalPrice -= ($product->price * ($product->offer_value / 100));
                    }
                    $product->final_price = max(0, $finalPrice);
                }
            } else {
                $product->offer = 'لا يوجد عرض';
                $product->offer_type = null;
                $product->offer_value = null;
                $product->final_price = $product->price; 
            }
            $product->save();
        }
    
        return response()->json(['success' => 'Offer status updated successfully.']);
    }
    /**
     * Display the specified resource.
     */
    public function show(Store $store)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Store $store)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $store = Store::findOrFail($id);

        $request->validate([
            'name' => 'required|string',
            'countryCode' => 'required|string',
            'phone' => 'required|string',
            'email' => [
                'required',
                'string',
                'email',
                Rule::unique('stores')->ignore($id),
            ],
            'address' => 'required|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', 
            'product_store_id' => 'required|integer',
            'Commercial_register' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
        ]);
    
        $store->name = $request->input('name');
        $store->countryCode = $request->input('countryCode');
        $store->phone = $request->input('phone');
        $store->email = $request->input('email');
        $store->address = $request->input('address');
        $store->product_store_id = $request->input('product_store_id');
    

        if ($request->hasFile('photo')) {
            $this->deleteImage($store->photo); 
            $filename = 'stores';
            $store->photo = $this->upload($request, $filename);
        }

        if ($request->hasFile('Commercial_register')) {
            $this->deleteFile($store->Commercial_register); 
            $filePath = 'commercial_registers';
            $store->Commercial_register = $this->upload($request, $filePath);
        }
    
        // Save updated data
        $store->save();
    
        return redirect()->route('stores.index')->with('success', 'Store updated successfully.');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Store $store)
    {
        try {
            $imagePath = $store->photo;
            $filePath=$store->Commercial_register;
            $store->delete();
            $this->deleteImage($imagePath);
            $this->deleteFile($filePath);
    
            return \Jeybin\Toastr\Toastr::success('store is deleted successfully')->redirect('stores.index');
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
