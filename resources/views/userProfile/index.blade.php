@extends('layouts.master')
@section('content')
    @include('layouts.subheader')
    <div class="container">
        <div class="d-sm-flex my-2 justify-content-between align-items-center">
            <div class="h1">
                <i class="bi bi-person"></i>
                <small> {{ $account->firstname . ' ' . $account->lastname }}</small>
            </div>
        </div>
    </div>

    <section class="mt-2">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <h5 class="card-header">Profile Picture</h5>
                        <div class="card-body">
                            @if(isset($account->profile_path))
                                <img src="{{ asset('images/accounts/'.$account->profile_path) }}"
                                     class="card-img-bottom">
                            @else
                                <img src="{{ asset('images/placeholder.jpg') }}"
                                     class="card-img-bottom">
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <h5 class="card-header">Account Information</h5>
                        <div class="card-body">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item"><b>Username:</b></li>
                                <li class="list-group-item"><b>Email:</b></li>
                                <li class="list-group-item"><b>Account Type:</b></li>
                                <li class="list-group-item"><b>Verified:</b></li>
                                <li class="list-group-item"><b>Active:</b></li>
                                <li class="list-group-item"><b>Date Created:</b></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <h5 class="card-header">Personal Information</h5>
                        <div class="card-body">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item"><b>First Name:</b></li>
                                <li class="list-group-item"><b>Last Name:</b></li>
                                <li class="list-group-item"><b>Birthdate:</b></li>
                                <li class="list-group-item"><b>Gender:</b></li>
                                <li class="list-group-item"><b>Contact No.:</b></li>
                                <li class="list-group-item"><b>Address:</b></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
