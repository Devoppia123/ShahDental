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
            <h1>View All Doctors</h1>
            <table class="table" id="app_table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Doctor Name</th>
                        <th>Email</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($doctors as $doc)
                        <tr>
                            <td>{{ $doc->doctorID }}</td>
                            <td>{{ $doc->name }}</td>
                            <td>{{ $doc->email }}</td>
                            <td><a href="{{ url("/admin/edit_doctor/$doc->doctorID") }}" class="btn btn-info">Edit</a>
                                <a href="#" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
