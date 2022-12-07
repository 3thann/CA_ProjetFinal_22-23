<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */


class BookingsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $hours = fake()->numberBetween(10, 23);
        $time = Carbon::createFromTimeString("$hours:0:0");
        return [
            'user_id' => fake()->numberBetween(1, 10),
            // 'table_id' => fake()->numberBetween(1, 10),
            'date' => Carbon::now()->tz('Europe/Paris')->addDays(fake()->numberBetween(1, 20)),
            'start_time' => $time,
            'end_time' => $time->addHours(2),
            'nb_customers' => fake()->numberBetween(1, 10),
            'status' => fake()->sentence(1),
        ];
    }
}
