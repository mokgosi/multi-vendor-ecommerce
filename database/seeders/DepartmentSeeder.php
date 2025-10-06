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
            'name' => 'Department 1',
            'slug' => 'department-1',
        ]);

        Department::factory()->create([
            'name' => 'Department 2',
            'slug' => 'department-2',
        ]);

        Department::factory()->create([
            'name' => 'Department 3',
            'slug' => 'department-3',
        ]);
    }
}
