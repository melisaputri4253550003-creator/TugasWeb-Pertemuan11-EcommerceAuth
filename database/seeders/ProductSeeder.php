<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use App\Models\Supplier;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $categories = Category::all();
        $suppliers = Supplier::all();

        $products = [
            'Adidas Samba OG',
            'Adidas Handball Spezial',
            'Adidas Gazelle',
            'Adidas Campus 00s',
            'Adidas Forum Low',
            'Adidas Superstar',
            'Adidas SL 72 OG',
            'Adidas Response CL',
            'Nike P-6000',
            'Nike Air Force 1',
            'Nike Air Max 90',
            'Nike Air Max 1',
            'Nike Dunk Low',
            'Nike Cortez',
            'Nike Vomero 5',
            'Nike Waffle Debut',
            'Puma Speedcat',
            'Puma Palermo',
            'Puma Suede Classic',
            'Puma CA Pro',
            'Puma Rider FV',
            'Puma RS-X',
            'New Balance 530',
            'New Balance 550',
            'New Balance 9060',
            'New Balance 2002R',
            'New Balance 327',
            'New Balance 574',
            'New Balance 1906R',
            'On Cloud 5',
            'On Cloudswift',
            'On Cloudnova',
            'On Cloudmonster',
            'On Cloudrunner',
            'Salomon XT-6',
            'Salomon ACS Pro',
            'Salomon XT-Wings',
            'Salomon Speedcross',
            'Onitsuka Tiger Mexico 66',
            'Onitsuka Tiger Tokuten',
            'Onitsuka Tiger GSM',
            'Converse Chuck Taylor All Star',
            'Converse Chuck 70',
            'Converse Run Star Hike',
            'Converse Weapon',
            'Vans Old Skool',
            'Vans Authentic',
            'Vans Era',
            'Vans Sk8-Hi',
            'ASICS Gel-Kayano 14',
            'ASICS Gel-NYC',
            'ASICS Gel-1130',
            'ASICS Japan S',
            'Reebok Club C 85',
            'Reebok Classic Leather',
            'Reebok Question Mid',
            'Hoka Clifton',
            'Hoka Bondi',
            'Under Armour HOVR',
            'Under Armour Charged Assert',
        ];

        foreach ($products as $name) {
            Product::factory()->create([
                'category_id' => $categories->random()->id,
                'supplier_id' => $suppliers->random()->id,
                'name' => $name,
            ]);
        }
    }
}