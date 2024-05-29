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
            <h1>View All Questions</h1>
            <table class="table" id="app_table">
                <thead>
                    <tr>
                        <th>Doctor Name</th>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Subject</th>
                        <th>Message</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($question as $ques)
                        <tr>
                            <td>{{ $ques->doctor_name }}</td>
                            <td>{{ $ques->name }}</td>
                            <td>{{ $ques->phone }}</td>
                            <td>{{ $ques->email }}</td>
                            <td>{{ $ques->subject }}</td>
                            <td>{{ $ques->message }}</td>
                            @if ($ques->reply == null)
                                <td><a href="{{ url("/admin/reply_question/$ques->id") }}" class="btn btn-info">Reply</a></td>
                            @else
                                <td>{{ $ques->reply }}</td>
                            @endif
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
            $('#view_questions').DataTable();
        });
    </script>
@endsection
