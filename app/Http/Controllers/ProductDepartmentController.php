<?php

namespace App\Http\Controllers;

use App\Models\ProductDepartment;
use App\Models\ProductStore;
use Illuminate\Http\Request;
use  App\Traits\UploadImageTrait;
class ProductDepartmentController extends Controller
{
    
    use UploadImageTrait;
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $adminId = auth()->guard('admin')->id();
        $productDepartments=ProductDepartment::where('admin_id',$adminId)->get();
        $productStores=ProductStore::all();
        return view('pages.productdepartments.index',compact('productDepartments','productStores'));
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
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'product_store_id'=>'required',
        ]);
        $productDepartment=new ProductDepartment();
        foreach(config('app.languages')as $locale=>$language){
            $productDepartment->translateOrNew($locale)->name=$request->input("name_$locale");
        }
        if($request->hasFile('photo')){
            $filename='productDepartments';
            $productDepartment->photo=$this->upload($request,$filename);
        }
        $productDepartment->product_store_id= $request->input('product_store_id');
        $productDepartment->admin_id= auth()->guard('admin')->id();
        $productDepartment->save();
        return redirect()->route('product-departments.index')->with('success', 'product departments created successfully.');


    }

    /**
     * Display the specified resource.
     */
    public function show(ProductDepartment $productDepartment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProductDepartment $productDepartment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $request->validate([
            'name_ar' => 'required|string',
            'name_en' => 'required|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'product_store_id'=>'required',
        ]);
        $productDepartment= ProductDepartment::findOrFail($id);
       
        foreach (config('app.languages') as $locale => $language) {
            $translation = $productDepartment->translateOrNew($locale);
            $translation->name = $request->input("name_$locale");
            $translation->save();
        }
        $productDepartment->product_store_id = $request->input('product_store_id');

        if ($request->hasFile('photo')) {
            $this->deleteImage($productDepartment->photo);
            $filename = 'productDepartments'; 
            $productDepartment->photo = $this->upload($request, $filename);
        }
        $productDepartment->admin_id= auth()->guard('admin')->id();
        $productDepartment->save();
        return redirect()->route('product-departments.index')->with('success', 'product departments created successfully.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProductDepartment $productDepartment)
    {
        try {
            if ($productDepartment->admin_id !== auth()->guard('admin')->id()) {
                return redirect()->back()->withErrors(['error' => 'Unauthorized action.']);
            }
            $imagePath = $productDepartment->photo;
            $productDepartment->delete();
            $this->deleteImage($imagePath);
    
            return \Jeybin\Toastr\Toastr::success('opnion is deleted successfully')->redirect('product-departments.index');
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
