@extends('layouts.master')
@section('content')
    @include('layouts.dashboardheader')
    <!-- SearchPage Table -->
    <section class="mb-3">
        <div class="container" style="width:100%">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="searchpagecomponents_table" class="table table-striped table-hover" style="width:100%">
                            <thead>
                            <tr>
                                <th>Component Image</th>
                                <th>Component Name</th>
                                <th>Component Type</th>
                                <th>Price</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($data as $item)
                                <tr class="item{{$item->component_id}}">
                                    <td>{{$item->component_image}}</td>
                                    <td>{{$item->component_name}}</td>
                                    <td>{{$item->component_type}}</td>
                                    <td>{{$item->component_price}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="searchpagestore_table" class="table table-striped table-hover" style="width:100%">
                                        <thead>
                                        <tr>
                                            <th>Store Image</th>
                                            <th>Store Name</th>
                                            <th>Owner</th>
                                            <th>Contact Number</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>[Data]</td>
                                            <td>[Data]</td>
                                            <td>[Data]</td>
                                            <td>[Data]</td>
                                        </tr>
                                        <tr>
                                            <td>[Data]</td>
                                            <td>[Data]</td>
                                            <td>[Data]</td>
                                            <td>[Data]</td>
                                        </tr>
                                        <tr>
                                            <td>[Data]</td>
                                            <td>[Data]</td>
                                            <td>[Data]</td>
                                            <td>[Data]</td>
                                        </tr>
                                        <tr>
                                            <td>[Data]</td>
                                            <td>[Data]</td>
                                            <td>[Data]</td>
                                            <td>[Data]</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
