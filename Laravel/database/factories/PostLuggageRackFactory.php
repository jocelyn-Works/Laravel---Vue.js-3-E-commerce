<?php

namespace Database\Factories;

use App\Models\LuggageRack;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class PostLuggageRackFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = LuggageRack::class;
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'volume' => random_int(5,25).'L',
            'price' => random_int(100,1000),
            'image' => fake()->imageUrl(640,480,'velo',true,'moyen de propulsion'),
            'stock' => random_int(50,500),
        ];
    }
}
