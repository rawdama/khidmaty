<?php

namespace Database\Seeders;

use App\Models\Slider;
use Illuminate\Database\Seeder;

class BannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sliders = [
            [
                'name_ar' => 'استكشف قطع غيار وإكسسواراتنا',
                'name_en' => 'Explore our spare parts and accessories.',
                'desc_ar' => 'اكتشف أحدث القطع والإكسسوارات لتحسين سيارتك.',
                'desc_en' => 'Discover the latest parts and accessories to enhance your car.',
                'photo' => 'C:\Users\ascom\Desktop\pngtree-black-audi-car-side-profile-silhouette-svg-cut-file-black-and-png-image_12726992.png',
                'link' => 'https://example.com/1',
                'type' => 'الويب', 
                'location' => 'اعلي اليمين', 
            ],
            [
                'name_ar' => ' سوائل وزيوت لصحة المحرك ',
                'name_en' => 'Fluids and Oils for Engine Health',
                'desc_ar' => ' الزيوت ذات القيمة العالية',
                'desc_en' => 'High value oils',
                'photo' =>  'C:\Users\ascom\Desktop\png-clipart-car-silhouette-automotive-design-car-compact-car-truck-thumbnail.png', 
                'link' => 'https://example.com/2',
                'type' => 'التطبيق',
                'location' => 'اسفل اليمين',
            ]
        ];

        foreach ($sliders as $sliderData) {
            $slider = new Slider();

           
            foreach (config('app.languages') as $locale => $language) {
                $slider->translateOrNew($locale)->name = $sliderData["name_$locale"];
                $slider->translateOrNew($locale)->desc = $sliderData["desc_$locale"];
            }

         
            if (isset($sliderData['photo'])) {
                $slider->photo = $sliderData['photo']; 
            }
            $slider->link = $sliderData['link'];
            $slider->type = $sliderData['type'];
            $slider->location = $sliderData['location'];
            $slider->admin_id = 5; 

            
            $slider->save();
        }
    }
}