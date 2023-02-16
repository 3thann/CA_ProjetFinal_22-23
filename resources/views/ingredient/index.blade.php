@extends('layouts.app')


@section('content')


<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 pt-3 text-gray-800">Ingredients</h1>
    <p class="mb-4">To add an ingredient, please fill out the form below:</p>
    <form action="{{ route('ingredient.store')}}" method="POST" class="d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
        @csrf
        <div class="input-group">
            <input type="text" name="name" class="form-control bg-light border small" value="{{old('name')}}" placeholder="Name" aria-label="Search" aria-describedby="basic-addon2">

            <input type="text" name="stock" class="form-control bg-light border small" value="{{old('stock')}}" placeholder="Stock" aria-label="Search" aria-describedby="basic-addon2">
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
                                <th>Stock</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($ingredients as $ingredient)
                                <tr>
                                    <td style="width: 33%;">{{$ingredient->name}}</td>
                                    <td style="width: 33%;">{{$ingredient->stock}}</td>
                                    <td class="custom-td">
                                        <a href="{{ route('ingredient.edit', $ingredient->id) }}" class="btn btn-light btn-icon-split" spellcheck="false">
                                        <span class="icon text-gray-600">
                                            <i class="far fa-edit"></i>
                                        </span>
                                        <span class="text">Edit</span>
                                    </a>
                                        <a href="#" class="btn btn-light btn-icon-split" spellcheck="false">
                                        <span class="icon text-gray-600">
                                            <i class="far fa-eye"></i>
                                        </span>
                                        <span class="text">Show</span>
                                    </a></td>
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