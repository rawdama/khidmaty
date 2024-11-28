<?php

namespace App\Http\Controllers;

use App\Models\Opnion;
use Illuminate\Http\Request;
use  App\Traits\UploadImageTrait;
class OpnionController extends Controller
{
    use UploadImageTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $adminId = auth()->guard('admin')->id();
        $opnions = Opnion::where('admin_id', $adminId)->get();
        return view('pages.opnions.index',compact('opnions'));
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
            'comment_ar' => 'required|string',
            'comment_en' => 'required|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
        $opnion=new Opnion();
         foreach(config('app.languages')as $locale=>$language){
            $opnion->translateOrNew($locale)->name=$request->input("name_$locale");
            $opnion->translateOrNew($locale)->comment=$request->input("comment_$locale");
        }
        if($request->hasFile('photo')){
            $filename='opnions';
            $opnion->photo=$this->upload($request,$filename);

        }
        $opnion->admin_id=auth()->guard('admin')->id();
        $opnion->save();
        return \Jeybin\Toastr\Toastr::success('opnion is added successfully ')->redirect('opnions.index' );
    }

    /**
     * Display the specified resource.
     */
    public function show(Opnion $opnion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Opnion $opnion)
    {
      
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $opnion=Opnion::findOrFail($id);
        $request->validate([
            'name_ar' => 'required|string',
            'name_en' => 'required|string',
            'comment_ar' => 'required|string',
            'comment_en' => 'required|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
        foreach (config('app.languages') as $locale => $language) {
            $translation = $opnion->translateOrNew($locale);
            $translation->name= $request->input("name_$locale");
            $translation->comment= $request->input("comment_$locale");
        }
        if ($request->hasFile('photo')) {
            $this->deleteImage($opnion->photo);
            $filename = 'opnions'; 
            $opnion->photo = $this->upload($request, $filename);
        }
        $opnion->admin_id=auth()->guard('admin')->id();
        $opnion->save();
        return \Jeybin\Toastr\Toastr::success('Brand updated successfully')->redirect('opnions.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Opnion $opnion)
    {
        try {
            if ($opnion->admin_id !== auth()->guard('admin')->id()) {
                return redirect()->back()->withErrors(['error' => 'Unauthorized action.']);
            }
            $imagePath = $opnion->photo;
            $opnion->delete();
            $this->deleteImage($imagePath);
    
            return \Jeybin\Toastr\Toastr::success('opnion is deleted successfully')->redirect('opnions.index');
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
