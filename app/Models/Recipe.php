<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    use HasFactory;

    protected $table = "recipes";

    protected $fillable = ['name', 'price', 'image', 'top_recipes'];

    public function recipeingredient() 
    {
        return $this->hasMany(RecipeIngredient::class, "recipe_id");
    }
}
