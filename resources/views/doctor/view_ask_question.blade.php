@extends('layouts.doctor_template')

@section('navbar')
    @include('doctor.include.nav_bar_new')
@endsection

@section('sidebar')
    @include('doctor.include.sidebar_new')
@endsection

@section('content')
    <div class="main-cont-wrapper">
        <div class="container-fluid">
            <div class="view-question-inner">
                <table class="table" id="app_table">
                    <thead>
                        <tr>
                            <th>Doctor Name</th>
                            <th>Patient Name</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>Subject</th>
                            <th>Message</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($questions as $question)
                            <tr>
                                <td>{{ $question->doctor_name }}</td>
                                <td>{{ $question->name }}</td>
                                <td>{{ $question->phone }}</td>
                                <td>{{ $question->email }}</td>
                                <td>{{ $question->subject }}</td>
                                <td>{{ Str::limit($question->message, 50) }}</td>
                                @if ($question->reply == null)
                                    <td>
                                        <a href="{{ url("/doctor/reply_question/$question->id") }}" class="btn btn-info">
                                            Reply
                                        </a>
                                    </td>
                                @else
                                    <td>{{ $question->reply }}</td>
                                @endif
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
