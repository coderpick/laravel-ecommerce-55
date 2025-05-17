@extends('layouts.backend.master')
@section('title', 'Category Create')
@section('content')
    <div class="app-title">
        <div>
            <h1><i class="bi bi-speedometer"></i> Category</h1>
            <p>Start a beautiful journey here</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="bi bi-house-door fs-6"></i></li>
            <li class="breadcrumb-item"><a href="#">Category</a></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <h4 class="card-title mb-0">Edit Category</h4>
                        </div>
                        <div class="col-md-6 text-end">
                            <div class="tile-title-w-btn">
                                <a href="{{ route('admin.category.index') }}" class="btn btn-warning"><i
                                        class="bi bi-arrow-left"></i> Back to list</a>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="card-body">

                    <form action="{{ route('admin.category.update', $category->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="name">Category Name</label>
                            <input type="text" name="name" id="name" class="form-control"
                                value="{{ $category->name ?? old('name') }}">
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="slug">Slug </label>
                            <input type="text" name="slug" id="slug" class="form-control"
                                value="{{ $category->slug ?? old('slug') }}">
                            @error('slug')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3 text-center">
                            <button type="submit" class="btn btn-primary"><i class="bi bi-save me-1"></i> Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('css')
@endpush


@push('js')
@endpush

@push('custom_js')
    <script>
        $(document).ready(function() {
            $('#name').on('keyup', function() {
                var Text = $(this).val();
                Text = Text.toLowerCase();
                Text = Text.replace(/[^\w]+/g, '-');
                $('#slug').val(Text);
            });
        });
    </script>
@endpush
