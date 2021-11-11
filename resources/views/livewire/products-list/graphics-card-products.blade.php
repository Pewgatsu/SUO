@extends('layouts.master')
@section('title','Graphics Card')
@section('content')
    @include('layouts.subheader')
    <div class="container">
        <div class="d-sm-flex my-2 justify-content-between align-items-center">
            <div class="h1">
                <i class="fas fa-tv"></i>
                <small> Graphics Card</small>
            </div>
        </div>
    </div>

    <section class="mb-3">
        <div class="container">
            <div class="card">
                <div class="card-body">
                    @if($product_graphics_cards->count())
                        <div class="table-responsive text-center">
                            <table class="table table-striped table-hover">
                                <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Product Name</th>
                                    <th>Chipset</th>
                                    <th>Base Clock</th>
                                    <th>Store</th>
                                    <th>Price</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($product_graphics_cards as $product_graphics_card)
                                    <tr onclick="window.location='{{ route('product.graphics_cards.info',$product_graphics_card->id) }}'">
                                        <td>
                                            @if(isset($product_graphics_card->component->image_path))
                                                <img
                                                    src="{{ $product_graphics_card->component->image_path }}"
                                                    class="img-thumbnail img-fluid" style="height: 50px; width: 50px"
                                                    alt="">
                                            @endif
                                        </td>
                                        <td>{{ $product_graphics_card->component->name }}</td>
                                        <td>{{ $product_graphics_card->component->graphics_card->gpu_chipset ?? null }}</td>
                                        <td>{{ $product_graphics_card->component->graphics_card->base_clock ?? null }}
                                            MHz
                                        </td>
                                        <td>{{ $product_graphics_card->store->name }}</td>
                                        <td>&#8369; {{ number_format($product_graphics_card->price,2) }}</td>
                                        <td>
                                            <form action="{{ route('add_product', $product_graphics_card) }}"
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
                                {{ $product_graphics_cards->links() }}
                            </div>
                        </div>
                    @else
                        <p class="lead text-center">No Compatible Graphics Cards</p>
                    @endif
                </div>
            </div>
        </div>
    </section>

@endsection
