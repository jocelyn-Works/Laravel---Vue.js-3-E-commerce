<?php

namespace Database\Seeders;

use App\Models\Handlebars;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HandlebarsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $guidon = Handlebars::newFactory()->count(10)->create();
    }
}
