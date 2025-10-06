<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Department;
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
        $title = fake()->realText(50);

        return [
            'title' => $title,
            'slug' => Str::slug($title, '-'),
            'thumbnail_url' => fake()->imageUrl(),
            'description' => fake()->realText(512),
            'price' => fake()->randomFloat(2, 10),
            'inventory' => fake()->randomDigit(),
            'discount_percent' => fake()->randomDigit(),
            'status' => 'Active',
            'created_by' => 1,
            'updated_by' => 1,
            'category_id' => Category::inRandomOrder()->first()->id,
            'department_id' => Department::inRandomOrder()->first()->id,
        ];
    }
}
