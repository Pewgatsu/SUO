@extends('layouts.master')
@section('content')
    <div class="container">
        <div class="d-sm-flex my-2 justify-content-between align-items-center">
            <div class="h1">
                <i class="fas fa-microchip"></i>
                <small> Motherboard</small>
            </div>
        </div>
    </div>

    <!-- Motherboard Table -->
    <section class="mb-3">
        <div class="container">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="motherboard_table" class="table table-striped table-hover">
                            <thead>
                            <tr>
                                <th>Component ID</th>
                                <th>Component Name</th>
                                <th>[Component Attribute]</th>
                                <th>[Component Attribute]</th>
                                <th>[Component Attribute]</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>[Data]</td>
                                <td>[Data]</td>
                                <td>[Data]</td>
                                <td>[Data]</td>
                                <td>[Data]</td>
                                <td>
                                    <button type="button" class="btn btn-info">Edit</button>
                                    <button type="button" class="btn btn-danger">Delete</button>
                                </td>
                            </tr>
                            <tr>
                                <td>[Data]</td>
                                <td>[Data]</td>
                                <td>[Data]</td>
                                <td>[Data]</td>
                                <td>[Data]</td>
                                <td>
                                    <button type="button" class="btn btn-info">Edit</button>
                                    <button type="button" class="btn btn-danger">Delete</button>
                                </td>
                            </tr>
                            <tr>
                                <td>[Data]</td>
                                <td>[Data]</td>
                                <td>[Data]</td>
                                <td>[Data]</td>
                                <td>[Data]</td>
                                <td>
                                    <button type="button" class="btn btn-info">Edit</button>
                                    <button type="button" class="btn btn-danger">Delete</button>
                                </td>
                            </tr>
                            <tr>
                                <td>[Data]</td>
                                <td>[Data]</td>
                                <td>[Data]</td>
                                <td>[Data]</td>
                                <td>[Data]</td>
                                <td>
                                    <button type="button" class="btn btn-info">Edit</button>
                                    <button type="button" class="btn btn-danger">Delete</button>
                                </td>
                            </tr>
                            <tr>
                                <td>[Data]</td>
                                <td>[Data]</td>
                                <td>[Data]</td>
                                <td>[Data]</td>
                                <td>[Data]</td>
                                <td>
                                    <button type="button" class="btn btn-info">Edit</button>
                                    <button type="button" class="btn btn-danger">Delete</button>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
