@extends('layouts.master')
@section('title','Motherboard')
@section('content')
    @include('layouts.subheader')
    <div class="container">
        <div class="d-sm-flex my-2 justify-content-between align-items-center">
            <div class="h1">
                <i class="fas fa-microchip"></i>
                <small> Motherboard</small>
            </div>
        </div>
    </div>

    <section class="mb-3">
        <div class="container">
            <div class="card">
                <div class="card-body">
                    @if($product_motherboards->count())
                        <div class="table-responsive text-center">
                            <table class="table table-striped table-hover">
                                <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Product Name</th>
                                    <th>CPU Socket</th>
                                    <th>Form Factor</th>
                                    <th>Store</th>
                                    <th>Price</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($product_motherboards as $product_motherboard)
                                    <tr onclick="window.location='{{ route('product.motherboards.info',$product_motherboard->id) }}'">
                                        <td>
                                            @if(isset($product_motherboard->component->image_path))
                                                <img
{{--                                                    src="{{ $product_motherboard->component->image_path }}"--}}
                                                    src="{{ asset('images/components/motherboards/' . $product_motherboard->component->image_path) }}"
                                                    class="img-thumbnail img-fluid" style="height: 50px; width: 50px"
                                                    alt="">
                                            @endif
                                        </td>
                                        <td>{{ $product_motherboard->component->name }}</td>
                                        <td>{{ $product_motherboard->component->motherboard->cpu_socket ?? null }}</td>
                                        <td>{{ $product_motherboard->component->motherboard->mobo_form_factor ?? null }}</td>
                                        <td>{{ $product_motherboard->store->name }}</td>
                                        <td>&#8369; {{ number_format($product_motherboard->price,2) }}</td>
                                        <td>
                                            <form action="{{ route('add_product', $product_motherboard) }}"
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
                                {{ $product_motherboards->links() }}
                            </div>
                        </div>
                    @else
                        <p class="lead text-center">No Compatible Motherboards</p>
                    @endif
                </div>
            </div>
        </div>
    </section>

@endsection
