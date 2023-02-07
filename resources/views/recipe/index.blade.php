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
                <h1 class="display-4">Recipes</h1>
            </div>

            <table border="1" class="table-ingredients">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($recipes as $recipe)
                        <tr>
                            <td>{{ $recipe->name }}</td>
                            <td>{{ $recipe->price }}</td>
                            <td class="d-flex justify-content-around">
                                <a href="{{ route('recipe.show', $recipe->id) }}" class="btn-admin"><i class="fas fa-eye"></i></a>
                                <a href="{{ route('recipe.edit', $recipe->id) }}" class="btn-admin"><i class="fas fa-edit"></i></a>
                                <form action="{{ route('recipe.destroy', $recipe->id) }}" method="POST">
                                    @method("delete")
                                    @csrf
                                    <input type="hidden" name="recipe_id" value="{{ $recipe->id }}">
                                    <button class="btn-admin">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <form action="{{ route('recipe.create') }}" class="mb-5 pt-3" method="GET">
                @csrf
                <button class="btn btn-primary btn-block font-weight-bold py-3" type="submit">Create recipe</button>
            </form>

        </div>
    </div>
    <!-- Menu End -->

@endsection