<?php

namespace Database\Factories;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Department;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = fake()->word(3);

        return [
            'title' => $title,
            'slug' => Str::slug($title, '-'),
            'thumbnail_url' => fake()->imageUrl(),
            'description' => fake()->realText(512),
            'details' => fake()->realText(2048),
            'price' => fake()->randomFloat(2, 10),
            'cost_price' => fake()->randomFloat(2, 5), // Lower than price
            'tax_rate' => fake()->randomFloat(2, 0, 20),
            'discount_percent' => fake()->randomDigit(),
            'inventory' => fake()->randomDigit(),
            'security_stock' => fake()->randomDigit(), // Minimum stock level
            'sku' => strtoupper(fake()->bothify('???-#####')),
            'weight' => fake()->randomFloat(2, 0.1, 10), // Weight in kg
            'barcode' => fake()->ean13(),
            'status' => fake()->randomElement([implode(',', \App\Enums\ProductStatusEnum::allStatuses())]),
            'created_by' => User::inRandomOrder()->first()->id,
            'updated_by' => User::inRandomOrder()->first()->id,
            'brand_id' => Brand::inRandomOrder()->first()->id,
            'category_id' => Category::inRandomOrder()->first()->id,
            'department_id' => Department::inRandomOrder()->first()->id,
            'is_featured' => fake()->boolean(20), // 20% chance to be featured
            'is_reviewable' => fake()->boolean(90), // 90% chance to be reviewable
            'is_returnable' => fake()->boolean(80), // 80% chance to be returnable
            'is_digital' => fake()->boolean(10), // 10% chance to be digital
            'is_taxable' => fake()->boolean(95), // 95% chance to be taxable
            'is_shippable' => fake()->boolean(90), // 90% chance to be shippable
            'is_active' => fake()->boolean(95), // 95% chance to be
        ];
    }
}
