<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>


    <script src="{{ asset('js/app.js') }}"></script>

    <link rel="dns-prefetch" href="//fonts.gstatic.com">

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    @livewireStyles

</head>
<body>


@include('layouts.header')

<div>
    <style>
        #profile_id{
            width: 200px;
            height: 200px;
            object-fit: cover;
        }
        .error{
            color: red;
        }
    </style>

    <div class="container" id="alert">

    </div>
    <div class="container">

        <div class="row mt-5">

            <div class="col-md-3">
                <small class="mt-5 ms-5 mb-3"><h5>Validate Account</h5></small>
                <small><p class="justify-content-center text-secondary">Submit a valid id to be a verified seller</p></small>
            </div>

            <div class="col">

                <div class="card mb-5 mt-3"  style="border-radius: 15px;">

                    <form  method="POST" enctype="multipart/form-data" action="{{route('seller.verify.account')}}">
                        @csrf
                        <div class="col-md-6 mx-5">


                            @if(session()->has('alert_message'))
                                <div class="alert alert-success mt-3">
                                    {{session('alert_message')}}
                                </div>
                            @endif

                            <div class="col-md" style="height: 40%; width: 40%">

                                @if($valid_id_path === " ")
                                <img id="profile_id" src="{{asset('images/profile-placeholder.png')}}"  class="rounded-circle mt-5" alt="" >
                                @else
                                <img id="profile_id" src="{{$valid_id_path}}"  class="rounded-circle mt-5" alt="" >
                                @endif

                                @error('photo') <span class="error"><small>{{ $message }}</small></span> @enderror


                            </div>
                        </div>


                        <div class="col-md-6 mx-5 mt-3">

                            <input type="file" id="upload" class="form-control form-control-sm w-50" name="valid_id" style="display: none">
                            <label for="upload" class="btn btn-dark btn-sm mx-5">upload id</label>

                        </div>


                        <div class="text-md-end shadow-sm pe-5 py-3 mt-3 bg-light"style="border-bottom-left-radius: 15px; border-bottom-right-radius: 15px;">

                            <div class="">
                                <button type="submit" class="btn btn-dark" style="width: 10%" id="save"><small>Save</small></button>
                            </div>

                        </div>


                    </form>

                </div>

            </div>

        </div>

        <div class="py-8">
            <div class="border-top border-dark"></div>
        </div>

    </div>



</div>


</body>


<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#profile_id').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#upload").change(function(){
        readURL(this);
    });
</script>



</html>
