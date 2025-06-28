@extends('layouts.frontend.master')
@section('title', 'Cart')
@section('content')
    <!-- Start Breadcrumbs -->
    <div class="breadcrumbs">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="breadcrumbs-content">
                        <h1 class="page-title">Cart</h1>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <ul class="breadcrumb-nav">
                        <li><a href="index.html"><i class="lni lni-home"></i> Home</a></li>
                        <li><a href="index.html">Shop</a></li>
                        <li>Cart</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumbs -->

    <!-- Shopping Cart -->
    <div class="shopping-cart section">
        <div class="container">
            <div class="card">
                <div class="card-body">
                    <table class="table align-middle">
                        <thead>
                            <tr>
                                <th scope="col">Product</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Price</th>
                                <th scope="col">Sub Total</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $total = 0;
                            @endphp
                            @foreach ($cartItems as $key => $item)
                                @php
                                    $total += $item['price'] * $item['quantity'];
                                @endphp
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="flex-shrink-0">
                                                <img src="{{ asset($item['image']) }}" style="width: 80px" alt="...">
                                            </div>
                                            <div class="flex-grow-1 ms-3">
                                                <h6>{{ $item['name'] }}</h6>
                                            </div>
                                        </div>

                                    </td>
                                    <td>
                                        <input type="hidden" name="product_id" value="{{ $key }}">
                                        <div class="d-flex">
                                            <button type="submit" class="btn btn-sm btn-primary btn-decrement"
                                                data-id="{{ $key }}">-</button>
                                            <input type="number" name="quantity" data-id="{{ $key }}"
                                                value="{{ $item['quantity'] }}" class="form-control w-25 mx-2 quantity">
                                            <button type="submit" class="btn btn-sm btn-primary btn-increment"
                                                data-id="{{ $key }}">+</button>
                                        </div>
                                    </td>
                                    <td>${{ $item['price'] }}</td>

                                    <td>${{ $item['price'] * $item['quantity'] }}</td>
                                    <td>
                                        <form action="{{ route('cart.destroy', $key) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <input type="hidden" name="product_id" value="{{ $key }}">
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <!-- Total Amount -->
                    <div class="total-amount">
                        <div class="row">
                            <div class="col-lg-8 col-md-6 col-12">
                                <div class="left">
                                    <div class="coupon">
                                        <form action="#" target="_blank">
                                            <input name="Coupon" placeholder="Enter Your Coupon">
                                            <div class="button">
                                                <button class="btn">Apply Coupon</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-12">
                                <div class="right">
                                    <ul>
                                        <li>Cart Subtotal<span>${{ $total }}</span></li>
                                        <li>Shipping<span>Free</span></li>

                                        <li class="last">You Pay<span>${{ $total }}</span></li>
                                    </ul>
                                    <div class="button">
                                        <a href="checkout.html" class="btn">Checkout</a>
                                        <a href="#" class="btn btn-alt">Continue shopping</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/ End Total Amount -->
                </div>
            </div>

        </div>
    </div>
    <!--/ End Shopping Cart -->
@endsection
@push('js')
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
@endpush
@push('custom_js')
    <script>
        $(document).ready(function() {
            $('.btn-decrement').click(function() {
                var productId = $(this).attr('data-id');
                let quantity = $('.quantity[data-id="' + productId + '"]').val();
                if (quantity > 1) {
                    quantity--;
                }
                $('.quantity[data-id="' + productId + '"]').val(quantity);
                $.ajax({
                    url: "{{ route('cart.update') }}",
                    method: "POST",
                    data: {
                        product_id: productId,
                        quantity_decrement: quantity,
                        _token: "{{ csrf_token() }}"
                    },
                    success: function(response) {
                        // console.log(response);
                        location.reload();
                    }
                })
            });

            $('.btn-increment').click(function() {
                var productId = $(this).attr('data-id');
                let quantity = $('.quantity[data-id="' + productId + '"]').val();
                quantity++;
                $('.quantity[data-id="' + productId + '"]').val(quantity);
                $.ajax({
                    url: "{{ route('cart.update') }}",
                    method: "POST",
                    data: {
                        product_id: productId,
                        quantity_increment: quantity,
                        _token: "{{ csrf_token() }}"
                    },
                    success: function(response) {
                        // console.log(response);
                        location.reload();
                    }
                })
            });
        });
    </script>
@endpush
