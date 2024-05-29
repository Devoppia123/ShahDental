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
            <a class="btn btn-primary"
                href="{{ url("/admin/change_schedule_date/$schedule_id/$month/$year/$doctor_id") }}">Change Appointment
                Date</a>
            <div class="mt-3">
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
                                            href="{{ url("/admin/book_appointment/$slot->slot_id/$doctor_id") }}">Book
                                            Appointment</a>
                                    </td>
                                @else
                                    <td>
                                        <a class="btn btn-success"
                                            href="{{ url("/admin/view_appointment_details/$slot->slot_id") }}">View
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
    </div>
@endsection
