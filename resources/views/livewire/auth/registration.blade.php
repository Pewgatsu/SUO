<div class="bg-light">
    <form wire:submit.prevent="register">
        @csrf

        <div class="container vh-250 ">
            <div class="container h-250">
                <div class="row d-flex justify-content-center align-items-center h-250">
                    <div class="col-lg-8 col-xl-10 py-5">
                        <div class="card text-black">
                            <div class="card-body p-md-5">
                                <div class="row justify-content-center">

                                    <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">
                                        <p class="text-center h3 fw-bold mb-5 mx-1 mt-3">Account Information</p>

                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-user fa-lg me-3 mb-3 mt-3 fa-fw"></i>
                                                <div class="flex-fill mb-0">

                                                    <input placeholder="Username" type="text" class="form-control @error('username') is-invalid @enderror"  id="username" name="username" wire:model="username">
                                                    <div class="valid-tooltip position-relative">Looks Good!</div>
                                                        @error('username')
                                                    <div class="invalid-tooltip position-relative">{{$message}}</div>
                                                        @enderror
                                                </div>
                                        </div>

                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-lock fa-lg me-3 mb-2 fa-fw"></i>
                                            <div class="flex-fill mb-0">
                                                <input placeholder="Password" type="password" id="password" class="form-control @error('password') is-invalid @enderror" name="password" wire:model="password">
                                                <div class="valid-tooltip position-relative">Looks Good!</div>
                                                @error('password')
                                                <div class="invalid-tooltip position-relative">{{$message}}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-key fa-lg me-3 mb-2 fa-fw"></i>
                                            <div class="flex-fill mb-0">
                                                <input placeholder="Confirm Password" type="password" id="confirmPass" class="form-control @error('confirmPass') is-invalid @enderror" name="confirmPass" wire:model="confirmPass">
                                                <div class="valid-tooltip position-relative">Looks Good!</div>
                                                @error('confirmPass')
                                                <div class="invalid-tooltip position-relative">{{$message}}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-user-circle fa-lg me-3 mb-2 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <select class="form-select @error('accountType') is-invalid @enderror" id="accountType" name="accountType" wire:model="accountType">
                                                    <option value="">Account Type</option>
                                                    <option value="Customer" @if (old('accountType') == "Customer") selected @endif>Customer</option>
                                                    <option value="Seller" @if (old('accountType') == "Seller") selected @endif>PC Seller</option>
                                                </select>
                                                @error('accountType')
                                                <div class="invalid-tooltip position-relative">{{$message}}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-envelope fa-lg me-3 mb-2 fa-fw"></i>
                                            <div class="flex-fill mb-0">
                                                <input placeholder="Email" type="text" id="email" class="form-control @error('email') is-invalid @enderror"
                                                       name="email" wire:model="email">

                                                @error('email')
                                                <div class="invalid-tooltip position-relative">{{$message}}</div>
                                                @enderror
                                            </div>
                                        </div>

                                    </div>

                                </div>


                            </div>
                        </div>
                    </div>

                    <div class="col-lg-8 col-xl-10">
                        <div class="card text-black mb-5">
                            <div class="card-body p-md-5">
                                <div class="row justify-content-center">
                                    <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">
                                        <p class="text-center h3 fw-bold mb-5 mx-1 mt-3">Personal Information</p>


                                        <div class="d-flex align-items-center mb-4">
                                            <i class="fas fa-user fa-lg me-3 mb-2 fa-fw"></i>
                                            <div class="row">
                                                <div class="col">
                                                    <div class="" style="margin-left: 5px;">
                                                        <input placeholder="First Name" type="text" id="firstname" class="form-control @error('firstname') is-invalid @enderror" name="firstname" wire:model="firstname"/>
                                                        @error('firstname')
                                                        <div class="invalid-tooltip position-relative">{{$message}}</div>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col">
                                                    <div class="">
                                                        <input placeholder="Last Name" type="text" id="lastname" class="form-control @error('lastname') is-invalid  @enderror" name="lastname" wire:model="lastname"/>
                                                        @error('lastname')
                                                        <div class="invalid-tooltip position-relative">{{$message}}</div>
                                                        @enderror
                                                    </div>

                                                </div>
                                            </div>
                                        </div>


                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-calendar fa-lg me-3 mb-2 fa-fw"></i>
                                            <div class="flex-fill">
                                                <input placeholder="Date of birth (Optional)" class="form-control @error('date') is-invalid @enderror" id="date" name="date"
                                                       type="text" autocomplete="off" wire:model="date" onchange="this.dispatchEvent(new InputEvent('input'))" value="null"/>
                                                @error('date')
                                                <div class="invalid-tooltip position-relative">{{$message}}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-venus-mars fa-lg me-3 mb-2 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <select class="form-select @error('gender') is-invalid @enderror" id="gender" name="gender" wire:model="gender">
                                                    <option value="">Select Gender (Optional)</option>
                                                    <option value="male" @if (old('gender') == "male") selected @endif>Male</option>
                                                    <option value="female" @if (old('gender') == "female") selected @endif>Female</option>
                                                    <option value="other" @if (old('gender') == "other") selected @endif>Other</option>
                                                </select>
                                                @error('gender')
                                                <div class="invalid-tooltip position-relative">{{$message}}</div>
                                                @enderror
                                            </div>
                                        </div>


                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-home fa-lg me-3 mb-2 fa-fw"></i>
                                            <div class="flex-fill mb-0">
                                                <input placeholder="Address (Optional)" type="text" id="address" class="form-control @error('address') is-invalid @enderror"
                                                       name="address" wire:model="address">
                                                @error('address')
                                                <div class="invalid-tooltip position-relative">{{$message}}</div>
                                                @enderror
                                            </div>

                                        </div>

                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-phone-square-alt fa-lg me-3 mb-2 fa-fw"></i>
                                            <div class="flex-fill mb-0">
                                                <input placeholder="Contact (Optional)" type="text" id="contact" class="form-control @error('contact') is-invalid @enderror"
                                                       name="contact" wire:model="contact">
                                                @error('contact')
                                                <div class="invalid-tooltip position-relative">{{$message}}</div>
                                                @enderror
                                            </div>

                                        </div>

                                        <div class="d-grid gap  pt-3">
                                            <button type="submit" name="register" class="btn btn-primary">Register</button>
                                        </div>

                                        <p class="text-center text-muted mt-5 mb-0">Already have an account? <a
                                                href="{{route('login')}}"><u>Login here</u></a></p>

                                    </div>


                                </div>

                            </div>

                        </div>

                    </div>


                </div>

            </div>
        </div>

    </form>


</div>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>

<script>
    $(document).ready(function(){
        var date_input=$('input[id="date"]'); //our date input has the name "date"
        var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
        date_input.datepicker({
            format: 'mm/dd/yyyy',
            container: container,
            todayHighlight: true,
            autoclose: true,
        })
    })
</script>
