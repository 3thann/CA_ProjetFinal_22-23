<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\RecipesIngredients;

class Ingredients extends Model
{
    use HasFactory;
   
    protected $table = "ingredients";

    protected $fillable = ['name', 'stock'];

    public function recipeingredient() 
    {
        return $this->hasMany(RecipesIngredients::class, "ingredient_id");
    }
}