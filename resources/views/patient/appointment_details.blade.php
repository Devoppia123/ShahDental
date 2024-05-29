@extends('layouts.patient_new_template')

@section('sidebar')
    @include('patient.include.sidebar_new')
@endsection

@section('navbar')
    @include('patient.include.nav_bar_new')
@endsection

@section('content')
    <div class="main-cont-wrapper">
        <div class="container-fluid">
            <div class="row">
                @foreach ($appointment as $show)
                    <p>Booking Id : {{ $show->booking_id }}</p>
                    <p>Doctor Name : {{ $show->doctor_name }}</p>
                    <p>Patient Name : {{ $show->patient_name }}</p>
                    <p>Schedule Date : {{ $show->schedule_date }}</p>
                    <p>Clinic / Online : {{ $show->mode }}</p>
                    <p>Slot Timing : {{ $show->start_time . ' - ' . $show->end_time }}</p>
                    @if ($check == null)
                        <a href="{{ url("/appointment_cancellation_request/$show->booking_id") }}"
                            class="btn btn-danger">Appointment Cancellation Request</a>
                    @elseif ($check->status == 2)
                        <p>Cancel</p>
                    @else
                        <p>Pending</p>
                    @endif
                    @if ($change == null)
                        <a class="btn btn-info" href="{{ url("/change_appointment_request/$show->booking_id") }}">Change
                            Appointment Date</a>
                    @elseif ($change->answer != null)
                        <p>Cancel</p>
                    @else
                        <p>Pending</p>
                    @endif
                    @if ($ischat != null)
                        <a href="{{ url("/chat_with_doctor/$ischat->id") }}" class="btn btn-success">Chat
                            with your doctor</a>
                    @else
                        <a href="{{ url("/create_chat_with_doctor/$show->doctor_id") }}" class="btn btn-success">Chat
                            with your doctor</a>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
@endsection
