<?php

namespace App\Http\Controllers\demo;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;
use App\Models\Opnion;
use App\Models\OpnionTranslation;

class DemoAboutusController extends Controller
{
    public function index(){
        $opnions=Opnion::all();
        return view('demo.aboutuse',compact('opnions'));
    }
    
}
