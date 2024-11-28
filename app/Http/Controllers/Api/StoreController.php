<?php

namespace App\Http\Controllers\Api;
use App\Models\Store;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use  App\Traits\UploadImageTrait;
use Illuminate\Support\Facades\Validator;
class StoreController extends Controller
{
    use UploadImageTrait;
    public function register(Request $request)
    {
        
        $fields = $request->validate([
            'name' => 'required|string',
            'countryCode' => 'required|string',
            'phone' => 'required|string',
            'email' => 'required|string|email|unique:stores,email',
            'password' => 'required|string|min:6',
            'address' => 'required|string',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'product_store_id' => 'required|integer',
            'Commercial_register' => 'required|file|mimes:pdf,jpg,jpeg,png|max:2048',
            'offer' => 'nullable|string',
        ]);
        $fields['password'] = Hash::make($fields['password']);
        if ($request->hasFile('photo')) {
            $filename = 'stores'; 
            $fields['photo'] = $this->upload($request, $filename);
        }
        if ($request->hasFile('Commercial_register')) {
            $registerPath = $this->uploadFile($request, 'commercial_registers', 'Commercial_register');
            $fields['Commercial_register'] = $registerPath; 
        }
        $store = Store::create($fields);
        $token = $store->createToken($request->name);

        return response()->json([
            'store' => $store,
            'token' => $token->plainTextToken
        ], 201); 
    }

    
    public function login(Request $request){
        $request->validate([
           'email' => 'required|email|exists:stores,email',
           'password' => 'required',
       ]);
       
       $store =Store::where('email', $request->email)->first();
       if (!$store || !Hash::check($request->password, $store->password)) {
           return [
               'errors' => [
                   'email' => ['The provided credentials are incorrect.']
               ]
           ];
       }
       $token = $store->createToken($store->name);
       return response()->json([
           'store' => $store,
           'token' => $token->plainTextToken
       ], 201); 
   }
   public function logout(Request $request)
   {
      
       $store = auth('store')->user();
   
       $store->tokens()->delete();
   
       return response()->json(['message' => 'You are logged out.']);
   }
}
