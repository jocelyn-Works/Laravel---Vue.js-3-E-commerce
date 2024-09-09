<?php

namespace Database\Seeders;


use App\Models\Order;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class OrdersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 100; $i++) {
            Order::create([
                'status' => Str::random(10),
                'user_id' => rand(1, 10),
            ]);
        }
    }
}
