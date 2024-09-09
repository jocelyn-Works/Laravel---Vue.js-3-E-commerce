<?php

namespace Database\Seeders;

use App\Models\Handle;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HandleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $Poignier = Handle::newFactory()->count(10)->create();
    }
}
