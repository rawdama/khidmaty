<?php

namespace Database\Seeders;
use Database\Seeders\AdminSeeder;
use Database\Seeders\CarSeeder;
use Database\Seeders\BannerSeeder;
use Database\Seeders\BrandSeeder;
use Database\Seeders\ProductTypeSeeder;
use Database\Seeders\PrdouctDeparmentSeeder;
use Database\Seeders\ProductStoreSeeder;
use Database\Seeders\StoreSeeder;
use Database\Seeders\CartSeeder;

use App\Models\User;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        $this->call(AdminSeeder::class);
        $this->call(CarSeeder::class);
        $this->call(BannerSeeder::class);
        $this->call(BrandSeeder::class);
        $this->call(ProductTypeSeeder::class);
        $this->call(ProductStoreSeeder::class);
        $this->call(PrdouctDeparmentSeeder::class);
        $this->call(StoreSeeder::class);
        $this->call(ProductSeeder::class);
        $this->call(CartSeeder::class);

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
    }
}
