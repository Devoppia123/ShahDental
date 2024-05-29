@extends('layouts.staff_template')

@section('sidebar')
    @include('nurse.include.manage_doctor_sidebar')
@endsection

@section('navbar')
    @include('nurse.include.nav_bar_new')
@endsection

@section('content')
    <div class="main-cont-wrapper">
        <div class="container-fluid">
            <h1>Reply Appointment Query</h1>
            @foreach ($bookings_combined as $list)
                <form method="post" action="{{ url("/nurse/doreply_appointment_query/$doctor_id/$list->booking_id") }}">
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
                        <textarea class="form-control" name="reply"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            @endforeach
        </div>
    </div>
@endsection
