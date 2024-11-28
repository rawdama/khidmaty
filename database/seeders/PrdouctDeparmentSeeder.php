<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ProductDepartment;

class PrdouctDeparmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $ProductDepartment=[
            [
                'name_ar'=>'الصدامات، الشبوك والواجهة',
                'name_en'=>'Bumpers, Grilles, and Front Fascia',
                'product_store_id'=>'6',
                'photo'=>'C:\Users\ascom\Desktop\toyta.png'
            ],
           [
            'name_ar'=>'المساعدات، المقصات وعمود التوازن'  ,
            'name_en'=>'Struts, Axles, and Drive Shafts',
            'product_store_id'=>'6',
            'photo'=>'C:\Users\ascom\Desktop\toyta.png'

           ],
           [
            'name_ar'=>'البواجي، الفلاتر والسيور'  ,
            'name_en'=>'Spark Plugs, Filters, and Belts',
            'product_store_id'=>'7',
            'photo'=>'C:\Users\ascom\Desktop\toyta.png'

           ],
           [
            'name_ar'=>'المكائن، القيرات وملحقاتها'  ,
            'name_en'=>'Engines, Transmissions, and Accessories',
            'product_store_id'=>'7',
            'photo'=>'C:\Users\ascom\Desktop\toyta.png'

           ]
        ];
        foreach($ProductDepartment as $ProductDepartmentData){
            $ProductDepartment=new ProductDepartment();
            foreach (config('app.languages') as $locale => $language) {
                $ProductDepartment->translateOrNew($locale)->name = $ProductDepartmentData["name_$locale"];
            }
            if (isset($ProductDepartmentData['photo'])) {
                $ProductDepartment->photo = $ProductDepartmentData['photo']; 
            }
            $ProductDepartment->product_store_id = $ProductDepartmentData['product_store_id']; 
            $ProductDepartment->admin_id=5;
            $ProductDepartment->save();
        }
    }
}
