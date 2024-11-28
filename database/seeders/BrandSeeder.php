<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $brands = [
            [
                'brandName_ar' => 'تيوتا',
                'brandName_en' => 'toyota',
                'image' => 'C:\Users\ascom\Desktop\toyta.png'
            ],
            [
                'brandName_ar' => 'هوندا',
                'brandName_en' => 'honda',
                'image' => 'C:\Users\ascom\Desktop\Logo-Honda.png'
            ],
        ];

        foreach ($brands as $brandData) {
            $brand = new Brand();
            foreach (config('app.languages') as $locale => $language) {
                $brand->translateOrNew($locale)->brandName = $brandData["brandName_$locale"];
            }
            if (isset($brandData['image'])) {
                $brand->image = $brandData['image']; 
            }
            $brand->admin_id = 5; 
            $brand->save();
        }
    }
}