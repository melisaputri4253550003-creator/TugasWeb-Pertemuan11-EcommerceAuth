<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        Category::factory()->createMany([
            [
                'name' => 'Sneakers',
                'description' => 'Sepatu sneakers untuk aktivitas sehari-hari.',
            ],
            [
                'name' => 'Running',
                'description' => 'Sepatu yang dirancang untuk aktivitas lari.',
            ],
            [
                'name' => 'Casual',
                'description' => 'Sepatu casual untuk penggunaan sehari-hari.',
            ],
            [
                'name' => 'Sport',
                'description' => 'Sepatu untuk berbagai aktivitas olahraga.',
            ],
            [
                'name' => 'Lifestyle',
                'description' => 'Sepatu lifestyle dengan desain modern.',
            ],
        ]);
    }
}