<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tables>
 */
class TablesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'max_capacity' => fake()->numberBetween(1,12),
            'name' => '1',
            'area' => 'Inside',
            'avaible' => rand(0,1) < 0.5,
        ];
    }
}
