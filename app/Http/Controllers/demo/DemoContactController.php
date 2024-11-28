<?php

namespace App\Http\Controllers\demo;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Setting;
use Illuminate\Support\Facades\Validator;

class DemoContactController extends Controller
{
    public function index(){
        $setting=Setting::first();
        return view('demo.contact',compact('setting'));
    }
    public function store(Request $request)
    {
        
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'phone' => 'required',
            'subject' => 'required|string|max:255',
            'email' => 'required|email|unique:contacts,email',
            'message' => 'required|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

       
        Contact::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'subject' => $request->subject,
            'email' => $request->email,
            'message' => $request->message,
        ]);


        return redirect()->back()->with('success', 'Your message has been sent successfully!');
    }
}
