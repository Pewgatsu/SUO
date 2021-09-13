@extends('layouts.master')

@section('content')

    <div class="p-5 card mx-auto" style="margin-top: 58px; width: 50rem; ">
        <!-- The Grid -->
        <div class="d-flex align-items-start bg-light mb-3">
            <div id="card" class="card-header">
                <h3 class="card-title">Product Info</h3> {{--how to display component info name here--}}
                <div class="container">

                </div>
            </div>
            <br>
            <!-- left Column -->
            <div class="align-content-lg-start">
                <div class="row-cols-xxl-auto" >
                    <div class="card">
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
            <div class="align-content-lg-end">
                <div class="row-cols-xxl-auto" >
                    <div class="card">
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
