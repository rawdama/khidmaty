<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ProductStore;

class ProductStoreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $productStores = [
            [
                'name_ar' => 'الهيكل الخارجى',
                'name_en' => 'The Exterior Structure',
                'desc_ar' => 'تتالأبواب، الرفرف والكبوت',
                'desc_en' => 'The Doors, Fenders, and Hood',
                'photo' => 'C:\Users\ascom\Desktop\toyta.png'
            ],
            [
                'name_ar' => 'المحرك ونظام الدفع',
                'name_en' => 'The Engine and Drive System',
                'desc_ar' => 'زيوت المحرك',
                'desc_en' => 'Engine Oils',
                'photo' => 'C:\Users\ascom\Desktop\toyta.png'
            ],
        ];

        foreach ($productStores as $productStoresData) {
            $productstore = new ProductStore();

            // Assign the photo outside the language loop
            $productstore->photo = $productStoresData['photo'];

            foreach (config('app.languages') as $locale => $language) {
                $productstore->translateOrNew($locale)->name = $productStoresData["name_$locale"];
                $productstore->translateOrNew($locale)->desc = $productStoresData["desc_$locale"];
            }

            $productstore->admin_id = 5; 
            $productstore->save();
        }
    }
}