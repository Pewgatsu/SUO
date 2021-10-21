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

                    <form wire:submit.prevent="saveProfile">
                        @csrf
                        <div class="col-md-6 mx-5">
                            <div class="col-md" style="height: 40%; width: 40%">
                                @if($photo)
                                    <img id="profile_image" src="{{$photo->temporaryUrl()}}" class="rounded-circle mt-5" alt="img">
                                @else
                                    <img id="profile_image" src="{{asset('storage/photos').'/'.auth()->user()->profile_path}}"  class="rounded-circle mt-5" alt="img" >
                                    @error('photo') <span class="error"><small>{{ $message }}</small></span> @enderror
                                @endif
                            </div>
                        </div>

                        <div class="col-md-6 mx-5 mt-3">

                            <input type="file" id="upload" class="form-control form-control-sm w-50" style="display:none" wire:model="photo">
                            <label for="upload" class="btn btn-dark btn-sm mx-5">upload photo</label>
                        </div>



                        <div id="account_information_section">

                            <div class="col-md-6 mx-5 mt-5" id="username_field">
                                <label for="username" class="fs-6"><small>Username</small></label>
                                <input type="text" class="form-control" id="username" name="username" wire:model.defer="username">
                                @error('username') <span class="error"><small>{{ $message }}</small></span> @enderror
                            </div>

                            <div class="col-md-6 mx-5 mt-2 mb-5">
                                <label for="email" class="fs-6"><small>Email</small></label>
                                <input type="text" class="form-control" id="email" name="email" wire:model.defer="email">
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
