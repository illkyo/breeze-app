<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ferry>
 */
class FerryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $locations = ['male_city', 'grand_hotel', 'breeze_island'];
        $from = fake()->randomElement($locations);
        $to = fake()->randomElement(array_diff($locations, [$from]));
        $departure_time = fake()->dateTimeBetween('now', '+2 week');
        $arrival_time = fake()->dateTimeBetween($departure_time, '+2 week');
        
        return [
            'name' => fake()->cityPrefix(),
            'price' => fake()->randomFloat(2, 10, 80),
            'from' => $from,
            'departure_time' => $departure_time,
            'to' => $to,
            'arrival_time' => $arrival_time
        ];
    }
}
