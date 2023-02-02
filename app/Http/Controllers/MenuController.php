<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recipe;
use App\Models\RecipeIngredient;
use App\Models\Ingredient;

class MenuController extends Controller
{
    public function menu()
    {
        $recipes = Recipe::all();
        return view('menu.menu', compact("recipes"));
    }

    public function recipe($id)
    {
        $recipeingredient = RecipeIngredient::with("recipe", "ingredient")->where('recipe_id', $id)->get();
        return view('menu.recipe', compact("recipeingredient"));
    }

    public function create_recipe()
    {
        $ingredients = Ingredient::all();
        return view('menu.create_recipe', compact("ingredients"));
    }

    public function store(Request $request)
    {
        $recipe = new Recipe();

        $recipe->name = $request->get('name');
        $recipe->image = 'menu-1.jpg';
        $recipe->price = $request->get('price');
        $recipe->top_recipes = $request->get('top_recipes');

        $recipe->save();

        $nb_ingredient = $request->get('nb_ingredient');

        for($n=0; $n<$nb_ingredient; $n++){ 
            $recipeingredient = new RecipeIngredient();
            $recipeingredient->quantity = $request->get('quantity' . strval($n));
            $recipeingredient->ingredient_id = $request->get('ingredient_id' . strval($n));
            $recipeingredient->recipe_id = $recipe->id;
            $recipeingredient->save();
            $recipeingredient = null;
        }

        return redirect()->route('menu.menu');
    }
}
