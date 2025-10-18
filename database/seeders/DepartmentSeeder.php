<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{


    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Department::factory()->create([
            'name' => 'Electronics',
            'slug' => 'electronics',
        ]);

        Department::factory()->create([
            'name' => 'Fashion & Apparel',
            'slug' => 'fashion-apparel',
        ]);

        Department::factory()->create([
            'name' => 'Home & Living',
            'slug' => 'home-living',
        ]);

        Department::factory()->create([
            'name' => 'Books & Media',
            'slug' => 'books-media',
        ]);

        Department::factory()->create([
            'name' => 'Sports & Outdoors',
            'slug' => 'sports-outdoors',
        ]);

        Department::factory()->create([
            'name' => 'Health & Beauty',
            'slug' => 'health-beauty',
        ]);

        Department::factory()->create([
            'name' => 'Toys & Hobbies',
            'slug' => 'toys-hobbies',
        ]);

        Department::factory()->create([
            'name' => 'Automotive',
            'slug' => 'automotive',
        ]);

        Department::factory()->create([
            'name' => 'Groceries & Gourmet Food',
            'slug' => 'groceries-gourmet-food',
        ]);

        Department::factory()->create([
            'name' => 'Pet Supplies',
            'slug' => 'pet-supplies',
        ]);

        Department::factory()->create([
            'name' => 'Office Supplies',
            'slug' => 'office-supplies',
        ]);     

        Department::factory()->create([
            'name' => 'Garden & Outdoor',
            'slug' => 'garden-outdoor',
        ]);

        Department::factory()->create([
            'name' => 'Baby & Kids',
            'slug' => 'baby-kids',
        ]);

        Department::factory()->create([
            'name' => 'Music & Instruments',
            'slug' => 'music-instruments',
        ]);

        Department::factory()->create([
            'name' => 'Travel & Luggage',
            'slug' => 'travel-luggage',
        ]); 

        Department::factory()->create([
            'name' => 'Jewelry & Accessories',
            'slug' => 'jewelry-accessories',
        ]);

        Department::factory()->create([
            'name' => 'Art & Craft Supplies',
            'slug' => 'art-craft-supplies',
        ]);

        Department::factory()->create([
            'name' => 'Industrial & Scientific',
            'slug' => 'industrial-scientific',
        ]);

        Department::factory()->create([
            'name' => 'Software & Electronics',
            'slug' => 'software-electronics',
        ]);

        Department::factory()->create([
            'name' => 'Miscellaneous',
            'slug' => 'miscellaneous',
        ]);
    }
}
