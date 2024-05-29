@extends('layouts.staff_template')

@section('sidebar')
    @include('nurse.include.manage_doctor_sidebar')
@endsection

@section('navbar')
    @include('nurse.include.nav_bar_new')
@endsection

@section('content')
    @php
        $month = date('m');
        $year = date('Y');
    @endphp
    <div class="main-cont-wrapper" style="margin-right: 15px">
        <div class="container-fluid">
            <div class="set-monthly-heading">
                <h2>Manage <span>Doctors</span> </h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <a href="{{ url("/nurse/set_doctor_schedule/$doctor_id") }}" class="btn btn-info">Set Schedule</a>
            </div>
            <div class="col-md-4">
                <a href="{{ url("/nurse/view_schedule/$month/$year/$doctor_id") }}" class="btn btn-info">View Schedule</a>
            </div>
            <div class="col-md-4">
                <a href="{{ url("/nurse/view_booked_appointment/$doctor_id") }}" class="btn btn-info">View Booked
                    Appointment</a>
            </div>
            <div class="col-md-4">
                <a href="{{ url("/nurse/view_change_appointment_request/$doctor_id") }}" class="btn btn-info"> View Change
                    Appointment Request
                </a>
            </div>
        </div>
    </div>
@endsection
