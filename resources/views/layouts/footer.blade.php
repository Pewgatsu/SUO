 <!-- Footer -->
 <style>
     .fl-page {
         position: relative;
         min-height: 10vh;
         padding-bottom: 60px; /* Should be equal to the height of your footer */
         
     }
     .fl-page-footer-wrap {
         width: 100%;
         position: absolute;
         bottom: 0px;
     }
 </style>
    <footer class="text-center text-light fl-page"style="background: #03045e">

        <div class="container">

            <section class="mt-5">

                <div class="row text-center d-flex justify-content-center pt-5">

                    <div class="col-md-2">
                        <h6 class="text-uppercase font-weight-bold">
                            <a href="#" onclick="$('#about_section').animatescroll()" class="text-decoration-none text-white">About Us</a>
                        </h6>
                    </div>



                    <div class="col-md-2">
                        <h6 class="text-uppercase font-weight-bold">
                            <a href="#" onclick="$('#contact_section').animatescroll()" class="text-decoration-none text-white">Contact</a>
                        </h6>
                    </div>


                    <div class="col-md-2">
                        <h6 class="text-uppercase font-weight-bold ">
                            <a href="{{route('aboutsystem')}}" class="text-decoration-none text-white">About System</a>
                        </h6>
                    </div>
                </div>

            </section>


            <hr class="my-5" />

            <div class="lead mb" >
                Copyright System Unit Optimizer, &copy; 2021
            </div>



        </div>

    </footer>

