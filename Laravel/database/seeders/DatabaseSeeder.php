<?php

namespace Database\Seeders;

use App\Models\Categorie;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->call(FrameSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(CustomProductSeeder::class);
        $this->call(HandlebarsSeeder::class);
        $this->call(PropulsionMethodSeeder::class);
        $this->call(PedalSeeder::class);
        $this->call(HandleSeeder::class);
        $this->call(LuggageRackSeeder::class);
        $this->call(WheelSeeder::class);
        $this->call(OrdersSeeder::class);
        $this->call(ProductSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(OrderProductSeeder::class);
    }
}
