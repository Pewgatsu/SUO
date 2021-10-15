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
                                <img src="{{ asset('storage/photos/' . $account->profile_path ) }}"
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
                                <li class="list-group-item"><b>Username:&emsp;</b>{{ $account->username ?? '---' }}</li>
                                <li class="list-group-item"><b>Email:&emsp;</b>{{ $account->email ?? '---' }}</li>
                                <li class="list-group-item"><b>Account Type:&emsp;</b>{{ $account->account_type ?? '---' }}</li>
                                <li class="list-group-item"><b>Verified:&emsp;</b>@if($account->is_verified) Yes @else No @endif</li>
                                <li class="list-group-item"><b>Active:&emsp;</b>@if($account->is_active) Yes @else No @endif</li>
                                <li class="list-group-item"><b>Date Created:&emsp;</b>{{ $account->created_at->diffForHumans() }}</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <h5 class="card-header">Personal Information</h5>
                        <div class="card-body">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item"><b>First Name:&emsp;</b>{{ $account->firstname }}</li>
                                <li class="list-group-item"><b>Last Name:&emsp;</b>{{ $account->lastname }}</li>
                                <li class="list-group-item"><b>Birthdate:&emsp;</b>@if(isset($account->birthdate)) {{ date('F j,Y',strtotime($account->birthdate)) }} @else --- @endif</li>
                                <li class="list-group-item"><b>Gender:&emsp;</b>{{ $account->gender ?? '---' }}</li>
                                <li class="list-group-item"><b>Contact No.:&emsp;</b>{{ $account->contact ?? '---' }}</li>
                                <li class="list-group-item"><b>Address:&emsp;</b>{{ $account->address ?? '---' }}</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
