<?php

namespace App\Http\Controllers\demo;

use App\Http\Controllers\Controller;
use App\Models\Store;
use Illuminate\Http\Request;
use App\Models\ProductStore;
use  App\Traits\UploadImageTrait;

class DemoStoreController extends Controller
{
    public function getStores(){
        $stores=Store::all(['name', 'photo']);
        return view('demo.stores',compact('stores'));
    }

    public function searchStore(Request $request) {
        $query = $request->input('name');
        
        if ($query) {
            $stores = Store::where('name', 'LIKE', "%{$query}%")->get(['name', 'photo']);
        } else {
            $stores = Store::all(['name', 'photo']);
        }
    
        return view('demo.stores', compact('stores'));
    }
}
