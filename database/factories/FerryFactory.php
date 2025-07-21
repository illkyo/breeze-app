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
        $capacity = fake()->numberBetween(50, 100);
        return [
            'name' => fake()->cityPrefix(),
            'price' => fake()->randomFloat(2, 5, 20),
            'capacity' => $capacity,
            'visitors_onboard' => fake()->numberBetween(0, $capacity)
        ];
    }
}
