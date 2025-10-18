<?php

namespace Database\Seeders;

use App\Models\Product;
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
        // Product::factory(20)->create();
        Product::factory()->create([
            'title' => 'MacBook Pro 16-inch',
            'slug' => 'macbook-pro-16-inch',
            'category_id' => 1
        ]);

        Product::factory()->create([
            'title' => 'MacBook Air M2',
            'slug' => 'macbook-air-m2',
            'category_id' => 1
        ]);

        Product::factory()->create([
            'title' => 'iMac 24-inch',
            'slug' => 'imac-24-inch',
            'category_id' => 1
        ]);

        Product::factory()->create([
            'title' => 'Mac Mini M1',
            'slug' => 'mac-mini-m1',
            'category_id' => 1
        ]);

        Product::factory()->create([
            'title' => 'Mac Studio',
            'slug' => 'mac-studio',
            'category_id' => 1
        ]);

        Product::factory()->create([
            'title' => 'Mac Pro',
            'slug' => 'mac-pro',
            'category_id' => 1
        ]);

        Product::factory()->create([
            'title' => 'Dell XPS 13',
            'slug' => 'dell-xps-13',
            'category_id' => 1
        ]);

        Product::factory()->create([
            'title' => 'HP Spectre x360',
            'slug' => 'hp-spectre-x360',
            'category_id' => 1
        ]);

        Product::factory()->create([
            'title' => 'Lenovo ThinkPad X1 Carbon',
            'slug' => 'lenovo-thinkpad-x1-carbon',
            'category_id' => 1
        ]);

        Product::factory()->create([
            'title' => 'Asus ROG Zephyrus G14',
            'slug' => 'asus-rog-zephyrus-g14',
            'category_id' => 1
        ]);

        Product::factory()->create([
            'title' => 'Microsoft Surface Laptop 4',
            'slug' => 'microsoft-surface-laptop-4',
            'category_id' => 1
        ]);

        Product::factory()->create([
            'title' => 'Acer Swift 3',
            'slug' => 'acer-swift-3',
            'category_id' => 1
        ]);

        Product::factory()->create([
            'title' => 'Razer Blade 15',
            'slug' => 'razer-blade-15',
            'category_id' => 1
        ]);

        Product::factory()->create([
            'title' => 'Google Pixelbook Go',
            'slug' => 'google-pixelbook-go',
            'category_id' => 1
        ]);

        
    }
}
