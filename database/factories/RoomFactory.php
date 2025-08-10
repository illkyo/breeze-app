<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Room>
 */
class RoomFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'code' => str_pad(fake()->numberBetween(0, 9999), 4, '0', STR_PAD_LEFT),
            'price' => fake()->randomFloat(2, 5, 20),
            'booked' => fake()->randomElement([true, false])
        ];
    }
}
