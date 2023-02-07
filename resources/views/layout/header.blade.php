<!-- Navbar Start -->
<div class="container-fluid p-0 nav-bar">
    <nav class="navbar navbar-expand-lg bg-none navbar-dark py-3">
        <a href="{{ route('generics.index') }}" class="navbar-brand px-lg-4 m-0">
            <h1 class="m-0 display-4 text-white text-poppins">Burger 75</h1>
        </a>
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
            <div class="navbar-nav ml-auto p-4">
                <a href="{{ route('generics.index') }}" class="nav-item nav-link">Home</a>
                <a href="{{ route('generics.about') }}" class="nav-item nav-link">About</a>
                <a href="{{ route('recipe.menu') }}" class="nav-item nav-link">Menu</a>
                {{-- <a href="{{ route('generics.reservation') }}" class="nav-item nav-link">Reservation</a> --}}
                <a href="{{ route('generics.contact') }}" class="nav-item nav-link">Contact</a>
                <a href="{{ route('users.connection') }}" class="nav-item nav-link">My account</a>
            </div>
        </div>
    </nav>
</div>
<!-- Navbar End -->