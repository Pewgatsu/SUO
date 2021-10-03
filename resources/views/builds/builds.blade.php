@extends('layouts.master')
@section('content')

    @include('layouts.subheader')
    <div class="container">
        <div class="d-sm-flex my-2 justify-content-between align-items-center">
            <div class="h1">
                <i class="fas fa-tools "></i>
                <small> My Builds</small>
            </div>
            <button type="button" class="btn btn-primary"
                    onclick="window.location='{{ route('builder') }}'">
                Create Build
            </button>
        </div>
    </div>

    <div class="mb-3">
        <div class="container">
            <div class="card">
                <div class="card-body">
                    @if($builds->count())
                        <div class="table-responsive text-center">
                            <table id="builds_table" class="table table-striped table-hover">
                                <thead>
                                <tr>
                                    <th>Build Name</th>
                                    <th>Description</th>
                                    <th>Date Created</th>
                                    <th>Total Price</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($builds as $build)
                                    <tr>
                                        <td>{{ $build->build_name }}</td>
                                        <td>{{ $build->build_description }}</td>
                                        <td>{{ $build->created_at }}</td>
                                        <td>&#8369;{{ number_format($build->total_price,2)  }}</td>
                                        <td>
                                            <button type="button" class="btn btn-info" value="{{ $build->id }}">
                                                Edit
                                            </button>
                                            <button type="button" class="btn btn-danger"  data-bs-toggle="modal"
                                                    data-bs-target="#delete_build_{{ $build->id }}">
                                                Delete
                                            </button>
                                        </td>
                                    </tr>
                                    <!-- Delete Build -->
                                    <div class="modal fade"
                                         id="delete_build_{{ $build->id }}" tabindex="-1">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title"
                                                        id="delete_build_{{ $build->id }}_label">
                                                        Delete Build</h5>
                                                    <button type="button" class="btn-close"
                                                            data-bs-dismiss="modal"></button>
                                                </div>
                                                <div class="modal-body text-center">
                                                    Do you want to delete {{ $build->build_name }}?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Cancel
                                                    </button>
                                                    <form
                                                        action="{{ route('consumer.builds.delete',$build->id) }}"
                                                        method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-primary">Delete
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="d-flex justify-content-center">
                                {{ $builds->links() }}
                            </div>
                        </div>

                    @else
                        <p class="lead text-center">No Builds Yet!!!</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
