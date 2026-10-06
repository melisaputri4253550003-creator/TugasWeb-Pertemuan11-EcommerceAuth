<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\Payment;
use Illuminate\Database\Seeder;

class PaymentSeeder extends Seeder
{
    public function run(): void
    {
        $orders = Order::all();

        foreach ($orders as $order) {
            $isPaid = in_array($order->status, [
                'processing',
                'shipped',
                'completed',
            ]);

            Payment::create([
                'order_id' => $order->id,
                'method' => fake()->randomElement([
                    'Bank Transfer',
                    'E-Wallet',
                    'QRIS',
                    'Virtual Account',
                ]),
                'amount' => $order->total_amount,
                'status' => $isPaid ? 'paid' : 'pending',
                'paid_at' => $isPaid ? now() : null,
            ]);
        }
    }
}