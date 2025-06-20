<meta charset="utf-8" />
<meta http-equiv="x-ua-compatible" content="ie=edge" />
<title>@yield('title'):: Shop Grid</title>
<meta name="description" content="" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<link rel="shortcut icon" type="image/x-icon" href="assets/images/favicon.svg" />

<!-- ========================= CSS here ========================= -->
<link rel="stylesheet" href="{{ asset('assets/frontend/css/bootstrap.min.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/frontend/css/LineIcons.3.0.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/frontend/css/tiny-slider.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/frontend/css/glightbox.min.css') }}" />
@stack('css')
<link rel="stylesheet" href="{{ asset('assets/frontend/css/main.css') }}" />
@stack('custom_css')
