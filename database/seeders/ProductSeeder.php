<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            [
                'name_ar' => ' طلاء ملمع + شمع باللون الاسود (500 مل) من سوناكس',
                'name_en' => 'Black polish + wax (500 ml) from Sonax',
                'desc_ar' => 'ينعم الفجوات الدقيقة ويلمع وينعش ألوان الطلاء.  ',
                'desc_en' => 'Smoothes fine gaps, polishes and refreshes paint colours.',
                'photo' => 'sample/photo/path.jpg',
                'type' => 'اصلي',
                'model' => '2024',
                'offer' => 'يوجد عرض',
                'offer_type' => 'نسبة %',
                'offer_value' => 10,
                'from_date' => '2024-01-01',
                'to_date' => '2024-12-31',
                'product_type_id' => 4, 
                'product_department_id' => 10,
                'store_id' => 10,
                'brand_id' => 14, 
                'car_id' => 11, 
                'price' => 500,
                'code' => 'PROD001',
            ],
            [
                'name_ar' => 'غطاء سيارة مقاوم للماء طبقة واحدة',
                'name_en' => 'Waterproof Car Cover 1 Layer ',
                'desc_ar' => 'غطاء سيارة للحماية من الطقس الثقيل ومقاوم للمطر ومقاوم للغبار ',
                'desc_en' => 'Car Cover Heavy Weather Protection Rainproof Dust-Proof',
                'photo' => 'sample/photo/path2.jpg',
                'type' => 'مقلد',
                'model' => '2023',
                'offer' => 'لا يوجد عرض',
                'offer_type' => null,
                'offer_value' => null,
                'from_date' => null,
                'to_date' => null,
                'product_type_id' => 4, 
                'product_department_id' => 9, 
                'store_id' => 10,
                'brand_id' => 13, 
                'car_id' => 10, 
                'price' => 300,
                'code' => 'PROD002',
            ],
        ];

        foreach ($products as $productData) {
            $product = new Product();
            
            // Assign translations for name and description
            foreach (config('app.languages') as $locale => $language) {
                $product->translateOrNew($locale)->name = $productData["name_$locale"];
                $product->translateOrNew($locale)->desc = $productData["desc_$locale"];
            }

            // Assign other fields
            $product->photo = $productData['photo'];
            $product->type = $productData['type'];
            $product->model = $productData['model'];
            $product->offer = $productData['offer'];
            $product->offer_type = $productData['offer_type'];
            $product->offer_value = $productData['offer_value'];
            $product->from_date = $productData['from_date'];
            $product->to_date = $productData['to_date'];
            $product->product_type_id = $productData['product_type_id'];
            $product->product_department_id = $productData['product_department_id'];
            $product->store_id = $productData['store_id'];
            $product->brand_id = $productData['brand_id'];
            $product->car_id = $productData['car_id'];
            $product->price = $productData['price'];
            $product->code = $productData['code'];

            // Calculate final price based on offer
            $finalPrice = $product->price;
            if ($product->offer === 'يوجد عرض') {
                if ($product->offer_type === 'قيمة') {
                    $finalPrice -= $product->offer_value;
                } elseif ($product->offer_type === 'نسبة %') {
                    $finalPrice -= ($product->price * ($product->offer_value / 100));
                }
            }
            $product->final_price = max(0, $finalPrice);

            // Save the product
            $product->save();
        }
    }
}
