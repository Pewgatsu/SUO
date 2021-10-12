@extends('layouts.master')
@section('content')
    @include('layouts.subheader')
    <div class="container">
        <div class="d-sm-flex my-2 justify-content-between align-items-center">
            <div class="h1">
                <i class="far fa-snowflake"></i>
                <small> CPU Cooler</small>
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
                                <th>Fan Speed</th>
                                <th>Noise Level</th>
                                <th>Store</th>
                                <th>Price</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($product_cpu_coolers as $product_cpu_cooler)
                                <tr onclick="window.location='{{ route('product.cpu_coolers.info',$product_cpu_cooler->id) }}'">
                                    <td>
                                        @if(isset($product_cpu_cooler->component->image_path))
                                            <img
                                                src="{{ asset('images/components/cpu_coolers/' . $product_cpu_cooler->component->image_path) }}"
                                                class="img-thumbnail img-fluid" style="height: 50px; width: 50px" alt="">
                                        @endif
                                    </td>
                                    <td>{{ $product_cpu_cooler->component->name }}</td>
                                    <td>{{ $product_cpu_cooler->component->cpu_cooler->fan_speed ?? null }} rpm</td>
                                    <td>{{ $product_cpu_cooler->component->cpu_cooler->noise_level ?? null }} dB</td>
                                    <td>{{ $product_cpu_cooler->store->name }}</td>
                                    <td>&#8369; {{ number_format($product_cpu_cooler->price,2) }}</td>
                                    <td>
                                        <form action="{{ route('add_product', $product_cpu_cooler) }}" method="post">
                                            @csrf
                                            <button type="submit" class="btn btn-primary">Add</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="d-flex justify-content-center">
                            {{ $product_cpu_coolers->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
