<?php

namespace App\Http\Controllers\demo;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;


class DemoSettingController extends Controller
{
    public function PrivacyPolicy(){
        $setting=Setting::first();
        return view('demo.privacyPolicy',compact('setting'));
    }
    public function TermsCondition(){
        $setting=Setting::first();;
        return view('demo.TermsCondition',compact('setting'));
    }

}
