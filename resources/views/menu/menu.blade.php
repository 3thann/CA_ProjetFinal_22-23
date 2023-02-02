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
                <h1 class="display-4">Our burgers</h1>
            </div>

            <div class="box-menu">

                @foreach($recipes as $recipe)

                    <div class="box-perso">
                        <a href="{{ route('menu.recipe', $recipe->id) }}" style="text-decoration: none;">
                        <div class="box-burger border-menu case-burger text-center">
                            <img class="w-perso" src="img/{{ $recipe->image }}" alt="">
                            <div>
                                <h4>{{ $recipe->name }}</h4>
                                <p>{{ $recipe->price }}€</p>
                            </div>
                        </div>
                        </a>
                    </div>
                <br>

                @endforeach

            </div>
        </div>
    </div>
    <!-- Menu End -->

@endsection