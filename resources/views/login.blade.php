@extends('layouts.app');

@section('content')
    <div class="container col-xl-10 col-xxl-8 px-4 py-5">
        <div class="row align-items-center g-lg-5 py-5">

            <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                </symbol>
            </svg>

            <div class="col-md-10 mx-auto col-lg-5">

                @if($message = Session::get('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{$message}}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif


                <form  action="{{route('login')}}" class="needs-validation p-4 p-md-5 border rounded-3 bg-light"
                      method="POST" >
                    @csrf

                    <div class="form-floating flex-fill mb-4 ">
                        <input type="text" name="username" class="form-control @error('username') is-invalid @enderror" value="{{old('username')}}" placeholder="#" autocomplete="username" autofocus>
                        <label for="usernameField">Username</label>
                        @error('username')
                        <div class="invalid-tooltip position-relative">Field must not be empty!</div>
                        @enderror
                    </div>

                    <div class="form-floating flex-fill mb-4 ">
                        <input type="text" id="passwordField" name="password" class="form-control @error('password') is-invalid @enderror" value="{{old('password')}}" placeholder="#">
                        <label for="usernameField">Password</label>
                        @error('password')
                        <div class="invalid-tooltip position-relative">Field must not be empty!</div>
                        @enderror
                    </div>

                    <div class="row mb-4">
                        <div class="col d-flex justify-content-center">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="remember">
                            </div>
                            <label class="form-check-label" for="remember">Remember me</label>
                        </div>

                        <div class="col">
                            <a href="#">Forgot Password?</a>
                        </div>
                    </div>

                    <button class="w-100 btn btn-primary" type="submit" id="login" name="login">Login</button>

                    <hr class="my-4">


                    <div class="text-center">
                        <p>Not Yet Registered?<a href="{{route('register')}}"> Create an Account</a></p>
                    </div>

                </form>
            </div>
        </div>
    </div>

@endsection