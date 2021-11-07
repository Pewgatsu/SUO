@extends('layouts.master')
@section('content')
    @include('layouts.subheader')
    <div class="container">
        <div class="d-sm-flex my-2 justify-content-between align-items-center">
            <div class="h1">
                <i class="fas fa-memory"></i>
                <small> RAM</small>
            </div>
        </div>
    </div>

    <section class="mb-3">
        <div class="container">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive text-center">
                        <table class="table table-striped table-hover">
                            <thead>
                            <tr>
                                <th>Image</th>
                                <th>Product Name</th>
                                <th>Type</th>
                                <th>Speed</th>
                                <th>Store</th>
                                <th>Price</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($product_rams as $product_ram)
                                <tr onclick="window.location='{{ route('product.rams.info',$product_ram->id) }}'">
                                    <td>
                                        @if(isset($product_ram->component->image_path))
                                            <img
                                                src="{{ $product_ram->component->image_path }}"
                                                class="img-thumbnail img-fluid" style="height: 50px; width: 50px" alt="">
                                        @endif
                                    </td>
                                    <td>{{ $product_ram->component->name }}</td>
                                    <td>{{ $product_ram->component->ram->memory_type ?? null }}</td>
                                    <td>{{ $product_ram->component->ram->memory_speed ?? null }} MHz</td>
                                    <td>{{ $product_ram->store->name }}</td>
                                    <td>&#8369; {{ number_format($product_ram->price,2) }}</td>
                                    <td>
                                        <form action="{{ route('add_product', $product_ram) }}" method="post">
                                            @csrf
                                            <button type="submit" class="btn btn-primary">Add</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="d-flex justify-content-center">
                            {{ $product_rams->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
