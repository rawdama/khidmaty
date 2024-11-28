<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Create a sample admin user
        Admin::create([
            'name' => 'Admin User',
            'phone' => '1234567890',
            'email' => 'admin@example.com',
            'password' => Hash::make('password123'), // Use Hash to encrypt the password
            'permissions' => json_encode([
                'clients' => [
                    'create' => '1',
                    'read' => '1',
                    'update' => '1',
                    'delete' => '1'
                ],
                'settings' => [
                    'create' => '1',
                    'read' => '1',
                    'update' => '1',
                    'delete' => '1'
                ]
            ])
        ]);
    }

}
