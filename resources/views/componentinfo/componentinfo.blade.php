@extends('layouts.master')

@section('content')
    @include('layouts.dashboardheader')
    <div class="container" style="margin-top: 58px; width: 50rem;">
        <div id="card" class="card-header">
            <h3 class="card-title">Product Info</h3> {{--how to display component info name here--}}
            <div class="container">

            </div>
        </div>
    </div>

    <div class="row">
        <!-- left Column -->
        <div class="d-flex align-items-start bg-light mb-3">
            <div class="card">
                <div class= "card-body" style="width: min-content">
                    <img src="" alt="" width="100%" height="200" />
                </div>
            </div>
        </div>

        <!-- Right Column -->
        <div class="d-flex align-items-end bg-light mb-3">
            <div class="card">
                <div class= "card-body" style="overflow-x:auto;">
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
@endsection
