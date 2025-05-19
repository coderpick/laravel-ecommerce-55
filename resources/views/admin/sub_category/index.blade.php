@extends('layouts.backend.master')
@section('title', 'Category')
@section('content')
    <div class="app-title">
        <div>
            <h1><i class="bi bi-speedometer"></i> Sub Category</h1>
            <p>Start a beautiful journey here</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="bi bi-house-door fs-6"></i></li>
            <li class="breadcrumb-item"><a href="#">Sub Category</a></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                  <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <h4 class="card-title mb-0"> Sub Category</h4>
                        </div>
                        <div class="col-md-6 text-end">
                            <div class="tile-title-w-btn">
                                <a href="{{ route('admin.sub_category.create') }}" class="btn btn-primary"><i
                                        class="bi bi-plus"></i> Create New </a>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered" id="sampleTable">
                            <thead>
                                <tr>
                                    <th>S.No</th>
                                    <th>Name</th>
                                    <th>Slug</th>
                                    <th>Category</th>
                                    <th>Status</th>
                                    <th>Created at</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($subcategories as $key => $subcategory)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $subcategory->name }}</td>
                                        <td>{{ $subcategory->slug }}</td>
                                        <td>{{ $subcategory->category->name }}</td>
                                        <td>
                                           @if ( $subcategory->status ==true)
                                               <span class="me-1 badge bg-primary">Active</span>
                                               @else
                                               <span class="me-1 badge bg-danger">Inactive</span>
                                           @endif
                                        </td>
                                        <td>
                                            {{ $subcategory->created_at->diffForHumans() }}
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.sub_category.edit', $subcategory->id) }}" class="btn btn-success"><i class="bi bi-pencil-square"></i></a>
                                            <form action="{{ route('admin.sub_category.destroy', $subcategory->id) }}" method="post" class="d-inline-block">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" onclick="return confirm('Are you sure?')" class="btn btn-danger"><i class="bi bi-trash3"></i></button>
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
    <script type="text/javascript" src="{{ asset('assets/backend/js/plugins/dataTables.js')}}"></script>
    <script type="text/javascript" src="{{ asset('assets/backend/js/plugins/dataTables.bootstrap5.js')}}"></script>
@endpush

@push('custom_js')
    <script type="text/javascript">

        $('#sampleTable').DataTable();

    </script>
@endpush
