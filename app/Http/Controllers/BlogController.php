<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use  App\Traits\UploadImageTrait;
class BlogController extends Controller
{
    use UploadImageTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $adminId = auth()->guard('admin')->id();
        $blogs = Blog::where('admin_id', $adminId)->get();
        return view('pages.blogs.index',compact('blogs'));
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
            'desc_ar' => 'required|string',
            'desc_en' => 'required|string',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        $blog=new Blog();
        foreach(config('app.languages')as $locale=>$language){
            $blog->translateOrNew($locale)->name=$request->input("name_$locale");
            $blog->translateOrNew($locale)->desc=$request->input("desc_$locale");
        }
        if ($request->hasFile('photo')) {
            $filename = 'blogs'; 
            $blog->photo = $this->upload($request, $filename); 
        }
        $blog->admin_id = auth()->guard('admin')->id(); 
        $blog->save();
        return \Jeybin\Toastr\Toastr::success('opnion is added successfully ')->redirect('blogs.index' );
    }

    /**
     * Display the specified resource.
     */
    public function show(Blog $blog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog)
    {
       
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
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        $blog= Blog::findOrFail($id);
       
        foreach (config('app.languages') as $locale => $language) {
            $translation = $blog->translateOrNew($locale);
            $translation->name = $request->input("name_$locale");
            $translation->desc= $request->input("desc_$locale");
            $translation->save();
        }
        if ($request->hasFile('photo')) {
            $this->deleteImage($blog->photo);
            $filename = 'blogs'; 
            $blog->photo = $this->upload($request, $filename);
        }
        $blog->admin_id = auth()->guard('admin')->id(); 
        $blog->save();
        return redirect()->route('blogs.index')->with('success', 'blog created successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {

        try {
            if ($blog->admin_id !== auth()->guard('admin')->id()) {
                return redirect()->back()->withErrors(['error' => 'Unauthorized action.']);
            }
            $imagePath = $blog->photo;
            $blog->delete();
            $this->deleteImage($imagePath);
    
            return \Jeybin\Toastr\Toastr::success('blog is deleted successfully')->redirect('blogs.index');
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
