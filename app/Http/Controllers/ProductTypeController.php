<?php

namespace App\Http\Controllers;

use App\Models\ProductType;
use Illuminate\Http\Request;
use  App\Traits\UploadImageTrait;

class ProductTypeController extends Controller
{
    use UploadImageTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $adminId = auth()->guard('admin')->id();
        $productTypes=ProductType::where('admin_id',$adminId)->get();
        return view('pages.producttypes.index',compact('productTypes'));
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
        $request->validate([
            'name_ar' => 'required|string',
            'name_en' => 'required|string',
             'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
        $productType=new ProductType();
        foreach(config('app.languages')as $locale=>$language){
            $productType->translateOrNew($locale)->name=$request->input("name_$locale");
        }
        if($request->hasFile('photo')){
            $filename='productTypes';
            $productType->photo=$this->upload($request,$filename);
        }
        $productType->admin_id=auth()->guard('admin')->id();
        $productType->save();
        return \Jeybin\Toastr\Toastr::success('product type  is added successfully ')->redirect('product-type.index' );
    }

    /**
     * Display the specified resource.
     */
    public function show(ProductType $productType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProductType $productType)
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
             'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
        $productType=ProductType::findOrFail($id);
        foreach (config('app.languages') as $locale => $language) {
        $translation = $productType->translateOrNew($locale);
        $translation->name = $request->input("name_$locale");
        
        }
        if ($request->hasFile('photo')) {
            $this->deleteImage($productType->photo);
            $filename = 'productTypes'; 
            $productType->photo = $this->upload($request, $filename);
        }
        $productType->admin_id=auth()->guard('admin')->id();
        $productType->save();
        return \Jeybin\Toastr\Toastr::success('category updated successfully')->redirect('product-type.index');


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProductType $productType)
    {
        try {if ($productType->admin_id !== auth()->guard('admin')->id()) {
            return redirect()->back()->withErrors(['error' => 'Unauthorized action.']);
        }
            $imagePath = $productType->photo;
            $productType->delete();
            $this->deleteImage($imagePath);
    
            return \Jeybin\Toastr\Toastr::success('opnion is deleted successfully')->redirect('product-type.index');
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
