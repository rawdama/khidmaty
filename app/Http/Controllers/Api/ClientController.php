<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Client;
use  App\Traits\UploadImageTrait;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class ClientController extends Controller
{
    use UploadImageTrait;
    public function register(Request $request)
    {
        // Validate the incoming request data
        $fields = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:clients,email',
            'password' => 'required|min:8',
            'countryCode' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
        $fields['password'] = Hash::make($fields['password']);
        if ($request->hasFile('photo')) {
            $filename = 'clients'; 
            $fields['photo'] = $this->upload($request, $filename);
        }
        $client = Client::create($fields);
        $token = $client->createToken($request->name);

        
        return response()->json([
            'client' => $client,
            'token' => $token->plainTextToken
        ], 201); 
    }

    public function login(Request $request){
        $request->validate([
            'email' => 'required|email|exists:clients,email',
            'password' => 'required',
        ]);
        
        $client =Client::where('email', $request->email)->first();
        if (!$client || !Hash::check($request->password, $client->password)) {
            return [
                'errors' => [
                    'email' => ['The provided credentials are incorrect.']
                ]
            ];
        }
        $token = $client->createToken($client->name);
        return response()->json([
            'client' => $client,
            'token' => $token->plainTextToken
        ], 201); 
    }

    public function logout(Request $request)
    {
        $client = auth('client')->user();
        $client->tokens()->delete();
        return response()->json(['message' => 'You are logged out.']);
    }
    public function updateClient(Request $request)
{
    $client = auth('client')->user();
    $request->validate([
        'name' => 'required|string',
        'phone' => 'required|string',
    ]);
    $client->name = $request->input('name');
    $client->phone = $request->input('phone');
    $client->save();

    return response()->json([
        'message' => 'Client updated successfully.',
       
    ], 200);
}

    
}
