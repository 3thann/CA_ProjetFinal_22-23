<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recipe;
use App\Models\Ingredient;
use App\Models\User;
use App\Models\Contact;

class GenericsController extends Controller
{
    public function index()
    {
        return view('generics.index');
    }

    public function dashboard()
    {
        $nb_recipes = count(Recipe::all());
        $nb_ingredients = count(Ingredient::all());
        $nb_users = count(User::all());
        $nb_messages = count(Contact::all());

        return view('dashboard', compact('nb_recipes', 'nb_ingredients', 'nb_users', 'nb_messages'));
    }

    public function about()
    {
        return view('generics.about');
    }

    public function reservation()
    {
        return view('generics.reservation');
    }
    
    public function contact()
    {
        return view('generics.contact');
    }
}
