 <div>
        <style>
            #valid_id_img{
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
                    <small class="mt-5 ms-5 mb-3"><h5>Validate Account</h5></small>
                    <small><p class="justify-content-center text-secondary">Validate your account by submitting any valid id</p></small>
                </div>

                <div class="col">

                    <div class="card mb-5 mt-3"  style="border-radius: 15px;">

                        <form wire:submit.prevent="submit_id">
                            @csrf
                            <div class="col-md-6 mx-5">
                                <div class="col-md" style="height: 40%; width: 40%">
                                    @if($valid_id)
                                        <img id="valid_id_img" src="{{$valid_id->temporaryUrl()}}" class="mt-5" alt="img">
                                    @else
                                        <img id="valid_id_img" src="{{$valid_id_path}}"  class="mt-5" alt="img" >
                                        @error('valid_id') <span class="error"><small>{{ $message }}</small></span> @enderror
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-6 mx-5 mt-3 mb-5">
                                <input type="file" id="upload" class="form-control form-control-sm w-50" style="display:none" wire:model="valid_id">
                                <label for="upload" class="btn btn-dark btn-sm mx-5">upload photo</label>
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

{{--            <div class="py-8">--}}
{{--                <div class="border-top border-dark"></div>--}}
{{--            </div>--}}

        </div>

    </div>


