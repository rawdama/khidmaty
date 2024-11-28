<?php

namespace Database\Seeders;

use App\Models\ProductType;
use Illuminate\Database\Seeder;

class ProductTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $productTypes = [
            [
                'name_ar' => 'مرسيدس',
                'name_en' => 'Mercedes',
                'photo' => 'C:\Users\ascom\Desktop\toyta.png',
               
            ]
        ];

        foreach ($productTypes as $productTypeData) {
            $productType = new ProductType();
            foreach (config('app.languages') as $locale => $language) {
                $productType->translateOrNew($locale)->name = $productTypeData["name_$locale"];
            }
            if (isset($productTypeData['photo'])) {
                $productType->photo = $productTypeData['photo']; 
            }
            $productType->admin_id=5;
            $productType->save();
        }
    }
}