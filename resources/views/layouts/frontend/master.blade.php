<!DOCTYPE html>
<html lang="zxx">

<head>
    @include('layouts.frontend.partials.head')
</head>

<body class="js">

    <!-- Preloader -->
    {{-- <div class="preloader">
        <div class="preloader-inner">
            <div class="preloader-icon">
                <span></span>
                <span></span>
            </div>
        </div>
    </div> --}}
    <!-- End Preloader --> 

    <!-- Header -->
    @include('layouts.frontend.partials.header')
    <!--/ End Header -->

     @yield('content')

    <!-- Start Footer Area -->
    @include('layouts.frontend.partials.footer')
    <!-- /End Footer Area -->

    <!-- Jquery -->

    @include('layouts.frontend.partials._script')
</body>

</html>
