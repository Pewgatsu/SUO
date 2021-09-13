@extends('layouts.master')

@section('content')
    @include('layouts.dashboardheader')
    <div class="container" style="margin-top: 58px; width: 50rem;" xmlns:margin-top="http://www.w3.org/1999/xhtml">
        <div id="card" class="card-header">
            <h3 class="card-title text-center">COMPONENT NAME</h3> {{--how to display component info name here--}}
        </div>
    </div>

    <div class="row">
        <!-- left Column -->
        <div class="col-md-3">
            <div class="card">
                <div class= "card-body" style="width: min-content">
                    <img src="" alt="" width="100%" height="200" />
                </div>
            </div>

            <div class="card" style="margin-top: 58px; width: 28.5rem;">
                <div class= "card-body" style="width:100%">
                    <h6 class="card-text"> Gen Info 1: </h6>
                    <h6 class="card-text"> Gen Info 2: </h6>
                    <h6 class="card-text"> Gen Info 3: </h6>
                    <h6 class="card-text"> Gen Info 4: </h6>
                    <h6 class="card-text"> Gen Info 5: </h6>
                </div>
            </div>
        </div>

        <!-- Right Column -->
        <div class="col-md-3">
            <div class="card" style="margin-top: 58px; width: 30rem;">
                <div class= "card-body" >
                    <table id="component_info" class="table table-striped table-hover" style="width:100%">
                        <thead>
                        <tr>
                            <th>DATA</th> {{--how to display component info here--}}
                            <th>DATA</th> {{--how to display component info here--}}
                            <th>DATA</th> {{--how to display component info here--}}
                            <th>DATA</th>
                        </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
            <div>
                <button type="button" class="btn btn-info">Edit</button>
            </div>

        </div>
    </div>
@endsection
