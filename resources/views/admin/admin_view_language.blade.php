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
            <h1>View All Languages</h1>
            <table class="table" id="app_table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Languages</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($language as $lang)
                        <tr>
                            <td>{{ $lang->id }}</td>
                            <td>{{ $lang->language }}</td>
                            {{-- <td><a href="#">Delete</a></td> --}}
                            <td><a href="#" class="btn btn-primary">Delete</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
