<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    public function run(): void
    {
        $users = User::where('role', 'user')->get();
        $products = Product::all();

        foreach ($users as $user) {
            for ($i = 0; $i < 4; $i++) {

                $order = Order::create([
                    'user_id' => $user->id,
                    'total_amount' => 0,
                    'status' => fake()->randomElement([
                        'pending',
                        'processing',
                        'shipped',
                        'completed',
                    ]),
                    'shipping_address' => fake()->address(),
                ]);

                $total = 0;

                $selectedProducts = $products
                    ->random(rand(1, 3));

                foreach ($selectedProducts as $product) {
                    $quantity = rand(1, 2);
                    $subtotal = $product->price * $quantity;

                    OrderItem::create([
                        'order_id' => $order->id,
                        'product_id' => $product->id,
                        'quantity' => $quantity,
                        'price' => $product->price,
                    ]);

                    $total += $subtotal;
                }

                $order->update([
                    'total_amount' => $total,
                ]);
            }
        }
    }
}