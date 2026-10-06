<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => fake()->unique()->randomElement([
                'Sneakers',
                'Running',
                'Casual',
                'Sport',
                'Lifestyle',
            ]),
            'description' => fake()->sentence(),
        ];
    }
}