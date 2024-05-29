<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Shah Dental Admin</title>
    @section('header')
        <link
            href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
            rel="stylesheet">
        <script src="https://code.jquery.com/jquery-3.7.0.min.js"
            integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css" />
        <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>

        {{-- <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css"> --}}
        <link href="{{ url('public/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
        {{-- <link rel="stylesheet" href="{{ asset('css/sb-admin-2.min.css') }}"> --}}
        <link rel="stylesheet" href="{{ url('public/css/sb-admin-2.min.css') }}">
    @show
</head>

<body id="page-top">

    <div id="wrapper">

        @yield('sidebar')

        <div id="content-wrapper" class="d-flex flex-column">

            <div id="content">

                @yield('navbar')

                @yield('content')

            </div>

        </div>

    </div>

    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Are you sure want to logout.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="{{ url('/admin_logout') }}">Logout</a>
                </div>
            </div>
        </div>
    </div>

    @section('footer')
        <script>
            $(document).ready(function() {
                let table = new DataTable('#app_table', {
                    responsive: true
                });
            });
        </script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        {{-- <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script> --}}
        <script src="{{ url('public/vendor/jquery/jquery.min.js') }}"></script>
        <script src="{{ url('public/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ url('public/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

        {{-- <script src="{{ asset('js/sb-admin-2.min.js') }}"></script> --}}
        <script src="{{ url('public/js/sb-admin-2.min.js') }}"></script>
        @yield('scripts')
    @show

    @yield('js_code')

</body>

</html>
