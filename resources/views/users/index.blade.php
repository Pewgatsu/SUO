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
                    @if($accounts->count())
                        <div class="table-responsive text-center">
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
                                @foreach($accounts as $account)
                                    <tr>
                                        <td>{{ $account->id }}</td>
                                        <td>{{ $account->username }}</td>
                                        <td>{{ $account->account_type }}</td>
                                        <td>
                                            @if($account->is_verified)
                                                Yes
                                            @else
                                                No
                                            @endif
                                        </td>
                                        <td>
                                            @if($account->is_active)
                                                Yes
                                            @else
                                                No
                                            @endif
                                        </td>
                                        <td>{{ $account->created_at->diffForHumans() }}</td>
                                        <td>
                                            <button type="button" class="btn btn-warning">Suspend</button>
                                            <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                                    data-bs-target="#remove_user_{{ $account->id }}">Remove
                                            </button>
                                        </td>
                                    </tr>

                                    <!-- Modal -->
                                    <div class="modal fade" id="remove_user_{{ $account->id }}" tabindex="-1">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="remove_user_{{ $account->id }}_label">
                                                        Remove User</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body text-center">
                                                    Do you want to remove {{ $account->username }}?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Cancel
                                                    </button>
                                                    <form action="{{ route('users.destroy',$account) }}" method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-primary">Remove</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="d-flex justify-content-center">
                                {{ $accounts->links() }}
                            </div>
                        </div>

                    @else
                        <p class="lead text-center">No Users</p>
                    @endif
                </div>
            </div>
        </div>
    </section>

@endsection
