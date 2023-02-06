<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recipe;
use App\Models\RecipeIngredient;
use App\Models\Ingredient;

class RecipeController extends Controller
{
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
        return redirect()->route('recipe.index');
    }

    public function edit($id)
    {
        $recipeingredient = RecipeIngredient::with("recipe", "ingredient")->where('recipe_id', $id)->get();
        $ingredients = Ingredient::all();
        return view('recipe.edit', compact("recipeingredient", "ingredients"));
    }

    public function update(Request $request, $id) 
    {
        $recipe = Recipe::find($id);
        $recipe->name = $request->get('name');
        $recipe->image = 'menu-1.jpg';
        $recipe->price = $request->get('price');
        $recipe->top_recipes = $request->get('top_recipes');
        $recipe->save();

        // for($n=0; $n<$nb_ingredient; $n++){ 
        //     $recipeingredient = new RecipeIngredient();
        //     $recipeingredient->quantity = $request->get('quantity' . strval($n));
        //     $recipeingredient->ingredient_id = $request->get('ingredient_id' . strval($n));
        //     $recipeingredient->recipe_id = $recipe->id;
        //     $recipeingredient->save();
        //     $recipeingredient = null;
        // -> nb_ingredient = count(recipe->recipeingregient) + nb_changement valeur
        // }

        return redirect()->route("recipe.index");
    }

    public function destroy(Request $request)
    {
        RecipeIngredient::where('recipe_id', $request->get('recipe_id'))->delete();
        Recipe::destroy($request->get("recipe_id"));
        return redirect()->route("recipe.index");
    }
}
