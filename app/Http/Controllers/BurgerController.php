<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recipes;
use App\Models\RecipesIngredients;

class BurgerController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function about()
    {
        return view('about');
    }

    public function menu()
    {
        $recipesingredients = RecipesIngredients::all();
        return view('menu', compact("recipesingredients"));
    }

    public function reservation()
    {
        return view('reservation');
    }
    
    public function contact()
    {
        return view('contact');
    }

    public function connection()
    {
        return view('connection');
    }

    public function create_account()
    {
        return view('create_account');
    }

    public function forgot_password()
    {
        return view('forgot_password');
    }

    public function reset_password()
    {
        return view('reset_password');
    }
}
