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
            <table class="table" id="app_table">
                <thead>
                    <tr>
                        <th>Slots Id</th>
                        <th>Start Time</th>
                        <th>End Time</th>
                        <th>Doctor Name</th>
                        <th>Details</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($slots as $slot)
                        <tr>
                            <td>{{ $slot->slot_id }}</td>
                            <td>{{ $slot->slot_start_time }}</td>
                            <td>{{ $slot->slot_end_time }}</td>
                            <td>{{ $slot->doctor_name }}</td>
                            @if ($slot->booking_id == null)
                                <td>
                                    <a class="btn btn-warning"
                                        href="{{ url("/doctor/book_appointment/$slot->slot_id") }}">Book
                                        Appointment</a>
                                </td>
                            @else
                                <td>
                                    <a class="btn btn-success"
                                        href="{{ url("/doctor/view_appointment_details/$slot->slot_id") }}">View
                                        Details
                                    </a>
                                </td>
                            @endif
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
