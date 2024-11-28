<?php

namespace App\Http\Controllers\demo;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;

class DemoBlogController extends Controller
{
    public function index(){
        $blogs=Blog::all();
        return view('demo.allBlogs',compact('blogs'));
    }
    public function show($id)
    {
        $blog= Blog::findOrFail($id); // Fetch the blog by ID or fail
        return view('demo.showBlog', compact('blog')); // Pass the blog to the view
    }
}
