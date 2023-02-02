@extends('../layout.app')

@section('content')
    <!-- Page Header Start -->
    <div class="container-fluid page-header mb-5 position-relative overlay-bottom">
        <div class="d-flex flex-column align-items-center justify-content-center pt-0 pt-lg-5" style="min-height: 400px">
            <h1 class="display-4 mb-3 mt-0 mt-lg-5 text-white text-uppercase">Menu</h1>
            <div class="d-inline-flex mb-lg-5">
                <p class="m-0 text-white"><a class="text-white" href="{{ route('generics.index') }}">Home</a></p>
                <p class="m-0 text-white px-2">/</p>
                <p class="m-0 text-white"><a class="text-white" href="{{ route('menu.menu') }}">Menu</a></p>
                <p class="m-0 text-white px-2">/</p>
                <p class="m-0 text-white">{{ $recipeingredient[0]->recipe->name }}</p>
            </div>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- Menu Start -->
    <div class="container-fluid pt-5">
        <div class="container">
            <div class="section-title-recipe">
                <h4 class="text-primary text-uppercase" style="letter-spacing: 4px;">Menu</h4>
                <h1 class="display-4">{{ $recipeingredient[0]->recipe->name }}</h1>
            </div>
            <div class="box-recipe">
                <span class="left-content">
                    <img src="{{ asset('img/' . $recipeingredient[0]->recipe->image) }}">
                </span>
                <span class="right-content">
                
                    <div class="menu-ingredient">
                      <a><h5>Liste d'ingrédients <i class="fas fa-angle-down"></i></h5></a>
                      <div class="menu-ingredient-content">

                        @foreach ($recipeingredient as $item)
                            <a>{{ $item->ingredient->name }}</a>
                        @endforeach
                      </div>
                    </div>
                </span>
            </div>
        </div>
    </div>
    <!-- Menu End -->


@endsection