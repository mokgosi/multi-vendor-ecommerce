<?php

namespace Database\Factories;

use App\Http\Requests\StoreReviewRequest;
use App\Models\Department;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = fake()->unique()->word();
        return [
            'name' => $name,
            'slug' => Str::slug($name, '-'),
            'description' => fake()->sentence(),
            'is_active' => fake()->boolean(),
            'department_id' => Department::inRandomOrder()->first()->id,
            'parent_id' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
