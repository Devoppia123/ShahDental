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
            <h3 class="text-center">Change Appointment Request</h3>
            <div class="row" style="margin: 20px">
                <form action="{{ url('/submit_change_request') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label>Appointment Booking Id</label>
                        <input type="text" name="booking_id" class="form-control" value="{{ $booking_id }}" readonly>
                    </div>
                    <div class="form-group">
                        <label>From Date</label>
                        <input type="date" name="from_date" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>To Date</label>
                        <input type="date" name="to_date" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Change Appointment Request</label>
                        <textarea name="reason" class="form-control">
@foreach ($appointment as $show)
Dear {{ $show->doctor_name }},

I am writing to request a change in our scheduled appointment from {{ $show->schedule_date }} / {{ $show->start_time . ' - ' . $show->end_time }} to new date . Unfortunately, i wont be able to come. I am hoping we can find a mutually convenient time to reschedule.

Please let me know if [new date and time] would work for you. If not, please suggest a few other dates and times that would be convenient for you.

Thank you for your cooperation in this matter.

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
