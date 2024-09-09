<?php

namespace Database\Factories;

use App\Models\Wheel;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class PostWheelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Wheel::class;
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'color' => fake()->hexColor(),
            'price' => random_int(100,1000),
            'image' => fake()->imageUrl(640,480,'velo',true,'roue'),
            'stock' => random_int(50,500),
        ];
    }
}
