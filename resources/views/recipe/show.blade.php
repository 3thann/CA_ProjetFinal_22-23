@extends('layout-admin.app')

@section('content')


<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 pt-3 text-gray-800">{{ $recipeingredient[0]->recipe->name }}</h1>

    <div class="container">
        <div class="row h-100">
          <div class="col-md-6">
            <img src="{{ asset('img/' . $recipeingredient[0]->recipe->image) }}" alt="Image du produit" class="img-fluid">
          </div>

          <div class="col-md-6 d-flex flex-column justify-content-center align-items-center">
            <h4 class="text-center">Ingredients :</h4>
            <ul class="list-unstyled text-center">
                @foreach ($recipeingredient as $r_recipe)
                
                    <li>{{ $r_recipe->quantity }} x {{ $r_recipe->ingredient->name }}</li>

                @endforeach
            </ul>
          </div>
        </div>
    </div>
</div>

@endsection