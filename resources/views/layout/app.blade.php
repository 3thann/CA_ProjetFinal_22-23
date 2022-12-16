<!DOCTYPE html>
<html lang="en">

<head>
    @include('layout.head')
</head>

<body>
    <!-- Navbar Start -->
    @include('layout.header')
    <!-- Navbar End -->

    <!-- Content Start -->
    @yield('content')
    <!-- Content End -->

    <!-- Footer Start -->
    @include('layout.footer')
    <!-- Footer End -->

    <!-- JavaScript Libraries -->
    @include('layout.import_js')
</body>

</html>