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
<div class="container-fluid py-5">
    <div class="container">
        <div class="reservation position-relative overlay-top overlay-bottom">
            <div class="col-lg-6">
                <div class="text-center p-5" style="background: rgba(51, 33, 29, .8);">
                    <h1 class="text-white mb-4 mt-5">Create your recipe</h1>
                    <form action="{{ route('recipe.store') }}" class="mb-5" method="POST">
                        @csrf
                        <div class="form-group">
                            <input type="text" class="form-control bg-transparent border-primary p-4" name="name" placeholder="Name"
                                required="required" />
                        </div>
                        <div class="form-group group-create-recipe">
                            <input type="text" class="form-control bg-transparent border-primary p-4" id="nb_ingredient" name="nb_ingredient" 
                                placeholder="Number of ingredients" required="required" />
                            <button class="btn btn-primary btn-block font-weight-bold py-3" type="button" style="height: 50px;" 
                                onclick="createIngredientField({{ $ingredients }});">Generate the fields</button>
                        </div>
                        <div id="ingredient"></div>
                        <div class="form-group">
                            <input type="text" class="form-control bg-transparent border-primary p-4" name="price" placeholder="Price"
                                required="required" />
                        </div>
                        <div class="form-group">
                            <select class="custom-select bg-transparent border-primary px-4" style="height: 49px;" name="top_recipes">
                                <option value="">Top recipe ?</option>
                                <option value="0">No</option>
                                <option value="1">Yes</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="file" class="form-control bg-transparent border-primary p-4" name="image" accept="image/png, image/jpeg"
                                required="required" />
                        </div>
                        <div>
                            <button class="btn btn-primary btn-block font-weight-bold py-3" type="submit">Create recipe</button>
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

<script>
    function createIngredientField(ingredients) {
        var field = document.getElementById("nb_ingredient");
        var nb_ingredient = field.value;
        for (var i = 0; i < nb_ingredient; i++) {
            var div = document.createElement("div");
            div.classList.add("form-group", "group-create-recipe");
            console.log("ingredient_id" + i);
            var select = document.createElement("select");
            select.classList.add("custom-select", "bg-transparent", "border-primary", "px-4");
            select.setAttribute("name", "ingredient_id" + i);
            select.style.height = "50px";

            var option = document.createElement("option");
            option.text = "Choose an ingredient.";
            option.value = null;
            select.add(option);
            div.appendChild(select);

            ingredients.forEach(ingredient => {
                var option = document.createElement("option");
                option.text = ingredient["name"];
                option.value = ingredient["id"];
                select.add(option);
                div.appendChild(select);
            });

            var input = document.createElement("input");
            input.setAttribute("type", "text");
            input.setAttribute("name", "quantity" + i);
            input.setAttribute("placeholder", "Quantity");
            input.classList.add("form-control", "bg-transparent", "border-primary", "p-4");
            div.appendChild(input);
            document.getElementById("ingredient").appendChild(div);
        }
    }
</script>

@endsection