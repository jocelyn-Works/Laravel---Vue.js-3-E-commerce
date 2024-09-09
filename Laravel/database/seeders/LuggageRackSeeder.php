<?php

namespace Database\Seeders;

use App\Models\LuggageRack;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LuggageRackSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pb = LuggageRack::newFactory()->count(10)->create(); 
    }
}
