@extends('layout.app')

@section('content')

    <!-- Page Header Start -->
    <div class="container-fluid page-header mb-5 position-relative overlay-bottom">
        <div class="d-flex flex-column align-items-center justify-content-center pt-0 pt-lg-5" style="min-height: 400px">
            <h1 class="display-4 mb-3 mt-0 mt-lg-5 text-white text-uppercase">Connection</h1>
            <div class="d-inline-flex mb-lg-5">
                <p class="m-0 text-white"><a class="text-white" href="{{ route('generics.home') }}">Home</a></p>
                <p class="m-0 text-white px-2">/</p>
                <p class="m-0 text-white">Connection</p>
            </div>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Connection Start -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="reservation position-relative overlay-top overlay-bottom">
                <div class="col-lg-6">
                    <div class="text-center p-5" style="background: rgba(51, 33, 29, .8);">
                        <h1 class="text-white mb-4 mt-5">Connection</h1>
                        <form action="{{ route('login') }}" method="POST" class="mb-5">
                            @csrf
                            <div class="form-group">
                                <input type="email" class="form-control bg-transparent border-primary p-4" placeholder="Email"
                                    required="required" />
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control bg-transparent border-primary p-4" placeholder="Password"
                                    required="required" />
                            </div>
                            {{-- <div class="form-group" style='text-align: end'>
                                <p style='font-size: 12px;'><a href="{{ route('users.forgot_password') }}">Forgot password ?</a></p>
                            </div> --}}

                            <div>
                                <button class="btn btn-primary btn-block font-weight-bold py-3" type="submit">Connection</button>
                            </div>

                            <div class="form-group">
                                <p style='padding-top: 20px'>New to Restaurant ? <a href="{{ route('users.create_account') }}"> Create an account</a>.</p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- Connection End -->

@endsection