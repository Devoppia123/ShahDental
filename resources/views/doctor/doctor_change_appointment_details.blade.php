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
            <div class="row">
                @foreach ($details as $show)
                    <p>Doctor Name : {{ $show->doctor_name }}</p>
                    <p>Patient Name : {{ $show->patient_name }}</p>
                    <p>Patient Phone : {{ $show->patient_phone }}</p>
                    <p>Current Schedule Date : {{ $show->schedule_date }}</p>
                    <p>Clinic / Online : {{ $show->mode }}</p>
                    <p>Current Slot Timing : {{ $show->start_time . ' - ' . $show->end_time }}</p>
                    <p>Suggest Dates : {{ $show->from_date . ' - ' . $show->to_date }}</p>
                    <p>Change Apoointment Reason : <br> {!! $show->reason !!}</p>
                    <a href="{{ url("/doctor/change_appointment_date/$show->booking_id") }}" class="btn btn-success">Change
                        Appointment
                        Date</a>
                @endforeach
            </div>
        </div>
    </div>
@endsection
