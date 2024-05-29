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
            <div class="table-responsive">
                <h3>View Appointment Queries</h3>
                <table id="app_table" class="table table-primary">
                    <thead>
                        <tr>
                            <th scope="col">MRN</th>
                            <th scope="col">Patient Name</th>
                            <th scope="col">Appointment Queries</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($bookings_combined as $query)
                            <tr>
                                <td>{{ $query->mrn }}</td>
                                @if (isset($query->patient_name))
                                    <td>{{ $query->patient_name }}</td>
                                @else
                                    <td>{{ $query->patient_name }}</td>
                                @endif
                                <td>{{ Str::limit($query->appointment_reason, 50) }}</td>
                                <td>
                                    @if ($query->reply == null)
                                        <a href="{{ url("/nurse/reply_appointment_query/$doctor_id/$query->booking_id") }}"
                                            class="btn btn-primary">Reply Query</a>
                                    @else
                                        {{ Str::limit($query->reply, 50) }}
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>
@endsection
