

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>


    <link rel="stylesheet" href="{{asset('css/app.css')}}">

    <script src="{{asset('js/app.js')}}"></script>




</head>


<body>



<form onsubmit="validateFields()" action="register.php" method="POST" name="registerForm" id="registerForm" class="needs-validation" novalidate>
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
                                            <input type="text" id="regUsername" class="form-control" placeholder="#"
                                                   name="regUsername" required>
                                            <label for="regUsername">Username</label>
                                        </div>

                                    </div>

                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <i class="fas fa-lock fa-lg me-3 mb-2 fa-fw"></i>
                                        <div class="form-floating  flex-fill mb-0">
                                            <input type="text" id="regPassword" class="form-control" placeholder="#"
                                                   name="regPassword" required>
                                            <label for="regUsername">Password</label>
                                        </div>
                                    </div>

                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <i class="fas fa-key fa-lg me-3 mb-2 fa-fw"></i>
                                        <div class="form-floating flex-fill mb-0">
                                            <input type="text" id="regConfirmPass" class="form-control"
                                                   placeholder="#" name="regConfirmPassword" required>
                                            <label for="regConfirmPass">Confirm Password</label>
                                        </div>
                                    </div>


                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <i class="fas fa-user-circle fa-lg me-3 mb-2 fa-fw"></i>
                                        <div class="form-outline flex-fill mb-0">
                                            <select class="form-select" id="accountType" name="accountType" required>
                                                <option value="">Account Type</option>
                                                <option value="customer">Customer</option>
                                                <option value="seller">PC Seller</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <i class="fas fa-envelope fa-lg me-3 mb-2 fa-fw"></i>
                                        <div class="form-floating flex-fill mb-0">
                                            <input type="text" id="email" class="form-control" placeholder="#"
                                                   name="email" required>
                                            <label for="email">Email</label>

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
                                                    <input type="text" id="firstname" class="form-control"
                                                           placeholder="#" name="firstname" required/>
                                                    <label for="firstname">First name</label>
                                                </div>
                                            </div>

                                            <div class="col">
                                                <div class="form-floating ">
                                                    <input type="text" id="lastname" class="form-control"
                                                           placeholder="#" name="lastname" required/>
                                                    <label for="lastname">Last name</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <i class="fas fa-calendar fa-lg me-3 mb-2 fa-fw"></i>
                                        <div class="form-floating flex-fill">
                                            <input class="form-control" id="birthdate" name="date" placeholder="#"
                                                   type="text" autocomplete="off"/>
                                            <label for="birthdate">Date of Birth</label>
                                        </div>
                                    </div>

                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <i class="fas fa-venus-mars fa-lg me-3 mb-2 fa-fw"></i>
                                        <div class="form-outline flex-fill mb-0">
                                            <select class="form-select" id="genderOptions" name="genderOptions" required>
                                                <option value="">Select Gender</option>
                                                <option value="m">Male</option>
                                                <option value="f">Female</option>
                                                <option value="o">Other</option>
                                            </select>
                                        </div>
                                    </div>


                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <i class="fas fa-home fa-lg me-3 mb-2 fa-fw"></i>
                                        <div class="form-floating flex-fill mb-0">
                                            <input type="text" id="address" class="form-control" placeholder="#"
                                                   name="address" required>
                                            <label for="address">Address</label>
                                        </div>

                                    </div>

                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <i class="fas fa-phone-square-alt fa-lg me-3 mb-2 fa-fw"></i>
                                        <div class="form-floating flex-fill mb-0">
                                            <input type="text" id="contact" class="form-control" placeholder="#"
                                                   name="contact"required>
                                            <label for="contact">Contact Number</label>
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
