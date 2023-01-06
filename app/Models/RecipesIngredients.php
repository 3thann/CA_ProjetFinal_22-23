<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Recipes;
use App\Models\Ingredients;

class RecipesIngredients extends Model
{
    use HasFactory;

    protected $table = "recipes_ingredients";

    protected $fillable = ['recipe_id', 'ingredient_id', 'quantity'];

    public function recipe() 
    {
        return $this->belongsTo(Recipes::class, "recipe_id");
    }

    public function ingredient() 
    {
        return $this->belongsTo(Ingredients::class, "ingredient_id");
    }
}
