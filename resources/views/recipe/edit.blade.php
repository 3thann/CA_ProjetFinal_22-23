@extends('layout-admin.app')

@section('content')

<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 pt-3 text-gray-800">Edit {{ $recipeingredient[0]->recipe->name }}</h1>
    <form action="{{ route('recipe.update', $recipeingredient[0]->recipe_id)}}" method="POST" class="d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
        @method("PUT")
        @csrf
        <div class="input-group">
            <input type="text" name="name" class="form-control bg-light border small" placeholder="Change name" aria-label="Search" aria-describedby="basic-addon2" value="{{ $recipeingredient[0]->recipe->name }}">
        </div>
        <div class="input-group">
            <input type="text" name="price" class="form-control bg-light border small" placeholder="Change price" aria-label="Search" aria-describedby="basic-addon2" value="{{ $recipeingredient[0]->recipe->price }}">
        </div>

        @foreach ($recipeingredient as $r_recipe)

            <div class="input-group">
                <select name="ingredient_id[]" class="form-control bg-light border small" aria-label="Search" aria-describedby="basic-addon2">
                    <option value="{{ $r_recipe->ingredient->id }}">{{ $r_recipe->ingredient->name }}</option>

                    @foreach ($ingredients as $ingredient)

                        <option value="{{ $ingredient->id }}">{{ $ingredient->name }}</option>

                    @endforeach

                </select>

                <input type="text" class="form-control bg-light border small" name="quantity[]"
                value="{{ $r_recipe->quantity }}" required="required" />
                
                <button type="button" class="btn btn-danger btn-icon-split remove-line" spellcheck="false">
                    <span class="icon text-white-50">
                        <i class="fas fa-trash"></i>
                    </span>
                </button>
            </div>

        @endforeach

        <div id="add-ingredient"></div>

        <div class="input-group">
            <button type="button" onclick="addIngredientField({{ $ingredients }});" class="btn btn-light btn-icon-split border" spellcheck="false">
                <span class="icon text-white-50">
                    <i class="fas fa-plus"></i>
                </span>
                <span class="text">Add an ingredient</span>
            </button>
        </div>

        <div class="input-group">
            <button type="submit" class="btn btn-success btn-icon-split" spellcheck="false">
                <span class="icon text-white-50">
                    <i class="fas fa-check"></i>
                </span>
                <span class="text">Validate</span>
            </button>
    </form>
    <form action="{{ route('recipe.index') }}" class="d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
        <button type="submit" class="btn btn-danger btn-icon-split" spellcheck="false">
                    <span class="icon text-white-50">
                        <i class="fas fa-times"></i>
                    </span>
            <span class="text">Cancel</span>
        </button>
    </form>
        </div>
</div>

<script>

    function addIngredientField(ingredients) {
        var div = document.createElement("div");
        div.classList.add("input-group");

        var select = document.createElement("select");
        select.setAttribute("name", "ingredient_id[]");
        select.classList.add("form-control", "bg-light", "border", "small");

        var option = document.createElement("option");
        option.text = "Choose an ingredient.";
        option.value = null;
        select.add(option);

        ingredients.forEach(ingredient => {
            var option = document.createElement("option");
            option.text = ingredient["name"];
            option.value = ingredient["id"];
            select.add(option);
        });

        var input = document.createElement("input");
        input.setAttribute("type", "text");
        input.setAttribute("name", "quantity[]");
        input.setAttribute("placeholder", "Quantity");
        input.classList.add("form-control", "bg-light", "border", "small");

        var button = document.createElement("button");
        button.setAttribute("type", "button");
        button.classList.add("btn", "btn-danger", "btn-icon-split");

        button.addEventListener('click', function(event){
            event.preventDefault();
            button.parentNode.remove();
        })

        var span = document.createElement("span");
        span.classList.add("icon", "text-white-50");

        var i = document.createElement("i");
        i.classList.add("fas", "fa-trash");

        span.appendChild(i);
        button.appendChild(span);

        div.appendChild(select);
        div.appendChild(input);
        div.appendChild(button);
        document.getElementById("add-ingredient").appendChild(div);
    }

    const removeButtons = document.querySelectorAll(".remove-line");
    removeButtons.forEach(function(button){
        button.addEventListener('click', function(event){
            event.preventDefault();
            button.parentNode.remove();
        })
    })

</script>

@endsection