<!DOCTYPE html>
<html lang="en">

<head>
    @include('layouts.backend.partials.head')
</head>

<body class="app sidebar-mini">
    <!-- Navbar-->
    @include('layouts.backend.partials.header')
    <!-- Sidebar menu-->
    @include('layouts.backend.partials.sidebar')
    <main class="app-content">
        @yield('content')
    </main>
    @include('layouts.backend.partials.footer')

</body>

</html>
