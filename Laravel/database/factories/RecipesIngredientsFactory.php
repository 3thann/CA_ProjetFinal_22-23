<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\RecipesIngredients>
 */
class RecipesIngredientsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            "recipe_id" => '1',
            "ingredient_id" => fake()->numberBetween(1, 10),
            "quantity" => fake()->numberBetween(1, 10),
        ];
    }
}
