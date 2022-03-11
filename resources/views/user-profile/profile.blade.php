<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Profile') }}</title>


    <link rel="dns-prefetch" href="//fonts.gstatic.com">

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">



    @livewireStyles

</head>
<body>


@include('layouts.header')


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

    @auth()
        @include('layouts.subheader')
    @endauth

    <div class="container">

        <div class="toast-custom-pos">

        </div>

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

                            <div class="col-md" style="height: 40%; width: 40%">

                                @if($profile_path == null)
                                    <img id="profile_image" src="{{asset('images/profile-placeholder.png')}}"  class="rounded-circle mt-5" alt="" >
                                @else
                                    <img id="profile_image" src="{{asset('images/profile/' . $profile_path) }}"  class="rounded-circle mt-5" alt="" >
                                @endif


                                @error('photo') <span class="error"><small>{{ $message }}</small></span> @enderror


                            </div>
                        </div>


                        <div class="col-md-6 mx-5 mt-3">

                            <input type="file" class="form-control form-control-sm w-50" name="photo" id="upload" style="display: none">
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



@livewireScripts

<script src="{{ asset('js/app.js') }}"></script>

</body>

@if(session()->has('alert_message'))
    <script>

        toastr.options = {
            "closeButton": false,
            "debug": false,
            "newestOnTop": false,
            "progressBar": false,
            "positionClass": "toast-custom-pos",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut",
        };
        toastr.success("{{ \Illuminate\Support\Facades\Session::get('alert_message') }}")

    </script>
@endif

<script>

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#profile_image').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#upload").change(function(){
        readURL(this);
    });

    window.addEventListener('alert', event => {
        toastr[event.detail.type](event.detail.message,
            event.detail.title ?? ''), toastr.options = {
            "closeButton": false,
            "debug": false,
            "newestOnTop": false,
            "progressBar": false,
            "positionClass": "toast-custom-pos",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut",
        }
    });


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
