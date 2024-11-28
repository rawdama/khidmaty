<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;
use App\Models\CarTranslation ;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    
    $adminId = auth()->guard('admin')->id();
    $cars = Car::where('admin_id', $adminId)->get();
    return view('pages.cars.index', compact('cars'));
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
            'carType_ar'=>'required|string',
            'carType_en'=>'required|string',
        ]);
        $car=new Car();
        foreach(config('app.languages')as $locale=>$language){
            $car->translateOrNew($locale)->carType=$request->input("carType_$locale");
        }
        $car->admin_id = auth()->guard('admin')->id(); 
        $car->save();
        return \Jeybin\Toastr\Toastr::success('car is added successfully ')->redirect('cars.index' );

    }

    /**()
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'carType_ar'=>'required|string',
            'carType_en'=>'required|string',
        ]);
        $car =Car::findOrFail($id);
        foreach(config('app.languages')as $locale=>$language){
            $translation = $car->translateOrNew($locale);
            $translation->carType= $request->input("carType_$locale");
            $translation->save();
        }
    $car->admin_id = auth()->guard('admin')->id(); 
    $car->save();

        return \Jeybin\Toastr\Toastr::success('car updated successfully')->redirect('cars.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Car $car)
    {
        try {
           
            if ($car->admin_id !== auth()->guard('admin')->id()) {
                return redirect()->back()->withErrors(['error' => 'Unauthorized action.']);
            }
    
            $car->delete();
            return \Jeybin\Toastr\Toastr::error('Car deleted successfully')->redirect('cars.index');
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
