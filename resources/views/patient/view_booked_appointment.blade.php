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
            <table class="table">
                <thead>
                    <tr>
                        <th>Booking Id</th>
                        <th>Name</th>
                        <th>Doctor Name</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($appointment as $show)
                        @php
                            $scheduleDate = \Carbon\Carbon::parse($show->schedule_date);
                            $today = \Carbon\Carbon::now();
                            $isPast = $scheduleDate->lt($today);
                        @endphp
                        <tr>
                            <td>{{ $show->booking_id }}</td>
                            <td>{{ $show->patient_name }}</td>
                            <td>{{ $show->doctor_name }}</td>
                            <td>
                                @if ($isPast)
                                    Past - {{ $scheduleDate->format('Y-m-d') }}
                                @else
                                    Upcoming - {{ $scheduleDate->format('Y-m-d') }}
                                @endif
                            </td>
                            <td>{{ $show->start_time . ' - ' . $show->end_time }}</td>
                            <td><a href="{{ url("/appointment_details/$show->booking_id") }}"
                                    class="btn btn-success">Details</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
