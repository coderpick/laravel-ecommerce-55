@extends('layouts.backend.master')
@section('title', 'Product Create')
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
            <div class="card">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <h4 class="card-title mb-0">Add Product</h4>
                        </div>
                        <div class="col-md-6 text-end">
                            <div class="tile-title-w-btn">
                                <a href="{{ route('admin.product.index') }}" class="btn btn-warning"><i
                                        class="bi bi-arrow-left"></i> Back to list</a>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="card-body">

                    <form action="{{ route('admin.product.update', $product->id) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-8">
                                <h5>Product Information</h5>
                                <hr>
                                <div class="mb-3">
                                    <label for="name" class="form-label">Product Name</label>
                                    <input type="text" name="name" id="name" class="form-control" required
                                        value="{{ $product->name ?? old('name') }}">
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="slug" class="form-label">Slug </label>
                                    <input type="text" name="slug" id="slug" class="form-control" required
                                        value="{{ $product->slug ?? old('slug') }}">
                                    @error('slug')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="short_description" class="form-label">Short Description</label>
                                    <textarea name="short_description" id="short_description" rows="4" class="form-control" required>{{ $product->short_description ?? old('short_description') }}</textarea>
                                    @error('short_description')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="description" class="form-label">Description</label>
                                    <textarea name="description" id="description" rows="6" class="form-control" required>{{ $product->description ?? old('description') }}</textarea>
                                    @error('description')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="price" class="form-label">Price</label>
                                            <input type="number" name="price" id="price" min="0" required
                                                class="form-control" value="{{ $product->price ?? old('price') }}">
                                            @error('price')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="quantity" class="form-label">Quantity</label>
                                            <input type="number" name="quantity" min="0" id="quantity" required
                                                class="form-control" value="{{ $product->stock ?? old('quantity') }}">
                                            @error('quantity')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="discount" class="form-label">Discount</label>
                                            <input type="number" name="discount" id="discount" min="0" 
                                                class="form-control" value="{{ $product->discount ?? old('discount') }}">
                                            @error('discount')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="discount_price" class="form-label">Discount Price</label>
                                            <input type="number" name="discount_price" min="0" id="discount_price"
                                                 class="form-control"
                                                value="{{ $product->discount_price ?? old('discount_price') }}">
                                            @error('discount_price')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                            </div> {{-- col-md-8 end --}}
                            <div class="col-md-4">
                                <h5>Category, Brand and Image</h5>
                                <hr>
                                <div class="mb-3">
                                    <label class="form-label" for="category">Category</label>
                                    <select name="category" id="category" class="form-control" required>
                                        <option value="" disabled selected>Select Category</option>
                                        @foreach ($categories as $category)
                                            <option @selected($product->category_id == $category->id) value="{{ $category->id }}">
                                                {{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('category')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="sub_category">Sub Category</label>
                                    <select name="sub_category" id="sub_category" class="form-control">
                                        <option value="" disabled selected>Select Sub Category</option>
                                        @foreach ($subCategories as $sub_category)
                                            <option @selected($product->sub_category_id == $sub_category->id) value="{{ $sub_category->id }}">
                                                {{ $sub_category->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('sub_category')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="brand">Select Brand</label>
                                    <select name="brand" id="brand" class="form-control" required>
                                        <option value="" disabled selected>Select Brand</option>
                                        @foreach ($brands as $brand)
                                            <option @selected($product->brand_id == $brand->id) value="{{ $brand->id }}">
                                                {{ $brand->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('brand')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="feature_image" class="form-label">Product Feature Image</label>
                                    <input type="file" name="feature_image" id="feature_image" accept="image/*"
                                        data-default-file="{{ asset($product->feature_image) }}" 
                                        class="form-control dropify">
                                    @error('feature_image')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="image" class="form-label">Product Images</label>
                                    <input type="file" name="images[]" id="image" multiple class="form-control"
                                        accept="image/*">
                                    @error('images')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror

                                    <div>
                                        <small class="d-block">Old Images</small>
                                        @forelse ($product->productImages as  $key => $value)
                                            <img style="width: 30px; height: 30px; display: inline-block;margin-right: 5px" src="{{ asset($value->image) }}" alt="">
                                        @empty
                                        @endforelse
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label d-block">Is Featured:</label>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="is_featured" id="yes"
                                            @checked($product->is_featured == true) required value="1">
                                        <label class="form-check-label" for="yes">Yes</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="is_featured" id="no"
                                            @checked($product->is_featured == false) value="0">
                                        <label class="form-check-label" for="no">No</label>
                                    </div>
                                    @error('is_featured')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label d-block">Status:</label>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="status" id="published"
                                            @checked($product->status == true) required value="1">
                                        <label class="form-check-label" for="published">Published</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="status" id="draft"
                                            @checked($product->status == false) value="0">
                                        <label class="form-check-label" for="draft">Draft</label>
                                    </div>
                                    @error('status')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="mb-3 text-center">
                            <button type="submit" class="btn btn-primary"><i class="bi bi-save me-1"></i>
                                Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/dropify@0.2.2/dist/css/dropify.min.css">
    <!-- include summernote css -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.css">
@endpush

@push('js')
    {{-- <script src="https://cdn.jsdelivr.net/npm/dropify@0.2.2/dist/js/dropify.min.js"></script> --}}
    <script src="{{ asset('assets/backend/vendor/dropify/src/js/dropify.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.js"></script>
@endpush

@push('custom_js')
    <script>
        $(document).ready(function() {

            function slugify(text) {
                return text.toString().toLowerCase()
                    .replace(/\s+/g, '-') // Replace spaces with -
                    .replace(/[^\w\-]+/g, '') // Remove all non-word chars
                    .replace(/\-\-+/g, '-') // Replace multiple - with single -
                    .replace(/^-+/, '') // Trim - from start of text
                    .replace(/-+$/, ''); // Trim - from end of text
            }

            $("#name").keyup(function() {
                var Text = $(this).val();
                $("#slug").val(slugify(Text));
            })


            /* summernote active */
            $('#description').summernote({
                placeholder: 'Write product description.....',
                tabsize: 2,
                height: 200,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'underline', 'clear']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['table', ['table']],
                    ['insert', ['link', 'picture']],
                    ['view', ['fullscreen', 'codeview', 'help']]
                ]
            });
            // dropify js active
            $('.dropify').dropify();
        });

        $("#price").on('keyup', function() {
            let price = $(this).val();
            if (price > 0) {
                $("#discount").attr('disabled', false);
                $("#discount_price").attr('disabled', false);
            } else {
                $("#discount").attr('disabled', true).val('');
                $("#discount_price").attr('disabled', true).val('');
            }

        })
        /* discount calculate */
        $("#discount").on('keyup', function() {
            let discount = $(this).val();
            let price = $("#price").val();
            let total_price = (price - (price * discount / 100));
            console.log(total_price);
            $("#discount_price").val(total_price);
        })

        /* get sub category by category */
        $("#category").on('change', function() {

            let category_id = $(this).val();
            $("#sub_category").html('');

            $.ajax({
                url: "{{ route('admin.getSubCategory') }}",
                type: "POST",
                data: {
                    category_id: category_id,
                    _token: "{{ csrf_token() }}",
                },
                success: function(response) {

                    if (response.status == false) {
                        var notyf = new Notyf();
                        notyf.error(response.message);
                        return false;
                    } else {
                        var notyf = new Notyf();
                        notyf.success('Sub Category Load!');
                        $("#sub_category").html(response);
                    }
                }
            })
        })
    </script>
@endpush
