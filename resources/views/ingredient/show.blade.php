@extends('layout.app')

@section('content')

    <!-- Page Header Start -->
    <div class="container-fluid page-header mb-5 position-relative overlay-bottom">
        <div class="d-flex flex-column align-items-center justify-content-center pt-0 pt-lg-5" style="min-height: 400px">
            <h1 class="display-4 mb-3 mt-0 mt-lg-5 text-white text-uppercase">Menu</h1>
            <div class="d-inline-flex mb-lg-5">
                <p class="m-0 text-white"><a class="text-white" href="{{ route('generics.index') }}">Home</a></p>
                <p class="m-0 text-white px-2">/</p>
                <p class="m-0 text-white">Menu</p>
            </div>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- Menu Start -->
    <div class="container-fluid pt-5">
        <div class="container">
            <div class="section-title">
                <h4 class="text-primary text-uppercase text-spacing-title">Menu</h4>
                <h1 class="display-4">Ingredients</h1>
            </div>

            <div class="d-flex justify-content-around">
                <table border="1" class="table-ingredients w-75">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Stock</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ $recipeingredient[0]->ingredient->name }}</td>
                            <td>{{ $recipeingredient[0]->ingredient->stock }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <h5 class="p-3 body text-center">This ingredient is used in {{ count($recipeingredient) }} recipe(s) :</h5>

            <div class="d-flex justify-content-around">
                <table border="1" class="table-ingredients w-75">
                    <thead>
                        <tr>
                            <th>Recipe Name</th>
                            <th>Quantity</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($recipeingredient as $recipes)
                            <tr>
                                <td>{{ $recipes->recipe->name }}</td>
                                <td>{{ $recipes->quantity }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Menu End -->

@endsection