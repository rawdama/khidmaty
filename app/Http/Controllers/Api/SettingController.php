<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;

class SettingController extends Controller
{
    public function termsPolicies(){
        
        $settings=Setting::all();
        $response = $settings->map(function ($setting) {
            return [
                
                    'الشروط و الاحكام'=>$setting->terms_policies
            ];
        }
    );
     
        return response()->json($response);
    
    }
    public function privacyPolicy(){
        
        $settings=Setting::all();
        $response = $settings->map(function ($setting) {
            return [
                
                    ' سياسة الخصوصية '=>$setting->privacy_policy
            ];
        }
    );
     
        return response()->json($response);
    
    }
}
