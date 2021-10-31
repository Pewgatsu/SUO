
<div class="container">
    <div class="toast-custom-pos toast-success">

    </div>
    <div class="row mt-5">

        <div class="col-md-3">
            <small class="mt-5 ms-5 mb-3"><h5>Personal Information</h5></small>
            <small><p class="justify-content-center text-secondary">Update your personal information</p></small>
        </div>

        <div class="col">

            <div class="card mb-5 mt-3"  style="border-radius: 15px;">


                <form wire:submit.prevent="savePersonalInfo">
                    @csrf
                    <div id="personal_information_section">

                        <div class="row row-cols-md-6 col-md-12 mt-5">

                            <div class="col-md-3 ms-5">
                                <label for="firstname" class="fs-6"><small>First Name</small></label>
                                <input type="text" class="form-control" id="firstname" name="firstname" wire:model.defer="firstname" value="">
                                @error('firstname') <span class="error" style="color: red"><small>{{ $message }}</small></span> @enderror
                            </div>

                            <div class="col-md-3 ms-4">
                                <label for="lastname" class="fs-6"><small>Last Name</small></label>
                                <input type="text" class="form-control" id="lastname" name="lastname" wire:model.defer="lastname" value="">

                                @error('lastname') <span class="error" style="color: red"><small>{{ $message }}</small></span> @enderror
                            </div>
                        </div>

                        <div class="col-md-6 mx-5 mt-2">
                            <label for="birthdate" class="fs-6"><small>Date of Birth</small></label>
                            <input class="form-control" id="birthdate" name="birthdate" placeholder=""
                                   type="text" autocomplete="off" value="" wire:model.defer="birthdate" onchange="this.dispatchEvent(new InputEvent('input'))"/>

                            @error('birthdate') <span class="error" style="color: red"><small>{{ $message }}</small></span> @enderror
                        </div>

                        <div class="col-md-6 mx-5 mt-2">
                            <label for="gender" class="fs-6"><small>Gender</small></label>
                            <select class="form-select" id="gender" name="gender" wire:model.defer="gender">
                                <option value=""></option>
                                <option value="male">Male</option>
                                <option value="female"  >Female</option>
                                <option value="other" >Other</option>
                            </select>

                            @error('gender') <span class="error" style="color: red"><small>{{ $message }}</small></span> @enderror
                        </div>

                        <div class="col-md-6 mx-5 mt-2">
                            <label for="address" class="fs-6"><small>Address</small></label>
                            <input type="text" class="form-control" id="address" name="address" value="" wire:model.defer="address">
                            @error('address') <span class="error" style="color: red"><small>{{ $message }}</small></span> @enderror
                        </div>

                        <div class="col-md-6 mx-5 mt-2 mb-5">
                            <label for="contact" class="fs-6"><small>Contact</small></label>
                            <input type="text" class="form-control" id="contact" name="contact" value="" wire:model.defer="contact">
                            @error('contact') <span class="error" style="color: red"><small>{{ $message }}</small></span> @enderror
                        </div>

                    </div>

                    <div class="text-md-end shadow-sm pe-5 py-3 bg-light"style="border-bottom-left-radius: 15px; border-bottom-right-radius: 15px;">
                        {{--                           <button type="button" class="btn btn-dark me-2" style="width: 10%" name="editPersonalInfo" id="editPersonalInfo">Edit</button>--}}
                        <button type="submit" class="btn btn-dark" style="width: 10%" id="save"><small>Save</small></button>
                    </div>

                </form>

            </div>

        </div>

        <div class="py-8">
            <div class="border-top border-dark"></div>
        </div>

    </div>

</div>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>




<script>
    $(document).ready(function(){
        var date_input=$('input[id="birthdate"]'); //our date input has the name "date"
        var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
        date_input.datepicker({
            format: 'mm/dd/yyyy',
            container: container,
            todayHighlight: true,
            autoclose: true,
        })
    })
</script>
