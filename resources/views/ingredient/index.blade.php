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

            <table border="1" class="table-ingredients">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Stock</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($ingredients as $ingredient)
                        <tr>
                            <td>{{ $ingredient->name }}</td>
                            <td>{{ $ingredient->stock }}</td>
                            <td class="d-flex justify-content-around">
                                <a href="{{ route('ingredient.show', $ingredient->id) }}" class="btn-admin"><i class="fas fa-eye"></i></a>
                                <a href="{{ route('ingredient.edit', $ingredient->id) }}" class="btn-admin"><i class="fas fa-edit"></i></a>
                                <form action="{{ route('ingredient.destroy', $ingredient->id) }}" method="POST">
                                    @method("delete")
                                    @csrf
                                    <input type="hidden" name="ingredient_id" value="{{ $ingredient->id }}">
                                    <button class="btn-admin">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <h4 class="text-perso">Add an ingredient :</h4>

            <form action="{{ route('ingredient.store') }}" class="mb-5" method="POST">
                @csrf
                <div class="form-group group-create-recipe">
                    <input type="text" class="form-control bg-transparent border-primary p-4" name="name" placeholder="Name"
                        required="required" />
                    <input type="text" class="form-control bg-transparent border-primary p-4" name="stock" placeholder="Stock"
                        required="required" />
                    <div>
                        <button class="btn btn-primary btn-block font-weight-bold py-3" style="height:50px;" type="submit">Add</button>
                    </div>
                </div>
            </form>

        </div>
    </div>
    <!-- Menu End -->

@endsection