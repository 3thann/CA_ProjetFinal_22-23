<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recipe;

class GenericsController extends Controller
{
    public function index()
    {
        return view('generics.index');
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
