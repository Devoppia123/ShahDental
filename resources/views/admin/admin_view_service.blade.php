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
            <h1>View All Services</h1>
            <table class="table" id="app_table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Service</th>
                        <th>Description</th>
                        <th>Image</th>
                        {{-- <th>Action</th> --}}
                    </tr>
                </thead>
                <tbody>
                    @foreach ($speciality as $sp)
                        <tr>
                            <td>{{ $sp->id }}</td>
                            <td>{{ $sp->speciality }}</td>
                            <td>{!! $sp->description !!}</td>
                            <td><img style="width: 200px" src="{{ url("public/service_image/$sp->image") }}" alt=""></td>
                            {{-- <td><a href="#">Delete</a></td> --}}
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
