<div>

    <div class="container">

        <div class="row mt-5">

            <div class="col-md-3">
                <small class="mt-5 ms-5 mb-3"><h5>Password</h5></small>
                <small><p class="justify-content-center text-secondary">Update your password</p></small>
            </div>

            <div class="col">

                <div class="card mb-5 mt-3"  style="border-radius: 15px;">

                    <form wire:submit.prevent="savePassword">
                        @csrf

                        <div id="password_section">

                            <div class="col-md-6 mx-5 mt-5">
                                <label for="password" class="fs-6"><small>Password</small></label>
                                <input type="password" class="form-control " id="password" name="password" wire:model.defer="password">
                                @error('password') <span class="error" style="color: red"><small>{{ $message }}</small></span> @enderror
                            </div>

                            <div class="col-md-6 mx-5 mt-2">
                                <label for="newPassword" class="fs-6"><small>New Password</small></label>
                                <input type="password" class="form-control" id="newPassword" name="newPassword" wire:model.defer="newPassword">
                                @error('newPassword') <span class="error" style="color: red"><small>{{ $message }}</small></span> @enderror
                            </div>

                            <div class="col-md-6 mx-5 mt-2 mb-5">
                                <label for="confirmPassword" class="fs-6"><small>Confirm Password</small></label>
                                <input type="password" class="form-control" id="email" name="confirmPassword" wire:model.defer="confirmPassword">
                                @error('confirmPassword') <span class="error" style="color: red"><small>{{ $message }}</small></span> @enderror
                            </div>


                        </div>

                        <div class="text-md-end shadow-sm pe-5 py-3 bg-light"style="border-bottom-left-radius: 15px; border-bottom-right-radius: 15px;">
                            <button type="submit" class="btn btn-dark" style="width: 10%"><small>Save</small></button>
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

