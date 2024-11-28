<?php

namespace App\Http\Controllers;

use App\Models\ProductStore;
use Illuminate\Http\Request;
use  App\Traits\UploadImageTrait;
class ProductStoreController extends Controller
{
    use UploadImageTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $adminId = auth()->guard('admin')->id();
        $ProductStores=ProductStore::where('admin_id',$adminId)->get();
        return view('pages.productstores.index',compact('ProductStores'));
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
             'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,jfif|max:2048'
        ]);
        $productStore=new ProductStore();
        foreach(config('app.languages')as $locale=>$language){
            $productStore->translateOrNew($locale)->name=$request->input("name_$locale");
            $productStore->translateOrNew($locale)->desc=$request->input("desc_$locale");
        }
        if($request->hasFile('photo')){
            $filename='productStores';
            $productStore->photo=$this->upload($request,$filename);
        }
        $productStore->admin_id=auth()->guard('admin')->id();
        $productStore->save();
        return \Jeybin\Toastr\Toastr::success('opnion is added successfully ')->redirect('product-store.index' );
        
    }

    /**
     * Display the specified resource.
     */
    public function show(ProductStore $productStore)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProductStore $productStore)
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
             'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,jfif|max:2048'
        ]);
        $productStore=ProductStore::findOrFail($id);
        foreach (config('app.languages') as $locale => $language) {
        $translation = $productStore->translateOrNew($locale);
        $translation->name = $request->input("name_$locale");
        $translation->desc = $request->input("desc_$locale");
        }
        if ($request->hasFile('photo')) {
            $this->deleteImage($productStore->photo);
            $filename = 'productStores'; 
            $productStore->photo = $this->upload($request, $filename);
        }
        $productStore->admin_id=auth()->guard('admin')->id();
        $productStore->save();
        return \Jeybin\Toastr\Toastr::success('category updated successfully')->redirect('product-store.index');


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProductStore $productStore)
    {
        try {
            if ($productStore->admin_id !== auth()->guard('admin')->id()) {
                return redirect()->back()->withErrors(['error' => 'Unauthorized action.']);
            }
            $imagePath = $productStore->photo;
            $productStore->delete();
            $this->deleteImage($imagePath);
    
            return \Jeybin\Toastr\Toastr::success('opnion is deleted successfully')->redirect('product-store.index');
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
