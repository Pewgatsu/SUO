@extends('layouts.master')
@section('title','Computer Case')
@section('content')
    @include('layouts.subheader')
    <div class="container">
        <div class="d-sm-flex my-2 justify-content-between align-items-center">
            <div class="h1">
                <i class="fas fa-suitcase"></i>
                <small> Computer Case</small>
            </div>
        </div>
    </div>

    <section class="mb-3">
        <div class="container">
            <div class="card">
                <div class="card-body">
                    @if($product_computer_cases->count())
                        <div class="table-responsive text-center">
                            <table class="table table-striped table-hover">
                                <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Product Name</th>
                                    <th>Type</th>
                                    <th>Power Supply</th>
                                    <th>Store</th>
                                    <th>Price</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($product_computer_cases as $product_computer_case)
                                    <tr onclick="window.location='{{ route('product.computer_cases.info',$product_computer_case->id) }}'">
                                        <td>
                                            @if(isset($product_computer_case->component->image_path))
                                                <img
                                                    src="{{ $product_computer_case->component->image_path }}"
                                                    class="img-thumbnail img-fluid" style="height: 50px; width: 50px"
                                                    alt="">
                                            @endif
                                        </td>
                                        <td>{{ $product_computer_case->component->name }}</td>
                                        <td>{{ $product_computer_case->component->computer_case->case_type ?? null }}</td>
                                        <td>{{ $product_computer_case->component->computer_case->power_supply ?? null }}</td>
                                        <td>{{ $product_computer_case->store->name }}</td>
                                        <td>&#8369; {{ number_format($product_computer_case->price,2) }}</td>
                                        <td>
                                            <form action="{{ route('add_product', $product_computer_case) }}"
                                                  method="post">
                                                @csrf
                                                <button type="submit" class="btn btn-primary">Add</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="d-flex justify-content-center">
                                {{ $product_computer_cases->links() }}
                            </div>
                        </div>
                    @else
                        <p class="lead text-center">No Compatible Computer Cases</p>
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection
