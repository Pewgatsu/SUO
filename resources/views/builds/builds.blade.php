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
                                    <th>Date Created</th>
                                    <th>Date Updated</th>
                                    <th>Total Price</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($builds as $build)
                                    <tr onclick="window.location='{{ route('consumer.builds.view', $build) }}'">
                                        <td>{{ $build->build_name }}</td>
                                        <td>{{date('M d Y', strtotime($build->created_at))}}</td>
                                        <td>{{date('M d Y', strtotime($build->updated_at))}}</td>
                                        <td>&#8369;{{ number_format($build->total_price,2)  }}</td>
                                        <td onclick="event.stopPropagation();">
                                            <button type="button" class="btn btn-info" value="{{ $build->id }}"
                                                    onclick="window.location='{{ route('consumer.builds.edit',$build->id) }}'">
                                                Edit
                                            </button>
                                            <button type="button"   data-bs-toggle="modal"
                                                    data-bs-target="#delete_build_{{ $build->id }}"
                                                @if(in_array('Ordered',array_column($build->build_products->toArray(),'status')) ||
                                                    in_array('Confirmed',array_column($build->build_products->toArray(),'status')) ||
                                                    in_array('Sold Out',array_column($build->build_products->toArray(),'status'))
                                                    )
                                                    class="d-none"
                                                    @else
                                                    class="btn btn-danger"
                                                @endif


                                            >
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



@if(session()->has('alert_message'))
    <script>
        toastr.options = {
            "closeButton": false,
            "debug": false,
            "newestOnTop": false,
            "progressBar": false,
            "positionClass": "toast-custom-pos",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut",
        };
        toastr.success("{{ \Illuminate\Support\Facades\Session::get('alert_message') }}")
    </script>

@endif
