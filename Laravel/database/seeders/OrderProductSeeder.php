<?php

namespace Database\Seeders;

use App\Models\OrderProduct;
use Illuminate\Database\Seeder;

class OrderProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 10; $i++) {
            OrderProduct::create([
                'order_id' => rand(1, 10),
                'product_id' => rand(1, 10),
            ]);
        }
    }
}
