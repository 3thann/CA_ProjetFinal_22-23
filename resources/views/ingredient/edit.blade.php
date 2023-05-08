@extends('layout-admin.app')

@section('content')

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 pt-3 text-gray-800">Ingredients</h1>
    <p class="mb-4 pt-3">Edit {{ $ingredient->name }}</p>
        <form action="{{ route('ingredient.update', $ingredient->id)}}" method="POST" class="d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            @method("PUT")
            @csrf
            <div class="input-group">
                <input type="text" name="name" class="form-control bg-light border small" placeholder="Change name" aria-label="Search" aria-describedby="basic-addon2" value="{{ $ingredient->name }}">

                <input type="text" name="stock" class="form-control bg-light border small" placeholder="Change stock" aria-label="Search" aria-describedby="basic-addon2" value="{{ $ingredient->stock }}">
                <input type="hidden" name="ingredient_id" value='{{$ingredient->id}}'>
                <div class="input-group-append">
                    <button type="submit" class="btn btn-success btn-icon-split" spellcheck="false">
                        <span class="icon text-white-50">
                            <i class="fas fa-check"></i>
                        </span>
                        <span class="text">Validate</span>
                    </button>

                </div>
            </div>
        </form>
    <form action="{{ route('ingredient.destroy', $ingredient->id) }}" method="POST" class="d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
        @method("delete")
        @csrf
        <input type="hidden" name="ingredient_id" value="{{ $ingredient->id }}">
        <button type="submit" class="btn btn-danger btn-icon-split" spellcheck="false">
                    <span class="icon text-white-50">
                        <i class="fas fa-trash"></i>
                    </span>
            <span class="text">Delete</span>
        </button>
    </form>

</div>

@endsection