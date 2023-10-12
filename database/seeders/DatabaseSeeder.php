<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as FakerFactory;
use App\Models\User; 
use App\Models\Property;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
        public function run(): void
    {
        $faker = FakerFactory::create();

        $user = User::factory()->create([
            'first_name' => $faker->firstName,
            'last_name' => $faker->lastName,
            'username' => $faker->unique()->userName,
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'phone_number' => '1234567890',
            'bio_or_description' => 'Sample bio',
            'profile_image' => 'default_profile_image.jpg',
            'role' => 'regular',
        ]);

        
        $user->properties()->createMany(Property::factory(60)->raw());
    }
}
