<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    public function definition(): array
    {
        return [
            'category_id' => null,
            'supplier_id' => null,
            'name' => fake()->randomElement([
                'Adidas Samba OG',
                'Adidas Handball Spezial',
                'Adidas Gazelle',
                'Nike P-6000',
                'Nike Air Force 1',
                'Nike Air Max 90',
                'Nike Dunk Low',
                'Puma Speedcat',
                'Puma Palermo',
                'Puma Suede Classic',
                'New Balance 530',
                'New Balance 550',
                'New Balance 9060',
                'On Cloud 5',
                'On Cloudswift',
                'Salomon XT-6',
                'Onitsuka Tiger Mexico 66',
                'Onitsuka Tiger Tokuten',
                'Converse Chuck Taylor All Star',
                'Converse Run Star Hike',
            ]),
            'description' => fake()->sentence(12),
            'price' => fake()->numberBetween(500000, 3500000),
            'stock' => fake()->numberBetween(5, 50),
            'brand' => fake()->randomElement([
                'Adidas',
                'Nike',
                'Puma',
                'New Balance',
                'On',
                'Salomon',
                'Onitsuka Tiger',
                'Converse',
            ]),
            'size' => fake()->randomElement([
                '38',
                '39',
                '40',
                '41',
                '42',
                '43',
                '44',
            ]),
            'color' => fake()->randomElement([
                'Black',
                'White',
                'Cream',
                'Navy',
                'Brown',
                'Grey',
                'Blue',
                'Green',
            ]),
            'image' => null,
        ];
    }
}