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
            <table class="table">
                <thead>
                    <tr>
                        <th>Patient Id</th>
                        <th>Patient Name</th>
                        <th>Chat With Patient</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($appointment_patients as $show)
                        <tr>
                            <td>{{ $show->patient_id }}</td>
                            <td>{{ $show->name }}</td>
                            <td>
                                @if ($chat_status[$show->patient_id])
                                    <a href="{{ url('/doctor/chat_with_patient/' . $chat_status[$show->patient_id]) }}"
                                        class="btn btn-success">
                                        Chat With Patient
                                    </a>
                                @else
                                    <a href="{{ url("/doctor/start_chat/$show->id") }}" class="btn btn-success">
                                        Start Chat
                                    </a>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
