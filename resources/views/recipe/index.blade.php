@extends('layout-admin.app')


@section('content')


<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 pt-3 text-gray-800">Recipes</h1>
    <p class="mb-4">To add a recipe, click on the button below:</p>
        @csrf
        <div class="input-group-append pb-4">
            <form action="{{ route('recipe.create') }}" class="d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                <button type="submit" class="btn btn-success btn-icon-split" spellcheck="false">
                    <span class="icon text-white-50">
                        <i class="fas fa-plus"></i>
                    </span>
                    <span class="text">Create a recipe</span>
                </button>
            </form>
        </div>
    {{-- @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif --}}

    <div id="content">
        <!-- DataTales Example -->
        <div class="card shadow mb-4">

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($recipes as $recipe)
                                <tr>
                                    <td style="width: 33%;">{{$recipe->name}}</td>
                                    <td style="width: 33%;">{{$recipe->price}} €</td>
                                    <td class="custom-td">
                                        <a href="{{ route('recipe.edit', $recipe->id) }}" class="btn btn-light btn-icon-split border" spellcheck="false">
                                        <span class="icon text-gray-600">
                                            <i class="far fa-edit"></i>
                                        </span>
                                        <span class="text">Edit</span>
                                        </a>
                                        <a href="{{ route('recipe.show', $recipe->id) }}" class="btn btn-light btn-icon-split border" spellcheck="false">
                                        <span class="icon text-gray-600">
                                            <i class="far fa-eye"></i>
                                        </span>
                                        <span class="text">Show</span>
                                        </a>
                                        <form action="{{ route('recipe.destroy', $recipe->id) }}" method="POST" spellcheck="false">
                                            @method("delete")
                                            @csrf
                                            <input type="hidden" name="recipe_id" value="{{ $recipe->id }}">
                                            <button type="submit" class="btn btn-danger btn-icon-split" spellcheck="false">
                                                        <span class="icon text-white-50">
                                                            <i class="fas fa-trash"></i>
                                                        </span>
                                                <span class="text">Delete</span>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{-- {{ $customers->links('pages.pagination') }} --}}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection