@extends('layouts.master')
@section('content')
    @include('layouts.subheader')
    <div class="container">
        <div class="d-sm-flex my-2 justify-content-between align-items-center">
            <div class="h1">
                <i class="bi bi-cpu-fill"></i>
                <small> CPU</small>
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
                                <th>CPU Socket</th>
                                <th>Base Clock</th>
                                <th>Store</th>
                                <th>Price</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($product_cpus as $product_cpu)
                                <tr>
                                    <td>
                                        @if(isset($product_cpu->component->image_path))
                                            <img
                                                src="{{ asset('images/components/cpus/' . $product_cpu->component->image_path) }}"
                                                class="img-thumbnail img-fluid" style="height: 50px; width: 50px" alt="">
                                        @endif
                                    </td>
                                    <td>{{ $product_cpu->component->name }}</td>
                                    <td>{{ $product_cpu->component->cpu->cpu_socket ?? null }}</td>
                                    <td>{{ $product_cpu->component->cpu->base_clock ?? null }}</td>
                                    <td>{{ $product_cpu->store->name }}</td>
                                    <td>{{ $product_cpu->price }}</td>
                                    <td>
                                        <form action="{{ route('add_product', $product_cpu) }}" method="post">
                                            @csrf
                                            <button type="submit" class="btn btn-primary">Add</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="d-flex justify-content-center">
                            {{ $product_cpus->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
