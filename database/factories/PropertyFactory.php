<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Properties>
 */
class PropertyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $province = fake()->randomElement(['Leyte', 'Cebu', 'Batangas', 'Cavite', 'Rizal']);
        $city = fake()->randomElement(['Cebu City', 'Mandaue City', 'Lapu-Lapu City', 'Cavite City', 'Antipolo City']);
        $barangay = fake()->randomElement(['Barangay1', 'Barangay2']);
        $streetNames = [fake()->streetName, fake()->streetName, fake()->streetName];

        return [
            'image_url' => fake()->imageUrl(640, 480),
            'property_name' => fake()->sentence,
            'users_id' => User::factory(),
            'country' => 'Philippines',
            'province' => $province,
            'city' => $city,
            'barangay' => $barangay,
            'street_name' => $streetNames[random_int(0, 2)],
            'block_number' => fake()->buildingNumber,
            'lot_number' => fake()->buildingNumber,
            'price_per_month' => fake()->randomFloat(2, 1000, 5000),
            'total_contract_price' => fake()->randomFloat(2, 10000, 50000),
            'lot_area' => fake()->randomFloat(2, 50, 200),
            'listing_status' => fake()->randomElement(['available', 'sold']),
        ];
    }
}
