<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recipe;
use App\Models\RecipeIngredient;
use App\Models\Ingredient;

class IngredientController extends Controller
{
    public function index()
    {
        $ingredients = Ingredient::all();
        return view('ingredient.index', compact("ingredients"));
    }

    public function show($id)
    {

        $recipeingredient = RecipeIngredient::with("recipe", "ingredient")->where('ingredient_id', $id)->get();
        if (count($recipeingredient) > 0) {
            return view('ingredient.show', compact("recipeingredient"));
        } else {
            return redirect()->route('ingredient.index');
        }        
    }

    public function store(Request $request)
    {
        $ingredient = new Ingredient();
        $ingredient->name = $request->get('name');
        $ingredient->stock = $request->get('stock');
        $ingredient->save();

        return redirect()->route('ingredient.index');
    }

    public function edit($id)
    {
        $ingredient = Ingredient::find($id);
        return view('ingredient.edit', compact("ingredient"));
    }

    public function update(Request $request, $id)
    {
        $ingredient = Ingredient::find($id);
        $ingredient->name = $request->get('name');
        $ingredient->stock = $request->get('stock');
        $ingredient->save();

        return redirect()->route('ingredient.index');
    }

    public function destroy(Request $request)
    {
        RecipeIngredient::where('ingredient_id', $request->get('ingredient_id'))->delete();
        Ingredient::destroy($request->get("ingredient_id"));
        return redirect()->route("ingredient.index");
    }
}
