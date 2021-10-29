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
{{--@livewire('user-profile.update-profile-form')--}}

<div>
    <style>
        #profile_image{
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
                <small class="mt-5 ms-5 mb-3"><h5>Profile Information</h5></small>
                <small><p class="justify-content-center text-secondary">Update your account's profile information</p></small>
            </div>

            <div class="col">

                <div class="card mb-5 mt-3"  style="border-radius: 15px;">

                    <form  method="POST" enctype="multipart/form-data" action="{{route('user.profile.update')}}">
                        @csrf
                        <div class="col-md-6 mx-5">


                            @if(session()->has('alert_message'))
                                <div class="alert alert-success mt-3">
                                    {{session('alert_message')}}
                                </div>
                            @endif

                            <div class="col-md" style="height: 40%; width: 40%">
                                {{--                                @if($photo)--}}
                                {{--                                    <img id="profile_image" src="{{$photo->temporaryUrl()}}" class="rounded-circle mt-5" alt="img">--}}
                                {{--                                @else--}}
                                <img id="profile_image" src="{{$profile_path}}"  class="rounded-circle mt-5" alt="img" >
                                @error('photo') <span class="error"><small>{{ $message }}</small></span> @enderror
                                {{--                                @endif--}}

                            </div>
                        </div>


                        <div class="col-md-6 mx-5 mt-3">

                            <input type="file" id="upload" class="form-control form-control-sm w-50" name="photo" id="photo" style="display: none">
                            <label for="upload" class="btn btn-dark btn-sm mx-5">upload photo</label>

                        </div>

                        <div id="account_information_section">

                            <div class="col-md-6 mx-5 mt-5" id="username_field">
                                <label for="username" class="fs-6"><small>Username</small></label>
                                <input type="text" class="form-control" id="username" name="username" value="{{$username}}">
                                @error('username') <span class="error"><small>{{ $message }}</small></span> @enderror
                            </div>

                            <div class="col-md-6 mx-5 mt-2 mb-5">
                                <label for="email" class="fs-6"><small>Email</small></label>
                                <input type="text" class="form-control" id="email" name="email" value="{{$email}}">
                                @error('email') <span class="error"><small>{{ $message }}</small></span> @enderror
                            </div>

                        </div>

                        <div class="text-md-end shadow-sm pe-5 py-3 bg-light"style="border-bottom-left-radius: 15px; border-bottom-right-radius: 15px;">

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


@livewire('user-profile.update-personal-info-form')
@livewire('user-profile.update-password-form')
@livewire('user-profile.delete-account-form')

@include('layouts.footer')



@livewireScripts

</body>

<script>
    window.addEventListener('show-delete-modal',event => {
        $('#confirmationModal').modal('show');
    })

    window.addEventListener('hide-delete-modal',event => {
        $('#confirmationModal').modal('hide');
    })

</script>


@push('datepicker')

    <!-- Include Date Range Picker -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>

    <script>
        $(document).ready(function(){
            var date_input=$('input[id="birthdate"]'); //our date input has the name "date"
            var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
            date_input.datepicker({
                format: 'mm/dd/yyyy',
                container: container,
                todayHighlight: true,
                autoclose: true,
            })
        })
    </script>
@endpush
</html>
