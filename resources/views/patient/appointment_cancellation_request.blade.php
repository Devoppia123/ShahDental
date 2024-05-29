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
            <h3 class="text-center">Appointment Cancellation Request</h3>
            <div class="row" style="margin: 20px">
                <form action="{{ url('/submit_cancellation_request') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label>Appointment Booking Id</label>
                        <input type="text" name="booking_id" class="form-control" value="{{ $booking_id }}" readonly>
                    </div>
                    <div class="form-group">
                        <label>Appointment Booking Id</label>
                        <textarea name="reason" class="form-control">
@foreach ($appointment as $show)
Dear {{ $show->doctor_name }},

I am writing to cancel our appointment on {{ $show->schedule_date }} / {{ $show->start_time . ' - ' . $show->end_time }}. Unfortunately, I have encountered an unexpected situation that requires my immediate attention.

I apologize for any inconvenience this may cause, and I hope to reschedule the appointment at a later time that is convenient for both of us.

Thank you for your understanding.

Sincerely,
{{ $show->patient_name }}
@endforeach
</textarea>
                    </div>
                    <button type="submit" class="btn btn-info">Submit</button>
                </form>
            </div>
        </div>
    @endsection
