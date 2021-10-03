<div>

    <div class="container">

        <div class="row mt-5">

            <div class="col-md-3">
                <small class="mt-5 ms-5 mb-3"><h5>Delete Account</h5></small>
                <small><p class="justify-content-center text-secondary">Permanently delete your account</p></small>
            </div>

            <div class="col">
                <div class="card mb-5 mt-3"  style="border-radius: 15px;">

                        <div id="Delete account warning">

                            <div class="col-md-6 justify-content-center text-sm-start mt-5 mx-5 mb-3">
                                <small>{{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please save any data or information that you wish to retain.') }}</small>
                            </div>

                        </div>

                        <div class="text-md-start shadow-sm ps-5 py-3"style="border-bottom-left-radius: 15px; border-bottom-right-radius: 15px;">
                            <button type="button" class="btn btn-danger" id="save" wire:click="confirmUserDeletion"><small>Delete Account</small></button>
                        </div>
                </div>
            </div>


            <div wire:ignore.self class="modal fade" id="confirmationModal" tabindex="-1" aria-labelledby="confirmationModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form wire:submit.prevent="deleteUser" >

                        <div class="modal-body">
                            <small>{{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please enter your password
                                        to confirm you would like to permanently delete your account.') }}</small>


                            <div class="col-md-6 mt-2">
                                <input type="password" class="form-control " id="password" name="password" wire:model.defer="password" placeholder="Password">
                                @error('password') <span class="error" style="color: red"><small>{{ $message }}</small></span> @enderror
                            </div>


                        </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-danger"><small>Delete Account</small></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>

    </div>




</div>
