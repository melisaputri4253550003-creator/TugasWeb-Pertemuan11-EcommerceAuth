<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    public function definition(): array
    {
        return [
            'user_id' => User::where('role', 'user')->inRandomOrder()->first()?->id,
            'total_amount' => 0,
            'status' => fake()->randomElement([
                'pending',
                'processing',
                'shipped',
                'completed',
            ]),
            'shipping_address' => fake()->address(),
        ];
    }
}