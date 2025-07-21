<?php

namespace Database\Factories;

use App\Models\Ferry;
use App\Models\User;
use App\Enums\Role;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\FerryTicket>
 */
class FerryTicketFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
          'ferry_id' => Ferry::factory(),
          'visitor_id' => User::factory()->state([
            'role' => Role::VISITOR
          ]),
          'bookie_id' => User::factory()->state([
            'role' => Role::FERRY_ADMIN
          ]),
          'visitors' => fake()->numberBetween(1, 4),
          'total_price' => 0,
        ];
    }
}
