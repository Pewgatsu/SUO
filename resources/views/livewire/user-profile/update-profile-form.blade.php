<div>

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


                    <form wire:submit.prevent="saveProfile">
                        @csrf

                        <div id="account_information_section">

                            <div class="col-md-6 mx-5 mt-5" id="username_field">
                                <label for="username" class="fs-6"><small>Username</small></label>
                                <input type="text" class="form-control" id="username" name="username" wire:model.defer="username">
                                @error('username') <span class="error" style="color: red"><small>{{ $message }}</small></span> @enderror
                            </div>

                            <div class="col-md-6 mx-5 mt-2 mb-5">
                                <label for="email" class="fs-6"><small>Email</small></label>
                                <input type="text" class="form-control" id="email" name="email" wire:model.defer="email">
                                @error('email') <span class="error" style="color: red"><small>{{ $message }}</small></span> @enderror
                            </div>


                        </div>

                        <div class="text-md-end shadow-sm pe-5 py-3 bg-light"style="border-bottom-left-radius: 15px; border-bottom-right-radius: 15px;">
                            {{--                           <button type="button" class="btn btn-dark me-2" style="width: 10%" name="edit" id="editAccountInfo">Edit</button>--}}
                            <button type="submit" class="btn btn-dark" style="width: 10%" id="save"><small>Save</small></button>
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
