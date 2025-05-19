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
                            <h4 class="card-title mb-0">Add Category</h4>
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

                    <form action="{{ route('admin.sub_category.store') }}" method="post">
                        @csrf
                         <div class="mb-3">
                            <label for="category">Select Category</label>
                            <select name="category" id="category" class="form-control">
                                <option value="">Select Category</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="name">Sub Category Name</label>
                            <input type="text" name="name" id="name" class="form-control"
                                value="{{ old('name') }}">
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="slug">Slug </label>
                            <input type="text" name="slug" id="slug" class="form-control"
                                value="{{ old('slug') }}">
                            @error('slug')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3 text-center">
                            <button type="submit" class="btn btn-primary"><i class="bi bi-save me-1"></i> Save</button>
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
