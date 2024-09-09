<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CustomProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 50; $i++) {
            DB::table('custom_products')->insert([
                'frame_id' => rand(1,10),
                'propulsion_method_id' => rand(1,10),
                'wheel_id' => rand(1,10),
                'luggage_rack_id' => rand(1,10),
                'handlebars_id' => rand(1,10),
                'pedal_id' => rand(1,10),
                'handle_id' => rand(1,10),
                'order_id' => rand(1, 10),
            ]);
        }
    }
}
