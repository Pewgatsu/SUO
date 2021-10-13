@extends('layouts.master')
@section('content')
    @include('layouts.subheader')
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
                                    <tr onclick="window.location='{{ route('user.profile.search', $account) }}'">
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
                                        <td onclick="event.stopPropagation();">
                                            @if($account->is_active)
                                                <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                                                        data-bs-target="#suspend_user_{{ $account->id }}">Suspend
                                                </button>
                                            @else
                                                <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                                                        data-bs-target="#unsuspend_user_{{ $account->id }}">Unsuspend
                                                </button>
                                            @endif
                                            <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                                    data-bs-target="#remove_user_{{ $account->id }}">Remove
                                            </button>
                                        </td>
                                    </tr>

                                    <!-- Suspend Modal -->
                                    @if($account->is_active)
                                        <div class="modal fade" id="suspend_user_{{ $account->id }}" tabindex="-1">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title"
                                                            id="suspend_user_{{ $account->id }}_label">
                                                            Suspend User</h5>
                                                        <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal"></button>
                                                    </div>
                                                    <div class="modal-body text-center">
                                                        Do you want to suspend {{ $account->username }}?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Cancel
                                                        </button>
                                                        <form action="{{ route('admin.users.suspend',$account) }}"
                                                              method="post">
                                                            @csrf
                                                            <button type="submit" class="btn btn-primary">Suspend
                                                            </button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @else
                                        <div class="modal fade" id="unsuspend_user_{{ $account->id }}" tabindex="-1">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title"
                                                            id="unsuspend_user_{{ $account->id }}_label">
                                                            Unsuspend User</h5>
                                                        <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal"></button>
                                                    </div>
                                                    <div class="modal-body text-center">
                                                        Do you want to unsuspend {{ $account->username }}?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Cancel
                                                        </button>
                                                        <form action="{{ route('admin.users.unsuspend',$account) }}"
                                                              method="post">
                                                            @csrf
                                                            <button type="submit" class="btn btn-primary">Unsuspend
                                                            </button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif

                                    <!-- Remove Modal -->
                                    <div class="modal fade" id="remove_user_{{ $account->id }}" tabindex="-1">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="remove_user_{{ $account->id }}_label">
                                                        Remove User</h5>
                                                    <button type="button" class="btn-close"
                                                            data-bs-dismiss="modal"></button>
                                                </div>
                                                <div class="modal-body text-center">
                                                    Do you want to remove {{ $account->username }}?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Cancel
                                                    </button>
                                                    <form action="{{ route('admin.users.remove',$account) }}" method="post">
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
