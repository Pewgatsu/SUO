@extends('layouts.master')
@section('content')
    @include('layouts.subheader')
    <div class="container">
        <div class="d-sm-flex my-2 justify-content-between align-items-center">
            <div class="h1">
                <i class="fas fa-hdd"></i>
                <small> Storage</small>
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
                                <th>Capacity</th>
                                <th>Store</th>
                                <th>Price</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($product_storages as $product_storage)
                                <tr>
                                    <td>
                                        @if(isset($product_storage->component->image_path))
                                            <img
                                                src="{{ asset('images/components/storages/' . $product_storage->component->image_path) }}"
                                                class="img-thumbnail img-fluid" style="height: 50px; width: 50px" alt="">
                                        @endif
                                    </td>
                                    <td>{{ $product_storage->component->name }}</td>
                                    <td>{{ $product_storage->component->storage->storage_type ?? null }}</td>
                                    <td>{{ $product_storage->component->storage->storage_capacity ?? null }}</td>
                                    <td>{{ $product_storage->store->name }}</td>
                                    <td>{{ $product_storage->price }}</td>
                                    <td>
                                        <form action="{{ route('add_product', $product_storage) }}" method="post">
                                            @csrf
                                            <button type="submit" class="btn btn-primary">Add</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="d-flex justify-content-center">
                            {{ $product_storages->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
