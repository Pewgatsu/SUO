

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>


    <link rel="stylesheet" href="{{asset('css/app.css')}}">

    <script src="{{asset('js/app.js')}}"></script>

</head>


<body>

<form action="{{route('register')}}" method="POST">
    @csrf

    <div class="container vh-250">
        <div class="container h-250">
            <div class="row d-flex justify-content-center align-items-center h-250">
                <div class="col-lg-12 col-xl-12 py-5">
                    <div class="card text-black">
                        <div class="card-body p-md-5">
                            <div class="row justify-content-center">

                                <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">
                                    <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-5">Account Information</p>

                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <i class="fas fa-user fa-lg me-3 mb-3 fa-fw"></i>
                                        <div class="form-floating flex-fill mb-0">
                                            <input type="text" id="username" class="form-control @error('username') is-invalid @enderror" value="{{old('username')}}" placeholder="#" name="username">
                                            <label for="username">Username</label>
                                            @error('username')
                                            <div class="invalid-tooltip position-relative">{{$errors->first('username')}}</div>
                                            @enderror
                                        </div>



                                    </div>

                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <i class="fas fa-lock fa-lg me-3 mb-2 fa-fw"></i>
                                        <div class="form-floating  flex-fill mb-0">
                                            <input type="text" id="password" class="form-control @error('password') is-invalid @enderror" value="{{old('password')}}" placeholder="#"
                                                   name="password">
                                            <label for="password">Password</label>
                                            @error('password')
                                            <div class="invalid-tooltip position-relative">{{$errors->first('password')}}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <i class="fas fa-key fa-lg me-3 mb-2 fa-fw"></i>
                                        <div class="form-floating flex-fill mb-0">
                                            <input type="text" id="confirmPassword" class="form-control @error('password_confirmation') is-invalid @enderror" value="{{old('password_confirmation')}}"
                                                   placeholder="#" name="password_confirmation">
                                            <label for="confirmPassword">Confirm Password</label>
                                            @error('password_confirmation')
                                            <div class="invalid-tooltip position-relative">{{$errors->first('password_confirmation')}}</div>
                                            @enderror
                                        </div>
                                    </div>


                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <i class="fas fa-user-circle fa-lg me-3 mb-2 fa-fw"></i>
                                        <div class="form-outline flex-fill mb-0">
                                            <select class="form-select @error('accountType') is-invalid @enderror" id="accountType" name="accountType">
                                                <option value="">Account Type</option>
                                                <option value="customer" @if (old('accountType') == "customer") selected @endif>Customer</option>
                                                <option value="seller" @if (old('accountType') == "seller") selected @endif>PC Seller</option>
                                            </select>
                                            @error('accountType')
                                            <div class="invalid-tooltip position-relative">{{$errors->first('accountType')}}</div>
                                            @enderror

                                        </div>

                                    </div>

                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <i class="fas fa-envelope fa-lg me-3 mb-2 fa-fw"></i>
                                        <div class="form-floating flex-fill mb-0">
                                            <input type="text" id="email" class="form-control @error('email') is-invalid @enderror" placeholder="#"
                                                   name="email">
                                            <label for="email">Email</label>
                                            @error('email')
                                            <div class="invalid-tooltip position-relative">{{$errors->first('email')}}</div>
                                            @enderror
                                        </div>
                                    </div>

                                </div>

                                <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">

                                    <img src="/img/registration.jpg" class="img-fluid" alt="Sample image">

                                </div>
                            </div>


                        </div>
                    </div>
                </div>

                <div class="col-lg-12 col-xl-12">
                    <div class="card text-black mb-5">
                        <div class="card-body p-md-5">
                            <div class="row justify-content-center">
                                <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">
                                    <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Personal Information</p>


                                    <div class="d-flex align-items-center mb-4">
                                        <i class="fas fa-user fa-lg me-3 mb-2 fa-fw"></i>
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-floating" style="padding-left:  2px;">
                                                    <input type="text" id="firstname" class="form-control @error('firstname') is-invalid @enderror"
                                                           placeholder="#" name="firstname"/>
                                                    <label for="firstname">First name</label>
                                                    @error('firstname')
                                                    <div class="invalid-tooltip position-relative">{{$errors->first('firstname')}}</div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col">
                                                <div class="form-floating ">
                                                    <input type="text" id="lastname" class="form-control @error('lastname') is-invalid  @enderror"
                                                           placeholder="#" name="lastname"/>
                                                    <label for="lastname">Last name</label>
                                                    @error('lastname')
                                                    <div class="invalid-tooltip position-relative">{{$errors->first('lastname')}}</div>
                                                    @enderror
                                                </div>

                                            </div>
                                        </div>
                                    </div>


                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <i class="fas fa-calendar fa-lg me-3 mb-2 fa-fw"></i>
                                        <div class="form-floating flex-fill">
                                            <input class="form-control @error('date') is-invalid @enderror" id="birthdate" name="date" placeholder="#"
                                                   type="text" autocomplete="off"/>
                                            <label for="birthdate">Date of Birth</label>
                                            @error('date')
                                            <div class="invalid-tooltip position-relative">{{$errors->first('date')}}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <i class="fas fa-venus-mars fa-lg me-3 mb-2 fa-fw"></i>
                                        <div class="form-outline flex-fill mb-0">
                                            <select class="form-select @error('gender') is-invalid @enderror" id="gender" name="gender">
                                                <option value="">Select Gender</option>
                                                <option value="male">Male</option>
                                                <option value="female">Female</option>
                                                <option value="other">Other</option>
                                            </select>
                                            @error('gender')
                                            <div class="invalid-tooltip position-relative">{{$errors->first('gender')}}</div>
                                            @enderror
                                        </div>
                                    </div>


                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <i class="fas fa-home fa-lg me-3 mb-2 fa-fw"></i>
                                        <div class="form-floating flex-fill mb-0">
                                            <input type="text" id="address" class="form-control @error('address') is-invalid @enderror" placeholder="#"
                                                   name="address">
                                            <label for="address">Address</label>
                                            @error('address')
                                            <div class="invalid-tooltip position-relative">{{$errors->first('address')}}</div>
                                            @enderror
                                        </div>

                                    </div>

                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <i class="fas fa-phone-square-alt fa-lg me-3 mb-2 fa-fw"></i>
                                        <div class="form-floating flex-fill mb-0">
                                            <input type="text" id="contact" class="form-control @error('contact') is-invalid @enderror" placeholder="#"
                                                   name="contact">
                                            <label for="contact">Contact Number</label>
                                            @error('contact')
                                            <div class="invalid-tooltip position-relative">{{$errors->first('contact')}}</div>
                                            @enderror
                                        </div>

                                    </div>

                                    <div class="d-grid gap  pt-3">
                                        <button type="submit" name="register" class="btn btn-primary" >Register</button>
                                    </div>

                                    <p class="text-center text-muted mt-5 mb-0">Already have an account? <a
                                            href="login"><u>Login here</u></a></p>


                                </div>
                                <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">

                                    <img src="/img/registration.jpg" class="img-fluid" alt="Sample image">

                                </div>
                            </div>

                        </div>

                    </div>

                </div>


            </div>

        </div>
    </div>

</form>


</body>


<!-- Include jQuery -->
<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>

<!-- Include Date Range Picker -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>

<script>
    $(document).ready(function(){
        var date_input=$('input[name="date"]'); //our date input has the name "date"
        var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
        date_input.datepicker({
            format: 'mm/dd/yyyy',
            container: container,
            todayHighlight: true,
            autoclose: true,
        })
    })
</script>



</html>
