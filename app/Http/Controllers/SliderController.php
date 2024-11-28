<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;
use  App\Traits\UploadImageTrait;

class SliderController extends Controller
{
    use UploadImageTrait;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $adminId=auth()->guard('admin')->id();
        $sliders=Slider::where('admin_id',$adminId)->get();
        return view('pages.sliders.index',compact('sliders'));
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
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,jfifs|max:2048',
            'link' => 'required|url',  
            'type' => 'required|in:الكل,الويب,التطبيق',
            'location' => 'required|in:اعلي اليمين,اسفل اليمين,اليسار,رئيسي',
        ]);
        $slider=new Slider();
        foreach(config('app.languages')as $locale=>$language){
            $slider->translateOrNew($locale)->name=$request->input("name_$locale");
            $slider->translateOrNew($locale)->desc=$request->input("desc_$locale");
        }
        if($request->hasFile('photo')){
            $filename='sliders';
            $slider->photo=$this->upload($request,$filename);
        }
        $slider->link = $request->input('link');
        $slider->type = $request->input('type');
        $slider->location = $request->input('location');
        $slider->admin_id=auth()->guard('admin')->id();
        $slider->save();
        return redirect()->route('sliders.index')->with('success', 'Slider created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Slider $slider)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Slider $slider)
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
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,jfif|max:2048',
            'link' => 'required|url',  
            'type' => 'required|in:الكل,الويب,التطبيق',
            'location' => 'required|in:اعلي اليمين,اسفل اليمين,اليسار,رئيسي',
        ]);

        $slider = Slider::findOrFail($id);

        foreach (config('app.languages') as $locale => $language) {
            $translation = $slider->translateOrNew($locale);
            $translation->name = $request->input("name_$locale");
            $translation->desc = $request->input("desc_$locale");
            $translation->save();
        }

        if ($request->hasFile('photo')) {
            $this->deleteImage($slider->photo);
            $filename = 'sliders'; 
            $slider->photo = $this->upload($request, $filename);
        }

        $slider->link = $request->input('link');
        $slider->type = $request->input('type');
        $slider->location = $request->input('location');
        $slider->admin_id=auth()->guard('admin')->id();

        $slider->save();

        return redirect()->route('sliders.index')->with('success', 'Slider updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Slider $slider)
    {
        try {
            if($slider->admin_id!== auth()->guard('admin')->id()){
                return redirect()->back()->withErrors(['error' => 'Unauthorized action.']);
            }
            $imagePath = $slider->photo;
            $slider->delete();
            $this->deleteImage($imagePath);
    
            return \Jeybin\Toastr\Toastr::success('slider is deleted successfully')->redirect('sliders.index');
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
