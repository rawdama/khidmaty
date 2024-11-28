<?php

namespace Database\Seeders;
use App\Models\Car;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Sample car data with translations
        $cars = [
            [
                'carType_ar' => 'سيدان', 
                'carType_en' => 'Sedan',  
            ],
            [
                'carType_ar' => 'سيارة رياضية', 
                'carType_en' => 'Sports Car',    
            ],
            [
                'carType_ar' => 'هاتشباك', 
                'carType_en' => 'Hatchback', 
            ],
        ];

        foreach ($cars as $carData) {
            $car = new Car();

            
            foreach (config('app.languages') as $locale => $language) {
                $car->translateOrNew($locale)->carType = $carData["carType_$locale"];
            }
            $car->admin_id = 5; 
            $car->save();
        }}
    
}
