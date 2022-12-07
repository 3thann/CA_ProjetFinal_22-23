<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Recipes::factory(10)->create();
        \App\Models\Ingredients::factory(10)->create();

        for($i=1; $i<=10; $i++){
            \App\Models\RecipesIngredients::factory()->state(['recipe_id' => $i])->create();
        }

        \App\Models\Users::factory(10)->create();
        \App\Models\Bookings::factory(10)->create();

        for($i=1; $i<=10; $i++){
            \App\Models\Tables::factory()->state(['name' => $i])->create();
        }
    }
}
