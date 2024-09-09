<?php

namespace Database\Factories;

use App\Models\Handlebars;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class PostHandlebarsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Handlebars::class;
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'color' => fake()->hexColor(),
            'material' => Str::random(10),
            'price' => random_int(100,1000),
            'image' => fake()->imageUrl(640,480,'velo',true,'moyen de propulsion'),
            'stock' => random_int(50,500),
        ];
    }
}
