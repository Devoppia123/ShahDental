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
            <a class="btn btn-primary btn-sm mb-3" href="{{ url('/admin/add_session') }}">Add Session</a>
            <div class="table-responsive">
                <table class="table" id="app_table">
                    <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Session</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($sessions as $session)
                            <tr>
                                <td>{{ $session->id }}</td>
                                @if ($session->start_time == null && $session->end_time == null)
                                    <td>{{ $session->session_name }}
                                    @else
                                    <td>{{ $session->session_name . ' ( ' . $session->start_time . ' - ' . $session->end_time . ' ) ' }}
                                @endif
                                </td>
                                <td>
                                    <a href="{{ "/admin/delete_session/$session->id" }}">Delete</a>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>

        </div>
    </div>
@endsection
