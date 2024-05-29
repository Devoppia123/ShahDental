@extends('layouts.doctor_template')

@section('navbar')
    @include('doctor.include.nav_bar_new')
@endsection

@section('sidebar')
    @include('doctor.include.sidebar_new')
@endsection
<style>
    .table-responsive::-webkit-scrollbar {
        display: none;
    }
</style>
@section('content')
    <div class="main-cont-wrapper">
        <div class="container-fluid">
            <div class="table-responsive">
                <table class="table table-primary">
                    <thead>
                        <tr>
                            <th scope="col">Patient Name</th>
                            <th scope="col">Change Appointment Reason</th>
                            <th scope="col">Suggest Date</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($all_request as $req)
                            <tr class="">
                                <td> {{ $req->patient_name }}</td>
                                <td> {{ Str::limit($req->reason, 100) }}</td>
                                <td>{{ $req->from_date . $req->to_date }}</td>
                                <td>
                                    <a href="{{ url("/doctor/change_appointment_details/$req->id") }}"
                                        class="btn btn-info">View Details</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>
@endsection
