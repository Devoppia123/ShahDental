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
            <h1>Reply Appointment Query</h1>
            @foreach ($bookings_combined as $list)
                <form method="post" action="{{ url("/admin/doreply_appointment_query/$list->booking_id") }}">
                    @csrf
                    <input type="hidden" name="doctor_id" value="{{ $doctor_id }}">
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
