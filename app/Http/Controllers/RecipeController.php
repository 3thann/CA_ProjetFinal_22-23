<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recipe;
use App\Models\RecipeIngredient;
use App\Models\Ingredient;

class RecipeController extends Controller
{
    public function menu()
    {
        $recipes = Recipe::all();

        return view('recipe.menu', compact("recipes"));
    }

    public function index()
    {
        $recipes = Recipe::all();

        return view('recipe.index', compact("recipes"));
    }

    public function show($id)
    {
        $recipeingredient = RecipeIngredient::with("recipe", "ingredient")->where('recipe_id', $id)->get();

        return view('recipe.show', compact("recipeingredient"));
    }

    public function create()
    {
        $ingredients = Ingredient::all();

        return view('recipe.create', compact("ingredients"));
    }

    public function store(Request $request)
    {
        $recipe = new Recipe();
        $recipe->name = $request->get('name');
        $recipe->image = 'menu-1.jpg';
        $recipe->price = $request->get('price');
        $recipe->save();

        $quantity = $request->get("quantity");

        foreach ($request->ingredient_id as $key => $ingredient_id) {
            $recipeingredient = new RecipeIngredient();
            $recipeingredient->recipe_id = $recipe->id;
            $recipeingredient->ingredient_id = $ingredient_id;
            $recipeingredient->quantity = $quantity[$key];
            $recipeingredient->save();
            $recipeingredient = null;
        }

        return redirect()->route('recipe.index');
    }

    public function edit($id)
    {
        $recipe = Recipe::with("recipeingredient", "recipeingredient.ingredient")->find($id)->first();
        $ingredients = Ingredient::all();

        return view('recipe.edit', compact("recipe", "ingredients"));
    }

    public function update(Request $request, $id) 
    {
        $recipe = Recipe::find($id);
        $recipe->name = $request->get('name');
        $recipe->image = 'menu-1.jpg';
        $recipe->price = $request->get('price');
        $recipe->top_recipes = $request->get('top_recipes');
        $recipe->save();

        RecipeIngredient::where('recipe_id', $id)->delete();

        $quantity = $request->get("quantity");

        foreach ($request->ingredient_id as $key => $ingredient_id) {
            $recipeingredient = new RecipeIngredient();
            $recipeingredient->recipe_id = $recipe->id;
            $recipeingredient->ingredient_id = $ingredient_id;
            $recipeingredient->quantity = $quantity[$key];
            $recipeingredient->save();
            $recipeingredient = null;
        }

        return redirect()->route("recipe.index");
    }

    public function destroy(Request $request)
    {
        RecipeIngredient::where('recipe_id', $request->get('recipe_id'))->delete();
        Recipe::destroy($request->get("recipe_id"));

        return redirect()->route("recipe.index");
    }
}
