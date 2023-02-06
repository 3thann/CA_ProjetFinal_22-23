@extends('../layout.app')

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
<div class="container-fluid py-5">
    <div class="container">
        <div class="reservation position-relative overlay-top overlay-bottom">
            <div class="col-lg-6">
                <div class="text-center p-5" style="background: rgba(51, 33, 29, .8);">
                    <h1 class="text-white mb-4 mt-5">Edit your recipe :</h1>
                    {{ $count_ingredient = 0 }}
                    <form action="{{ route('recipe.update', $recipeingredient[0]->recipe_id) }}" class="mb-5" method="POST">
                        @csrf
                        @method("PUT")
                        <div class="form-group">
                            <input type="text" class="form-control bg-transparent border-primary p-4" name="name" 
                            value="{{ $recipeingredient[0]->recipe->name }}" required="required" />
                        </div>
                        @foreach ($recipeingredient as $r_ingredient)
                            <div class="form-group group-create-recipe">
                                <select class="custom-select bg-transparent border-primary px-4" style="height: 50px;" name="{{ "ingredient_id" . strval($count_ingredient) }}">
                                    <option value="{{ $r_ingredient->ingredient->id }}">{{ $r_ingredient->ingredient->name }}</option>
                                    @foreach ($ingredients as $ingredient)
                                        <option value="{{ $ingredient->id }}">{{ $ingredient->name }}</option>
                                    @endforeach
                                </select>
                                <input type="text" class="form-control bg-transparent border-primary p-4" name="{{ "quantity" . strval($count_ingredient) }}"
                                value="{{ $r_ingredient->quantity }}" required="required" />
                            </div>
                            {{ $count_ingredient++ }}
                        @endforeach
                        <div class="form-group">
                            <input type="text" class="form-control bg-transparent border-primary p-4" name="price" 
                            value="{{ $recipeingredient[0]->recipe->price }}" required="required" />
                        </div>
                        <div class="form-group">
                            <select class="custom-select bg-transparent border-primary px-4" style="height: 50px;" name="top_recipes">
                                <option value="{{ $recipeingredient[0]->recipe->top_recipes }}">Top recipe : {{ $recipeingredient[0]->recipe->top_recipes }}</option>
                                <option value="0">No</option>
                                <option value="1">Yes</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="file" class="form-control bg-transparent border-primary p-4" name="image" accept="image/png, image/jpeg" />
                        </div>
                        <div>
                            <button class="btn btn-primary btn-block font-weight-bold py-3" type="submit">Update recipe</button>
                        </div>
                        <div class="form-group">
                            <p style='padding-top: 20px'><a href="{{ route('recipe.index') }}">Cancel</a>.</p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Menu End -->


@endsection