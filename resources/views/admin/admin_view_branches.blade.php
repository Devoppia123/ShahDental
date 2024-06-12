@extends('layouts.admin_template')

@section('sidebar')
    @include('admin.include.sidebar')
@endsection

@section('navbar')
    @include('admin.include.navbar')
@endsection

@section('content')
    <div class="container-fluid">
        <div class="staff-list-main-sec">
            <a class="btn btn-primary btn-sm mb-3" href="{{ url('/admin/add_branch') }}">Add Branch</a>
            <div class="table-responsive">
                <table class="table" id="app_table">
                    <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Name</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($branches as $branch)
                            <tr>
                                <td>{{ $branch->id }}</td>
                                <td>{{ $branch->branch_name }}</td>
                                <td>
                                    {{-- <a href="{{ "/admin/delete_branch/$branch->id" }}">Delete</a> --}}
                                    <a href="{{ "/admin/delete_branch/$branch->id" }}" class="btn btn-primary">Delete</a>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>

        </div>
    </div>
@endsection
