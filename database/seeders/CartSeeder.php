<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Cart;
use App\Models\Product;
use App\Models\Client;

class CartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        $cartItems = [
            [
                'client_id' => 1, 
                'product_id' => 25, 
                'quantity' => 2,
            ],
            [
                'client_id' => 1, 
                'product_id' => 26,
                'quantity' => 1,
            ],
            [
                'client_id' => 4,
                'product_id' => 25, 
                'quantity' => 2,
            ],
        ];

        foreach ($cartItems as $itemData) {
            
            $product = Product::find($itemData['product_id']);
            if (!$product) {
                $this->command->warn("Product with ID {$itemData['product_id']} not found. Skipping.");
                continue;
            }

            $cartItem = new Cart();
            $cartItem->client_id = $itemData['client_id'];
            $cartItem->product_id = $itemData['product_id'];
            $cartItem->quantity = $itemData['quantity'];
            $cartItem->total_price = $product->final_price * $itemData['quantity'];
            $cartItem->save();
        }

        $this->command->info('Cart items seeded successfully.');
    }
}
