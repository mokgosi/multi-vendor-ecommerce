<?php

namespace Database\Seeders;

use App\Enums\RolesEnum;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@mail.com'
        ])->assignRole(RolesEnum::Admin->value);

        User::factory()->create([
            'name' => 'User 1',
            'email' => 'user1@mail.com'
        ])->assignRole(RolesEnum::User->value);

        User::factory()->create([
            'name' => 'User 2',
            'email' => 'user2@mail.com'
        ])->assignRole(RolesEnum::User->value);

        User::factory()->create([
            'name' => 'Vendor',
            'email' => 'vendor@mail.com'
        ])->assignRole(RolesEnum::Vendor->value);


    }
}
