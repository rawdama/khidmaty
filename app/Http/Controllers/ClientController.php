<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use  App\Traits\UploadImageTrait;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;

class ClientController extends Controller
{
    use UploadImageTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $admin = auth()->guard('admin')->user();
        $permissions = $admin->permissions; 
        if (isset($permissions['clients']['read']) && (int)$permissions['clients']['read'] === 1) {
            $clients = Client::all();
            return view('pages.clients.index', compact('clients'));
        } else {
            return redirect()->back()->withErrors(['error' => 'You do not have permission to view clients.']);
        }
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
  
        $admin = auth()->guard('admin')->user();
        $permissions = $admin->permissions; 
        if (isset($permissions['clients']['create']) && (int)$permissions['clients']['create'] === 1) {
            $validatedData = $request->validate([
                'name' => 'required|string',
                'countryCode' => 'required',
                'phone' => 'required|string',
                'email' => 'required|string|email|unique:clients,email',
                'address' => 'required|string',
                'password' => 'required|string|min:6',
                'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);
    
            $client = new Client();
            $client->name = $validatedData['name'];
            $client->countryCode = $validatedData['countryCode'];
            $client->phone = $validatedData['phone'];
            $client->email = $validatedData['email'];
            $client->password = bcrypt($validatedData['password']);
            $client->address = $validatedData['address'];
    
            if ($request->hasFile('photo')) {
                $filename = 'clients';
                $client->photo = $this->upload($request, $filename);
            }
            $client->save();
    
            return redirect()->route('clients.index')->with('success', 'Client created successfully.');
        } else {
            return redirect()->back()->withErrors(['error' => 'You do not have permission to create clients.']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Client $client)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Client $client)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    
    public function update(Request $request, $id)
    {
        $client = Client::findOrFail($id);
    
        $admin = auth()->guard('admin')->user();
        $permissions = $admin->permissions; 

        if (isset($permissions['clients']['update']) && (int)$permissions['clients']['update'] === 1) {
            $request->validate([
                'name' => 'required|string',
                'countryCode' => 'required',
                'phone' => 'required|string',
                'email' => [
                    'required',
                    'string',
                    'email',
                Rule::unique('clients')->ignore($client->id),
                ],
                'address' => 'required|string',
                'photo' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
                'offer' => 'nullable|string',
            ]);

            $client->name = $request->input('name');
            $client->countryCode = $request->input('countryCode');
            $client->phone = $request->input('phone');
            $client->email = $request->input('email');
            $client->address = $request->input('address');
            $client->offer = 'Not activated';
            
            if ($request->hasFile('photo')) {
                $this->deleteImage($client->photo);
                $filename = 'clients';
                $client->photo = $this->upload($request, $filename);
            }
            $client->save();
            return \Jeybin\Toastr\Toastr::success('Client updated successfully')->redirect('clients.index');
        } else {
            return redirect()->back()->withErrors(['error' => 'You do not have permission to update clients.']);
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Client $client)
    {
        $admin = auth()->guard('admin')->user();
        $permissions = $admin->permissions;
        if (isset($permissions['clients']['delete']) && (int)$permissions['clients']['delete'] === 1) {
            try {
                $imagePath = $client->photo;
    
                $client->delete();
    
                $this->deleteImage($imagePath);
        
                return \Jeybin\Toastr\Toastr::success('Client deleted successfully')->redirect('clients.index');
            } catch (Exception $e) {
                return redirect()->back()->withErrors(['error' => $e->getMessage()]);
            }
        } else {
            return redirect()->back()->withErrors(['error' => 'You do not have permission to delete clients.']);
        }
    }
    public function updateOffer(Request $request, Client $client)
{
    $request->validate([
        'offer' => 'required|string|in:Activated,Not activated',
    ]);
    $client->offer = $request->offer;
    $client->save();

    return response()->json(['success' => 'Client offer status updated successfully.']);
}
}
