@extends('layouts.master')

@section('content')

    <div class="p-5 card mx-auto" style="margin-top: 58px; width: 50rem; ">
        <!-- The Grid -->
        <div class="w3-row-padding" >
            <div id="card" class="w3-container w3-card w3-white">
                <h3 class="card-title">Product Info</h3> {{--how to display component info name here--}}
                <div class="w3-container">

                </div>
            </div>
            <br>
            <!-- left Column -->
            <div class="w3-third ">
                <div class="w3-row-padding" >
                    <div  class="w3-container w3-card w3-white">
                        <div style="overflow-x:auto;">
                            <img src="<?= ?>" alt="" width="100%" height="400" />
                            <br><br>
                            <table width="100%" >

                            </table>
                        </div>

                    </div>
                </div>
            </div>
            <!-- Right Column -->
            <div class="w3-rest">
                <div class="w3-row-padding" >
                    <div class="w3-container w3-card w3-white">
                        <div style="overflow-x:auto;">
                            <table id="component_info" class="table table-striped table-hover" style="width:100%">
                                <thead>
                                <tr>
                                    <th>Component Name</th> {{--how to display component info here--}}
                                    <th>Component Name</th> {{--how to display component info here--}}
                                    <th>Component Type</th> {{--how to display component info here--}}
                                    <th>Price</th>
                                </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection
