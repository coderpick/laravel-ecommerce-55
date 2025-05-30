@extends('layouts.backend.master')
@section('title', 'Category Create')
@section('content')
    <div class="app-title">
        <div>
            <h1><i class="bi bi-speedometer"></i> Brand</h1>
            <p>Start a beautiful journey here</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="bi bi-house-door fs-6"></i></li>
            <li class="breadcrumb-item"><a href="#">Brand</a></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <h4 class="card-title mb-0">Add Brand</h4>
                        </div>
                        <div class="col-md-6 text-end">
                            <div class="tile-title-w-btn">
                                <a href="{{ route('admin.brand.index') }}" class="btn btn-warning"><i
                                        class="bi bi-arrow-left"></i> Back to list</a>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="card-body">

                    <form action="{{ route('admin.brand.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-8">
                                <div class="mb-3">
                                    <label for="name">Brand Name</label>
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
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="logo">Brand Logo</label>
                                    <input type="file" name="logo" id="logo" class="form-control dropify">
                                    @error('logo')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/dropify@0.2.2/dist/css/dropify.min.css">
@endpush


@push('js')
    <script src="https://cdn.jsdelivr.net/npm/dropify@0.2.2/dist/js/dropify.min.js"></script>
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

        // dropify js active
        $('.dropify').dropify();
    </script>
@endpush
