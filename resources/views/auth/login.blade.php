@extends('layouts.master')

@push('scripts')
    <script src="{{asset('js/validate_login.js')}}" defer></script>
@endpush



@section('content')


    <div class="container col-xl-10 col-xxl-8 px-4 py-5">
        <div class="row align-items-center g-lg-5 py-5">

            <div class="col-md-10 mx-auto col-lg-5">

                @if($message = Session::get('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{$message}}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif


                <form id="loginForm" action="{{route('login')}}" class="p-4 p-md-5 border rounded-3 bg-light"
                      method="POST" >
                    @csrf

                    <div class="form-floating flex-fill mb-4 ">
                        <input type="text" id="usernameField" name="username" class="form-control @error('username') is-invalid @enderror" placeholder="#" value="{{old('username')}}" autofocus>
                        <label for="usernameField">Username</label>
                        <div class="valid-tooltip position-relative">Looks Good!</div>
                        @error('username')
{{--                        <script>--}}
{{--                            let username = document.getElementById('usernameField');--}}
{{--                            username.addEventListener("blur", validateUsername);--}}
{{--                        </script>--}}
                        <div class="invalid-tooltip position-relative">Field must not be empty!</div>
                        @enderror
                    </div>

                    <div class="form-floating flex-fill mb-4 ">
                        <input type="text" id="passwordField" name="password" class="form-control @error('password') is-invalid @enderror"placeholder="#" autofocus value="{{old('password')}}">
                        <label for="usernameField">Password</label>
                        <div class="valid-tooltip position-relative">Looks Good!</div>
                        @error('password')
{{--                        <script>--}}
{{--                            let password = document.getElementById('passwordField');--}}
{{--                            password.addEventListener("blur", validatePassword);--}}
{{--                        </script>--}}
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
