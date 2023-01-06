<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Recipes>
 */
class RecipesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->sentence(1),
            'price' => fake()->numberBetween(1, 15),
            'image' => 'menu-1.jpg',
            'top_recipes' => rand(0,1) < 0.5,
        ];
    }
}
