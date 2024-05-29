<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Shah Dental</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700,900" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('public/patient/css/bootstrap.min.css') }}">

    <link rel="stylesheet" href="{{ asset('public/patient/css/font-awesome.min.css') }}">

    <link rel="stylesheet" href="{{ asset('public/patient/css/meanmenu.min.css') }}">

    <link rel="stylesheet" href="{{ asset('public/patient/css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('public/patient/css/custom.css') }}">
    <link rel="stylesheet" href="{{ asset('public/patient/css/scrollbar/jquery.mCustomScrollbar.min.css') }}">

    <link rel="stylesheet" href="{{ asset('public/patient/style.css') }}">

    <link rel="stylesheet" href="{{ asset('public/patient/css/responsive.css') }}">

    <script src="{{ asset('patient/js/vendor/modernizr-2.8.3.min.js') }}"></script>

    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" />
    @yield('css')
</head>

<body>
    @yield('content')

    @yield('js')
</body>

</html>
