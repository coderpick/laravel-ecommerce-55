<title>@yield('title') | Dashboard</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Main CSS-->
<link rel="stylesheet" type="text/css" href="{{ asset('assets/backend/css/main.css') }}">
<!-- Font-icon css-->
<link rel="stylesheet" type="text/css"
    href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    {{-- custom css --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/backend/css/custom.css') }}">

@stack('css')
@stack('custom_css')
