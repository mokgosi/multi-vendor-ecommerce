<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->insert([
            [
                'name' => 'MacBook Pro 16-inch',
                'price' => 2499.99,
                'inventory' => 50,
                'discount_percent' => 10,
            ],
            [
                'title' => 'iPhone 15 Pro Max',
                'price' => 1199.00,
                'inventory' => 120,
                'discount_percent' => 0,
            ],
            [
                'title' => 'AirPods Pro 2nd Gen',
                'price' => 249.00,
                'inventory' => 200,
                'discount_percent' => 5,
            ],
        ]);
    }
}
