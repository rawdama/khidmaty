<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth; 

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;



class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $admins=Admin::all();
        return view('pages.admin.index',compact('admins'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $validatedData = $request->validate([
            'name' => 'required|string',
            'phone' => 'required|string',
            'email' => 'required|string|email|unique:admins,email', 
            'password' => 'required|string|min:6', 
            'permissions' => 'required|array',
        ]);
    
        try{
            $admin = new Admin();
            $admin->name = $validatedData['name'];
            $admin->phone = $validatedData['phone'];
            $admin->email = $validatedData['email'];
            $admin->password = bcrypt($validatedData['password']); 
            $permissions = $request->input('permissions', []);
            $admin->permissions = json_encode($permissions);
            $admin->save(); 
            return \Jeybin\Toastr\Toastr::success('Admin is added successfully ')->redirect('admins.index' );

        }
        catch(Exception $e){
            return redirect()->back()->withErrors(['error'=>$e->getMessage()]);

        }
        
       
    }

    /**
     * Display the specified resource.
     */
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Admin $admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function showProfile(){

    $admin = Auth::guard('admin')->user();
    return view('pages.admin.profile', compact('admin'));
    }
    public function updateAdminProfile(Request $request, Admin $admin){
        $admin = Auth::guard('admin')->user();
        $validatedData = $request->validate([
            'name' => 'required|string',
            'phone' => 'required|string',
            'email' => [
            'required',
            'string',
            'email',
            Rule::unique('admins')->ignore($admin->id),
        ],
        
            
        ]);
        try{
            $admin->name=$validatedData['name'];
            $admin->phone=$validatedData['phone'];
            $admin->email=$validatedData['email'];
            $admin->save();
    
            return \Jeybin\Toastr\Toastr::success('Admin is updated successfully')->redirect('admins.profiole');

        }
        catch(Exception $e){
            return redirect()->back()->withErrors(['error'=>$e->getMessage()]);

        }
    }
    public function updatePassword(Request $request)
    {
       
        $validatedData = $request->validate([
            'current_password' => 'required|string',
            'new_password' => 'required|string|min:8|confirmed', 
        ]);

        $admin = auth('admin')->user();
    

        if (!Hash::check($validatedData['current_password'], $admin->password)) {
            return redirect()->back()->withErrors(['current_password' => 'Current password is incorrect.']);
        }

        $admin->password = Hash::make($validatedData['new_password']);
        $admin->save();
    
        return redirect()->back()->with('success', 'Password updated successfully!');
    }
   
    public function update(Request $request, Admin $admin)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'phone' => 'required|string',
            'email' => [
            'required',
            'string',
            'email',
            Rule::unique('admins')->ignore($admin->id),
        ],
            
            'permissions' => 'required|array',
        ]);
        try{
            $admin->name=$validatedData['name'];
            $admin->phone=$validatedData['phone'];
            $admin->email=$validatedData['email'];
            
            $admin->permissions = json_encode($validatedData['permissions']);
            
            $admin->save();
    
            return \Jeybin\Toastr\Toastr::success('Admin is updated successfully')->redirect('admins.index');

        }
        catch(Exception $e){
            return redirect()->back()->withErrors(['error'=>$e->getMessage()]);

        }

        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Admin $admin)
    {
        try{
            $admin->delete();
            return \Jeybin\Toastr\Toastr::error('admin is added successfully ')->redirect('admins.index' );
        }
        catch(Exception $e){
            return redirect()->back()->withErrors(['error'=>$e->getMessage()]);

        }
    }
}
