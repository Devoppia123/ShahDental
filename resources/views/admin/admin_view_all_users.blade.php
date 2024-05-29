@extends('layouts.admin_template')
@section('sidebar')
    @include('admin.include.sidebar')
@endsection
@section('navbar')
    @include('admin.include.navbar')
@endsection
@section('content')
    <div class="main-cont-wrapper">
        <div class="container-fluid">
            <h1>View All Patient</h1>
            <table class="table" id="app_table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->patient_id }}</td>
                            <td>{{ $user->patient_name }}</td>
                            <td>{{ $user->patient_email }}</td>
                            <td><a href="{{ url("/admin/assign_roles/$user->patient_id") }}" class="btn btn-info">Assign
                                    Roles</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
