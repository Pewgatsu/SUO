<div class="container h-100">
        <div class="row d-flex justify-content-center align-items-center h-100 py-5">
            <div class="col-lg-12 col-xl-11">
                <div class="card text-black" style="border-radius: 25px;">
                    <div class="card-body p-md-5">
                        <div class="row justify-content-center">
                            <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                                <p class="text-center h4 fw-bold mb-5 mx-1 mx-md-4 mt-4">Welcome back User!</p>

                                <form wire:submit.prevent="login">
                                    @csrf

                                    <div class="form-floating mb-4">
                                        <input type="text" class="form-control @error('username') is-invalid @enderror"  id="username" name="username" wire:model.defer="username">
                                        <label for="username">Username</label>
                                        @error('username')
                                        <span class="error" style="color: red"><small>{{$message}}</small></span>
                                        @enderror
                                    </div>

                                    <div class="form-floating flex-fill mb-4 ">
                                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" wire:model.defer="password">
                                        <label for="password">Password</label>
                                        @error('password')
                                        <span class="error" style="color: red"><small>{{$message}}</small></span>
                                        @enderror
                                    </div>


                                    <button class="w-100 btn custom-btn text-white" type="submit" id="login" name="login">Login</button>
                                </form>

                                <hr class="my-4">

                                <div class="text-center">
                                    <p class="text-black">Not Yet Registered? <a href="{{route('register')}}" class="text-decoration-none">Create an Account</a></p>
                                </div>
                            </div>
                            <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">

                                <img src="{{asset('images/auth/login_page.jpeg')}}" class="img-fluid" alt="">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>




