
<div class="container col-xl-10 col-xxl-8 px-4 py-5">
        <div class="row align-items-center g-lg-5 py-5">

            <div class="col-md-10 mx-auto col-lg-5">

                @if($message = Session::get('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{$message}}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif


                <form wire:submit.prevent="login" class="p-4 p-md-5 border rounded-3 bg-light">
                    @csrf

                    <div class="form-floating mb-4 ">
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


                    <button class="w-100 btn btn-secondary text-white" type="submit" id="login" name="login">Login</button>
                </form>

                <hr class="my-4">


                <div class="text-center">
                    <p class="text-white">Not Yet Registered? <a href="{{route('register')}}">Create an Account</a></p>
                </div>


            </div>
        </div>
</div>


