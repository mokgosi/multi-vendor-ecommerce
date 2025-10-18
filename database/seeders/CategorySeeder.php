<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Category::factory(10)->create();
        Category::factory()->create(['name' => 'Electronics', 'slug' => 'electronics']);
        Category::factory()->create(['name' => 'Fashion & Apparel', 'slug' => 'fashion-apparel']);
        Category::factory()->create(['name' => 'Home & Living', 'slug' => 'home-living']);
        Category::factory()->create(['name' => 'Books & Media', 'slug' => 'books-media']);
        Category::factory()->create(['name' => 'Sports & Outdoors', 'slug' => 'sports-outdoors']);
        Category::factory()->create(['name' => 'Health & Beauty', 'slug' => 'health-beauty']);
        Category::factory()->create(['name' => 'Toys & Hobbies', 'slug' => 'toys-hobbies']);
        Category::factory()->create(['name' => 'Automotive', 'slug' => 'automotive']);
        Category::factory()->create(['name' => 'Groceries & Gourmet Food', 'slug' => 'groceries-gourmet-food']);
        Category::factory()->create(['name' => 'Office Supplies', 'slug' => 'office-supplies']);
        Category::factory()->create(['name' => 'Pet Supplies', 'slug' => 'pet-supplies']);
        Category::factory()->create(['name' => 'Garden & Outdoors', 'slug' => 'garden-outdoors']);
        Category::factory()->create(['name' => 'Baby & Kids', 'slug' => 'baby-kids']);
    }
}
