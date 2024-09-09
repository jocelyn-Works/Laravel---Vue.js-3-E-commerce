<?php

namespace Database\Seeders;

use App\Models\Pedal;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PedalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pedale = Pedal::newFactory()->count(10)->create();
    }
}
