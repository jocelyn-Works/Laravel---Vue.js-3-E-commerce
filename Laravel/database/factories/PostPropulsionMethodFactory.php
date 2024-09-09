<?php

namespace Database\Factories;

use App\Models\PropulsionMethod;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class PostPropulsionMethodFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = PropulsionMethod::class;
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'max_speed' => random_int(25,75),
            'autonomie' => random_int(25,75),
            'price' => random_int(100,1000),
            'image' => fake()->imageUrl(640,480,'velo',true,'moyen de propulsion'),
            'stock' => random_int(50,500),
        ];
    }
}
