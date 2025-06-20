@extends('layouts.backend.master')
@section('title', 'Product')
@section('content')
    <div class="app-title">
        <div>
            <h1><i class="bi bi-speedometer"></i> Product</h1>
            <p>Start a beautiful journey here</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="bi bi-house-door fs-6"></i></li>
            <li class="breadcrumb-item"><a href="#">Product</a></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <h4 class="card-title mb-0">Products</h4>
                        </div>
                        <div class="col-md-6 text-end">
                            <div class="tile-title-w-btn">
                                <a href="{{ route('admin.product.create') }}" class="btn btn-primary"><i
                                        class="bi bi-plus"></i> Create New Product</a>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered" id="sampleTable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Category</th>
                                    <th>Brand</th>
                                    <th>Price</th>
                                    <th>Stock</th>
                                    <th>Is Feature</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($products as $key => $product)
                                    <tr>
                                        <td class="text-center">{{ $loop->iteration }}</td>
                                        <td>
                                            <img src="{{ asset($product->feature_image) }}" loading="lazy" width="50"
                                                alt="">
                                        </td>
                                        <td>{{ $product->name }}</td>
                                        <td>{{ $product->category?->name }}</td>
                                        <td>{{ $product->brand?->name }}</td>
                                        <td>
                                            @if ($product->discount > 0 && $product->discount_price != null)
                                                {{ $product->discount_price }}Tk. ({{ $product->discount }}% off)
                                                <br> <del>{{ $product->price }}Tk</del>
                                            @else
                                                {{ $product->price }}Tk.
                                            @endif
                                        </td>
                                        <td>{{ $product->stock }}</td>
                                        <td>
                                            @if ($product->is_featured == true)
                                                <span class="me-1 badge bg-primary">Featured</span>
                                            @else
                                                <span class="me-1 badge bg-danger">Not Featured</span>
                                            @endif
                                        </td>
                                        <td class="text-center">

                                            <a href="{{ route('admin.product.show', $product->id) }}"
                                                class="btn btn-info"><i class="bi bi-eye"></i>
                                            </a>

                                            <a href="{{ route('admin.product.edit', $product->id) }}"
                                                class="btn btn-success"><i class="bi bi-pencil-square"></i></a>

                                            <form action="{{ route('admin.product.destroy', $product->id) }}"
                                                method="post" class="d-inline-block">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" onclick="return confirm('Are you sure?')"
                                                    class="btn btn-danger"><i class="bi bi-trash3"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                @endforelse

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('css')
    <link rel="stylesheet" href="{{ asset('assets/backend/js/plugins/dataTables.bootstrap5.css') }}">
@endpush


@push('js')
    <!-- Data table plugin-->
    <script type="text/javascript" src="{{ asset('assets/backend/js/plugins/dataTables.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/backend/js/plugins/dataTables.bootstrap5.js') }}"></script>
@endpush

@push('custom_js')
    <script type="text/javascript">
        $('#sampleTable').DataTable();
    </script>
@endpush
