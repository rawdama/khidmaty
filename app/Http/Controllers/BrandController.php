<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;
use App\Traits\UploadImageTrait;

class BrandController extends Controller
{
    use UploadImageTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $adminId = auth()->guard('admin')->id();
        $brands=Brand::where('admin_id',$adminId)->get();
        return view('pages.brands.index',compact('brands'));
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
            'brandName_ar'=>'required|string',
            'brandName_en'=>'required|string',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,jfif|max:2048'
        ]);
        $brand=new Brand();
        foreach(config('app.languages')as $locale=>$language){
            $brand->translateOrNew($locale)->brandName=$request->input("brandName_ar");
        }
        if ($request->hasFile('photo')) {
            $filename = 'brands'; 
            $Path = $this->upload($request, $filename);
            $brand->image = $Path;
        }
        $brand->admin_id = auth()->guard('admin')->id(); 
        $brand->save();
        return \Jeybin\Toastr\Toastr::success('car is added successfully ')->redirect('brands.index' );
    }

    /**
     * Display the specified resource.
     */
    public function show(Brand $brand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Brand $brand)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
{
    
    $brand = Brand::findOrFail($id);

    // Validate incoming request
    $request->validate([
        'brandName_ar' => 'required|string',
        'brandName_en' => 'required|string',
        'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,jfif|max:2048'
    ]);

    
    foreach (config('app.languages') as $locale => $language) {
        $translation = $brand->translateOrNew($locale);
        $translation->brandName= $request->input("brandName_$locale");
    }
    
   
    
    if ($request->hasFile('photo')) {
        $this->deleteImage($brand->image);
        $filename = 'brands'; 
        $brand->image = $this->upload($request, $filename);
    }
    $brand->admin_id = auth()->guard('admin')->id(); 
    $brand->save();
    return \Jeybin\Toastr\Toastr::success('Brand updated successfully')->redirect('brands.index');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Brand $brand)
{
    try {

        if ($brand->admin_id !== auth()->guard('admin')->id()) {
            return redirect()->back()->withErrors(['error' => 'Unauthorized action.']);
        }
        $imagePath = $brand->image;
        $brand->delete();
        $this->deleteImage($imagePath);
        return \Jeybin\Toastr\Toastr::success('Car is deleted successfully')->redirect('brands.index');
    } catch (Exception $e) {
        return redirect()->back()->withErrors(['error' => $e->getMessage()]);
    }
}
}
