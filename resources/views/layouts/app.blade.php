<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Apple Shop</title>
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <!-- Add the slick-theme.css if you want default styling -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/slick.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">

    {{-- axios  --}}
    <script type="text/javascript" src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/axios.min.js') }}"></script>
</head>

<body>

    @include('layouts.partials.preloader')

    @if (!Request::url('/Login'))
        <!-- =====================topbar start===================== -->
        @include('layouts.partials.navbar-top')
        <!-- =====================topbar end===================== -->
    @endif
    <!--==================== navbar start ====================-->
    @include('layouts.partials.navbar')
    <!--==================== navbar end ====================-->

    <main>
        @yield('content')
    </main>

    @if (!Request::url('/Login'))
        @include('layouts.partials.footer')

        @include('layouts.partials.bottom-footer')
    @endif


    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <!-- <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script> -->
    <script type="text/javascript" src="{{ asset('assets/js/slick.min.js') }}"></script>

    <script>
        function loaderShow()
        {
            document.querySelector(".preloader").classList.remove('loaded');
            document.querySelector(".preloader").classList.add('d-block');
        }
        function loaderHide()
        {
            document.querySelector(".preloader").classList.add('loaded');
            document.querySelector(".preloader").classList.remove('d-block');
        }
    </script>

</body>

</html>
