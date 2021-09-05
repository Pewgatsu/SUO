@extends('layouts.master')
@section('content')
    @include('layouts.dashboardheader')
    <div class="container">
        <div class="d-sm-flex my-2 justify-content-between align-items-center">
            <div class="h1">
                <i class="bi bi-person"></i>
                <small> Users</small>
            </div>
        </div>
    </div>

    <!-- Users Table -->
    <section class="mb-3">
        <div class="container">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="users_table" class="table table-striped table-hover">
                            <thead>
                            <tr>
                                <th>User ID</th>
                                <th>Username</th>
                                <th>Account Type</th>
                                <th>Verified</th>
                                <th>Active</th>
                                <th>Date Joined</th>
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
                                <td>[Data]</td>
                                <td>
                                    <button type="button" class="btn btn-warning">Suspend</button>
                                    <button type="button" class="btn btn-danger">Remove</button>
                                </td>
                            </tr>
                            <tr>
                                <td>[Data]</td>
                                <td>[Data]</td>
                                <td>[Data]</td>
                                <td>[Data]</td>
                                <td>[Data]</td>
                                <td>[Data]</td>
                                <td>
                                    <button type="button" class="btn btn-warning">Suspend</button>
                                    <button type="button" class="btn btn-danger">Remove</button>
                                </td>
                            </tr>
                            <tr>
                                <td>[Data]</td>
                                <td>[Data]</td>
                                <td>[Data]</td>
                                <td>[Data]</td>
                                <td>[Data]</td>
                                <td>[Data]</td>
                                <td>
                                    <button type="button" class="btn btn-warning">Suspend</button>
                                    <button type="button" class="btn btn-danger">Remove</button>
                                </td>
                            </tr>
                            <tr>
                                <td>[Data]</td>
                                <td>[Data]</td>
                                <td>[Data]</td>
                                <td>[Data]</td>
                                <td>[Data]</td>
                                <td>[Data]</td>
                                <td>
                                    <button type="button" class="btn btn-warning">Suspend</button>
                                    <button type="button" class="btn btn-danger">Remove</button>
                                </td>
                            </tr>
                            <tr>
                                <td>[Data]</td>
                                <td>[Data]</td>
                                <td>[Data]</td>
                                <td>[Data]</td>
                                <td>[Data]</td>
                                <td>[Data]</td>
                                <td>
                                    <button type="button" class="btn btn-warning">Suspend</button>
                                    <button type="button" class="btn btn-danger">Remove</button>
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
