<?php

namespace App\Http\Controllers\demo;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use  App\Models\Store;
use  App\Models\ProductStore;
use  App\Models\Product;
use  App\Models\ProductDepartment;


class DemoHomeController extends Controller
{
    public function index(){
        $stores=Store::all();
        $productstores=ProductStore::all();
        $ProductDepartments=ProductDepartment::all();
        $products=Product::whereIn('product_department_id',$ProductDepartments->pluck('id'))->get();

        return view('demo.home',compact('stores','productstores','ProductDepartments','products'));
    }
}
