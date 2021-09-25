@extends('layouts.master')


@section('content')

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
                   @foreach($account as $acc)
                   @endforeach
                   <form action="{{route('updateAccount',[auth()->user()->id])}}" method="POST" id="profile_form">
                    @csrf


                       <div id="account_information_section">

                           <div class="col-md-6 mx-5 mt-5" id="username_field">
                               <label for="username" class="fs-6"><small>Username</small></label>
                               <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" name="username" value="{{$acc->username}}">
                               @error('username')
                               <div class="invalid-feedback position-relative">{{$errors->first('username')}}</div>
                               @enderror
                           </div>

                           <div class="col-md-6 mx-5 mt-2 mb-5">
                               <label for="email" class="fs-6"><small>Email</small></label>
                               <input type="text" class="form-control" id="email" name="email" value="{{$acc->email}}">
                               <div class="invalid-tooltip position-relative">{{$errors->first('email')}}</div>
                           </div>

                       </div>

                       <div class="text-md-end shadow-sm pe-5 py-3 bg-light"style="border-bottom-left-radius: 15px; border-bottom-right-radius: 15px;">
{{--                           <button type="button" class="btn btn-dark me-2" style="width: 10%" name="edit" id="editAccountInfo">Edit</button>--}}
                           <button type="submit" class="btn btn-dark" style="width: 10%" id="save">Save</button>
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

                   <form action="{{route('updatePassword',[auth()->user()->id])}}" id="password_form" method="POST">
                       @csrf

                       <div id="password_section">

                           <div class="col-md-6 mx-5 mt-5">
                               <label for="password" class="fs-6"><small>Password</small></label>
                               <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password">

                           </div>

                           <div class="col-md-6 mx-5 mt-2 ">
                               <label for="confirmPassword" class="fs-6"><small>Confirm Password</small></label>
                               <input type="password" class="form-control" id="confirmPassword" name="confirmPassword">
                           </div>

                           <div class="col-md-6 mx-5 mt-2 mb-5">
                               <label for="newPassword" class="fs-6"><small>New Password</small></label>
                               <input type="password" class="form-control" id="newPassword" name="newPassword">
                           </div>



                       </div>

                       <div class="text-md-end shadow-sm pe-5 py-3 bg-light"style="border-bottom-left-radius: 15px; border-bottom-right-radius: 15px;">
{{--                           <button type="button" class="btn btn-dark me-2" style="width: 10%" name="editPasswordInfo" id="editPasswordInfo">Edit</button>--}}
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


                   <form action="" method="POST">
                    @csrf
                       <div id="personal_information_section">

                           <div class="row row-cols-md-6 col-md-12 mt-5">

                               <div class="col-md-3 ms-5">
                                   <label for="firstname" class="fs-6"><small>First Name</small></label>
                                   <input type="text" class="form-control" id="firstname" name="firstname" value="{{$acc->firstname}}">
                               </div>

                               <div class="col-md-3 ms-4">
                                   <label for="lastname" class="fs-6"><small>Last Name</small></label>
                                   <input type="text" class="form-control" id="lastname" name="lastname" value="{{$acc->lastname}}">
                               </div>
                           </div>

                           <div class="col-md-6 mx-5 mt-2">
                               <label for="birthdate" class="fs-6"><small>Date of Birth</small></label>
                               <input class="form-control" id="birthdate" name="birthdate" placeholder=""
                                      type="text" autocomplete="off" value="{{$acc->birthdate}}"/>
                           </div>

                           <div class="col-md-6 mx-5 mt-2">
                               <label for="gender" class="fs-6"><small>Gender</small></label>
                               <select class="form-select @error('gender') is-invalid @enderror" id="gender" name="gender">
                                   <option value=""></option>
                                   <option value="male" @if ( $acc->gender == "male") selected @endif>Male</option>
                                   <option value="female" @if ($acc->gender == "female") selected @endif>Female</option>
                                   <option value="other" @if ($acc->gender == "other") selected @endif>Other</option>
                               </select>
                           </div>

                           <div class="col-md-6 mx-5 mt-2">
                               <label for="address" class="fs-6"><small>Address</small></label>
                               <input type="text" class="form-control" id="address" name="address" value="{{$acc->address}}">
                           </div>

                           <div class="col-md-6 mx-5 mt-2 mb-5">
                               <label for="contact" class="fs-6"><small>Contact</small></label>
                               <input type="text" class="form-control" id="contact" name="contact" value="{{$acc->contact}}">
                           </div>

                       </div>

                       <div class="text-md-end shadow-sm pe-5 py-3 bg-light"style="border-bottom-left-radius: 15px; border-bottom-right-radius: 15px;">
{{--                           <button type="button" class="btn btn-dark me-2" style="width: 10%" name="editPersonalInfo" id="editPersonalInfo">Edit</button>--}}
                           <button type="submit" class="btn btn-dark" style="width: 10%" id="save">Save</button>
                       </div>

                   </form>

               </div>

           </div>

       </div>


   </div>

{{--   <script>--}}
{{--      $('#profile_form').submit(function(e){--}}
{{--          e.preventDefault();--}}
{{--          var data = $('#profile_form').serialize();--}}
{{--          $.ajax({--}}
{{--              method:'POST',--}}
{{--              url:'{{route('updateAccount',auth()->user()->id)}}',--}}
{{--              data: data,--}}
{{--              success: function (result) {--}}
{{--                  $('#alert').append('<div class="alert alert-success alert-dismissible fade show mt-5" role="alert"> Update Success!'+--}}
{{--                      ' <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>'--}}
{{--                  )--}}
{{--              },--}}
{{--              error: function(){--}}
{{--                  $('#username').addClass('is-invalid');--}}
{{--                  $('#email').addClass('is-invalid');--}}
{{--              }--}}
{{--          });--}}
{{--      });--}}
{{--   </script>--}}





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
