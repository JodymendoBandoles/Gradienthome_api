<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User; 
use App\Models\Property;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
       
        User::factory()->create([
            'first_name' => 'John', // Provide a first name here
            'last_name' => 'Doe',
            'username' => 'johndoe',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'phone_number' => '1234567890',
            'bio_or_description' => 'Sample bio',
            'profile_image' => 'default_profile_image.jpg',
            'role' => 'regular',
        ]);

        User::factory(10)
            ->has(Property::factory(60))
            ->create();
    }
}
