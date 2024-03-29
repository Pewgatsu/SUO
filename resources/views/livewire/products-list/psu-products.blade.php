@extends('layouts.master')
@section('title','PSU')
@section('content')
    @include('layouts.subheader')
    <div class="container">
        <div class="d-sm-flex my-2 justify-content-between align-items-center">
            <div class="h1">
                <i class="fas fa-plug"></i>
                <small> PSU</small>
            </div>
        </div>
    </div>

    <section class="mb-3">
        <div class="container">
            <div class="card">
                <div class="card-body">
                    @if($product_psus->count())
                        <div class="table-responsive text-center">
                            <table class="table table-striped table-hover">
                                <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Product Name</th>
                                    <th>Form Factor</th>
                                    <th>Wattage</th>
                                    <th>Store</th>
                                    <th>Price</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($product_psus as $product_psu)
                                    <tr onclick="window.location='{{ route('product.psus.info',$product_psu->id) }}'">
                                        <td>
                                            @if(isset($product_psu->component->image_path))
                                                <img
                                                    src="{{ $product_psu->component->image_path }}"
                                                    class="img-thumbnail img-fluid" style="height: 50px; width: 50px"
                                                    alt="">
                                            @endif
                                        </td>
                                        <td>{{ $product_psu->component->name }}</td>
                                        <td>{{ $product_psu->component->psu->psu_form_factor ?? null }}</td>
                                        <td>{{ $product_psu->component->psu->wattage ?? null }} W</td>
                                        <td>{{ $product_psu->store->name }}</td>
                                        <td>&#8369; {{ number_format($product_psu->price,2) }}</td>
                                        <td>
                                            <form action="{{ route('add_product', $product_psu) }}" method="post">
                                                @csrf
                                                <button type="submit" class="btn btn-primary">Add</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="d-flex justify-content-center">
                                {{ $product_psus->links() }}
                            </div>
                        </div>
                    @else
                        <p class="lead text-center">No Compatible PSUs</p>
                    @endif
                </div>
            </div>
        </div>
    </section>

@endsection
