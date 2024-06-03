<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Hospital Portal</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <link href="{{ asset('https://fonts.googleapis.com/css?family=Roboto:100,300,400,700,900') }}" rel="stylesheet">

    <link rel="stylesheet" href=" {{ url('public/patient/css/bootstrap.min.css') }}">

    <link rel="stylesheet" href="{{ url('public/patient/css/font-awesome.min.css') }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <link rel="stylesheet" href="{{ url('patient/css/meanmenu.min.css') }}">

    <link rel="stylesheet" href="{{ url('public/sidebar/styletwo.css') }}">
    <link rel="stylesheet" href="{{ url('public/sidebar/stylethree.css') }}">
    <link rel="stylesheet" href="{{ url('public/sidebar/responsive.css') }}">

    <link rel="stylesheet" href="{{ url('public/patient/css/main.css') }}">
    <link rel="stylesheet" href="{{ url('public/patient/css/custom.css') }}">

    <link rel="stylesheet" href="{{ url('public/patient/css/scrollbar/jquery.mCustomScrollbar.min.css') }}">

    {{-- <link rel="stylesheet" href="{{ asset('patient/style.css') }}"> --}}

    {{-- <link rel="stylesheet" href="{{ asset('patient/css/responsive.css') }}"> --}}

    <script src="{{ url('public/patient/js/vendor/modernizr-2.8.3.min.js') }}"></script>

    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" />
</head>

<body>
    @yield('sidebar')
    <div class="all-content-wrapper">
        @yield('navbar')

        @yield('content')

    </div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script src="{{ url('public/patient/js/carousel-main.js') }}"></script>
    <script src="{{ url('public/patient/js/vendor/jquery-1.12.4.min.js') }}"></script>
    <script src="{{ url('public/patient/js/bootstrap.min.js') }}"></script>
    <script src="{{ url('public/patient/js/owl.carousel.min.js') }}"></script>
    <script src="{{ url('public/patient/js/scrollbar/jquery.mCustomScrollbar.concat.min.js') }}"></script>
    <script src="{{ url('public/patient/js/scrollbar/mCustomScrollbar-active.js') }}"></script>
    <script src="{{ url('public/patient/js/metisMenu/metisMenu.min.js') }}"></script>
    <script src="{{ url('public/patient/js/metisMenu/metisMenu-active.js') }}"></script>
    <script src="{{ url('public/patient/js/morrisjs/raphael-min.js') }}"></script>


    @yield('js_code')

    <script>

        function show_parts(no) {
            var id = 'side-bar-' + no;

            var nodeList = document.querySelectorAll('nav .side-bar-anchor-selected');
            for (let i = 0; i < nodeList.length; i++) {
                nodeList[i].classList.remove('selected');
            }
            document.getElementById(id).classList.add('selected');

            var id2 = 'nav-list-' + no;
            var nodeList2 = document.querySelectorAll('.inner-nav .nav-list');
            for (let i = 0; i < nodeList2.length; i++) {
                nodeList2[i].classList.remove('visible');
            }
            document.getElementById(id2).classList.add('visible');

        }
    </script>

</body>

</html>
