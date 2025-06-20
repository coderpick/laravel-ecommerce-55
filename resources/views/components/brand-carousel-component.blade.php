<div class="brands">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3 col-md-12 col-12">
                <h2 class="title">Popular Brands</h2>
            </div>
        </div>
        <div class="brands-logo-wrapper">
            <div class="brands-logo-carousel d-flex align-items-center justify-content-between">
                @forelse ($brands as  $key => $brand)
                    <div class="brand-logo">
                        <img src="{{ asset($brand->logo) }}" alt="#" title="{{ $brand->name }}">
                    </div>
                @empty
                @endforelse


            </div>
        </div>
    </div>
</div>
