<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use  App\Traits\UploadImageTrait;
use Illuminate\Validation\Rule;
class StoreVendorController extends Controller
{
    use UploadImageTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
   
    $validator = Validator::make($request->all(), [
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

    
    if ($validator->fails()) {
        return response()->json(['errors' => $validator->errors()], 422);
    }

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

   
    return response()->json([
        'message' => 'Store created successfully.',
        'store' => $store
    ], 201);
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
    public function update(Request $request, $id)
    {
        
        $authStore = auth('store')->user();
        $store = Store::findOrFail($id);
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'countryCode' => 'required|string',
            'phone' => 'required|string',
            'email' => [
                'required',
                'string',
                'email',
                Rule::unique('clients')->ignore($store->id), 
            ],
            'password' => 'nullable|string|min:6', 
            'address' => 'required|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'product_store_id' => 'required|integer',
            'Commercial_register' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048', 
            'offer' => 'nullable|string',
        ]);
    
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
    
        
        $store->name = $request->input('name');
        $store->countryCode = $request->input('countryCode');
        $store->phone = $request->input('phone');
        $store->email = $request->input('email');

        if ($request->filled('password')) {
            $store->password = bcrypt($request->input('password'));
        }
    
        $store->address = $request->input('address');
        $store->product_store_id = $request->input('product_store_id');
        $store->offer = $request->input('offer', 'Not activated');
    
        if ($request->hasFile('photo')) {
            $photoPath = $this->upload($request, 'stores');
            $store->photo = $photoPath;
        }
    
        if ($request->hasFile('Commercial_register')) {
            $registerPath = $this->uploadFile($request, 'commercial_registers', 'Commercial_register');
            $store->Commercial_register = $registerPath;
        }

        $store->save();
    
        return response()->json([
            'message' => 'Store updated successfully.',
            'store' => $store
        ], 200);
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
