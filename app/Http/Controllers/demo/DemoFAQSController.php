<?php

namespace App\Http\Controllers\demo;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Question;

class DemoFAQSController extends Controller
{
    public function index(){
        $questions=Question::all();
        return view('demo.FAQS',compact('questions'));
    }
}
