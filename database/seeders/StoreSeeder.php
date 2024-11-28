<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Store;
use Illuminate\Support\Facades\Hash;

class StoreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Create a sample store
        Store::create([
            'name' => 'khidmty Store',
            'countryCode' => '+966',
            'phone' => '1234567890',
            'email' => 'store@example.com',
            'password' => Hash::make('12345678'), 
            'address' => 'الرياض',
            'photo' => 'C:\Users\ascom\Desktop\toyta.png', 
            'product_store_id' => 6, 
            'Commercial_register' => 'C:\Users\ascom\Desktop\Rawda mahmoud.pdf', 
            'offer' => 'Not activated', 
        ]);
    }
}
