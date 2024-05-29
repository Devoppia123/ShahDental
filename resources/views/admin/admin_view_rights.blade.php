@extends('layouts.admin_template')
@section('sidebar')
    @include('admin.include.sidebar')
@endsection
@section('navbar')
    @include('admin.include.navbar')
@endsection
@section('content')
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"
        integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css" />
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>
    <div class="main-cont-wrapper">
        <div class="container-fluid">
            <h1>View All Rights</h1>
            <a class="btn btn-primary btn-sm mb-3" href="{{ url('/admin/add_rights') }}">Add Rights</a>
            <table class="table" id="doctor_view_table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Rights</th>
                        <th>Rights For</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($rights as $list)
                        <tr>
                            <td>{{ $list->right_id }}</td>
                            <td>{{ $list->rights_name }}</td>
                            <td>{{ $list->roles }}</td>
                            <td>
                                <a class="btn btn-danger" href="{{ url("/admin/delete_rights/$list->right_id") }}">
                                    Delete
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
@section('js_code')
    <script>
        $(document).ready(function() {
            let table = new DataTable('#doctor_view_table', {
                responsive: true
            });
        });
    </script>
@endsection
