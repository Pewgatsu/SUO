@extends('layouts.master')

@section('content')


   <div class="container">

       <div class="row mt-5">

           <div class="col-md-3">
               <small class="mt-5 ms-5 mb-3"><h5>Profile Information</h5></small>
               <small><p class="justify-content-center text-secondary">Update your account's profile information</p></small>
           </div>

           <div class="col">

               <div class="card mb-5 mt-3"  style="border-radius: 15px;">
{{--                   form for photo--}}
                   <form action="#">
                       <div class="col-md-6 mx-5">

                           <img src="{{asset('assets/img/01.jpg')}}" class="rounded-circle mt-5" alt="img" style="width: 30%; height: 30%; border-radius: 40%;">
                       </div>

                       <div class="col-md-6 mx-5 mt-3">
                           <button class="btn btn-dark btn-sm">upload photo</button>
                       </div>

                   </form>

                   {{--                   form for Username, email, account type--}}

                   <form action="#">

                       <div class="col-md-6 mx-5 mt-5">
                           <label for="username" class="fs-6"><small>Username</small></label>
                           <input type="text" class="form-control" id="username" name="username">
                       </div>

                       <div class="col-md-6 mx-5 mt-2">
                           <label for="email" class="fs-6"><small>Email</small></label>
                           <input type="text" class="form-control" id="email" name="email">
                       </div>

                       <div class="col-md-6 mx-5 mt-2 mb-5">
                           <label for="accountType" class="fs-6"><small>Account Type</small></label>
                           <input type="text" class="form-control" id="accountType" name="accountType">
                       </div>

                       <div class="text-md-end shadow-sm pe-5 py-3 bg-light"style="border-bottom-left-radius: 15px; border-bottom-right-radius: 15px;">
                           <button type="submit" class="btn btn-dark" style="width: 10%">Save</button>
                       </div>

                   </form>

               </div>

           </div>

       </div>

       <div class="py-8">
           <div class="border-top border-dark"></div>
       </div>

       <div class="row mt-5">

           <div class="col-md-3">
               <small class="mt-5 ms-5 mb-3"><h5>Password</h5></small>
               <small><p class="justify-content-center text-secondary">Update your password</p></small>
           </div>

           <div class="col">

               <div class="card mb-5 mt-3"  style="border-radius: 15px;">

                   <form action="#">


                       <div class="col-md-6 mx-5 mt-5">
                           <label for="password" class="fs-6"><small>Password</small></label>
                           <input type="text" class="form-control" id="password" name="password">
                       </div>

                       <div class="col-md-6 mx-5 mt-2">
                           <label for="newPassword" class="fs-6"><small>New Password</small></label>
                           <input type="text" class="form-control" id="newPassword" name="newPassword">
                       </div>

                       <div class="col-md-6 mx-5 mt-2 mb-5">
                           <label for="confirmPassword" class="fs-6"><small>Confirm Password</small></label>
                           <input type="text" class="form-control" id="confirmPassword" name="confirmPassword">
                       </div>

                       <div class="text-md-end shadow-sm pe-5 py-3 bg-light"style="border-bottom-left-radius: 15px; border-bottom-right-radius: 15px;">
                           <button type="submit" class="btn btn-dark" style="width: 10%">Save</button>
                       </div>

                   </form>

               </div>

           </div>

       </div>

       <div class="py-8">
           <div class="border-top border-dark"></div>
       </div>

       <div class="row mt-5">

           <div class="col-md-3">
               <small class="mt-5 ms-5 mb-3"><h5>Personal Information</h5></small>
               <small><p class="justify-content-center text-secondary">Update your personal information</p></small>
           </div>

           <div class="col">

               <div class="card mb-5 mt-3"  style="border-radius: 15px;">

                   <form action="#">

                       <div class="row mt-5">

                           <div class="col-md-3 ms-5">
                               <label for="firstname" class="fs-6"><small>First Name</small></label>
                               <input type="text" class="form-control" id="firstname" name="firstname">
                           </div>

                           <div class="col-md-3" style="margin-left: 12px;">
                               <label for="lastname" class="fs-6"><small>Last Name</small></label>
                               <input type="text" class="form-control" id="lastname" name="lastname">
                           </div>
                       </div>

                       <div class="col-md-6 mx-5 mt-2">
                           <label for="birthdate" class="fs-6"><small>Date of Birth</small></label>
{{--                           <input type="text" class="form-control" id="birthdate" name="birthdate">--}}
                           <input class="form-control" id="birthdate" name="date" placeholder=""
                                  type="text" autocomplete="off" value="{{old('date')}}"/>
                       </div>

                       <div class="col-md-6 mx-5 mt-2">
                           <label for="gender" class="fs-6"><small>Gender</small></label>
                           <select class="form-select @error('gender') is-invalid @enderror" id="gender" name="gender">
                               <option value=""></option>
                               <option value="male" @if (old('gender') == "male") selected @endif>Male</option>
                               <option value="female" @if (old('gender') == "female") selected @endif>Female</option>
                               <option value="other" @if (old('gender') == "other") selected @endif>Other</option>
                           </select>
                       </div>

                       <div class="col-md-6 mx-5 mt-2">
                           <label for="address" class="fs-6"><small>Address</small></label>
                           <input type="text" class="form-control" id="address" name="address">
                       </div>

                       <div class="col-md-6 mx-5 mt-2 mb-5">
                           <label for="contact" class="fs-6"><small>Contact</small></label>
                           <input type="text" class="form-control" id="contact" name="contact">
                       </div>

                       <div class="text-md-end shadow-sm pe-5 py-3 bg-light"style="border-bottom-left-radius: 15px; border-bottom-right-radius: 15px;">
                           <button type="submit" class="btn btn-dark" style="width: 10%">Save</button>
                       </div>

                   </form>

               </div>

           </div>

       </div>


   </div>

{{--   <div class="py-8">--}}
{{--       <div class="border-top border-dark"></div>--}}
{{--   </div>--}}

{{--   <div class="card mb-5 mt-5">--}}
{{--       <small class="mt-5 ms-5 mb-3"><h5>Profile Information</h5></small>--}}
{{--   </div>--}}

{{--   <div class="py-8">--}}
{{--       <div class="border-top border-dark"></div>--}}
{{--   </div>--}}

{{--   <div class="card mt-5">--}}
{{--       <small class="mt-5 ms-5 mb-3"><h5>Profile Information</h5></small>--}}
{{--   </div>--}}

{{--   <div class="col-sm-3">--}}
{{--       <div class="card align-items-center">--}}
{{--           <img src="{{asset('assets/img/01.jpg')}}" class="card-img-top rounded-circle mt-5" alt="img" style="width: 50%; height: 50%; border-radius: 50%;">--}}
{{--           <div class="card-body">--}}
{{--               <h5 class="card-title">User Profile</h5>--}}

{{--               <p class="card-text">Test test test test</p>--}}

{{--               <button class="btn btn-primary">Edit Photo</button>--}}
{{--           </div>--}}
{{--       </div>--}}
{{--   </div>--}}


{{--                   <div class="row">--}}

{{--                       <div class="col-md-4 ms-4">--}}
{{--                           <label for="firstnameField">First Name</label>--}}
{{--                           <input type="text" class="form-control form-control-sm" id="firstnameField" name="firstname">--}}
{{--                       </div>--}}
{{--                       <div class="col-md-4 ms-4">--}}
{{--                           <label for="lastnameField">Last Name</label>--}}
{{--                           <input type="text" class="form-control form-control-sm" id="lastnameField" name="lastname">--}}
{{--                       </div>--}}
{{--                   </div>--}}

{{--                   <div class="row">--}}

{{--                       <div class="col-md-4 ms-4">--}}
{{--                           <label for="firstnameField">First Name</label>--}}
{{--                           <input type="text" class="form-control form-control-sm" id="firstnameField" name="firstname">--}}
{{--                       </div>--}}
{{--                       <div class="col-md-4 ms-4">--}}
{{--                           <label for="lastnameField">Last Name</label>--}}
{{--                           <input type="text" class="form-control form-control-sm" id="lastnameField" name="lastname">--}}
{{--                       </div>--}}
{{--                   </div>--}}

{{--                   <div class="flex mx-5 col-md-6">--}}
{{--                       <label for="firstnameField" class="">First Name</label>--}}
{{--                       <input type="text" class="form-control form-control-md rounded">--}}
{{--                   </div>--}}

{{--                   <div class="flex mx-5 col-md-6 mt-1">--}}
{{--                       <label for="firstnameField" class="">Last Name</label>--}}
{{--                       <input type="text" class="form-control form-control-md rounded">--}}
{{--                   </div>--}}

{{--                   <div class="flex mx-5 col-md-6 mt-1">--}}
{{--                       <label for="firstnameField" class="">Email</label>--}}
{{--                       <input type="text" class="form-control form-control-md">--}}
{{--                   </div>--}}

@endsection

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
