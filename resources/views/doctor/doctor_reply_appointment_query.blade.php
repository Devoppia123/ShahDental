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
            <h1>Reply Appointment Query</h1>
            @foreach ($bookings_combined as $list)
                {{-- <form method="post" action="{{ url("/admin/doreply_appointment_query/$list->booking_id") }}"> --}}
                <form method="post" action="{{ url("/doctor/doreply_appointment_query/$list->booking_id") }}" id="appointment_query">
                    @csrf
                    <div class="form-group">
                        <label></label>
                        @if (isset($list->patient_name))
                            <h5>{{ $list->patient_name }}</h5>
                        @else
                            <h5>{{ $list->patient_name }}</h5>
                        @endif

                        @if (isset($list->patient_email))
                            <h5>{{ $list->patient_email }}</h5>
                        @else
                            <h5>{{ $list->patient_email }}</h5>
                        @endif
                        <h4> Question : <span
                                style="font-weight: 400; font-size:15px;">{{ $list->appointment_reason }}</span>
                        </h4>
                    </div>
                    <div class="form-group">
                        <label>Reply Query : </label>
                        <textarea class="form-control" name="reply" id="reply" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            @endforeach
        </div>
    </div>
@endsection

