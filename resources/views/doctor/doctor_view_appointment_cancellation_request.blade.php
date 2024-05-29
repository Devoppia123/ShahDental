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
                            <th scope="col">Appointment Cancellation Reason</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($all_request as $req)
                            <tr class="">
                                <td> {{ $req->patient_name }}</td>
                                <td> {{ $req->reason, 100 }}</td>
                                <td>
                                    <form action="{{ url("/doctor/appointment_cancellation/$req->booking_id") }}"
                                        method="post">
                                        @csrf
                                        <button type="submit" class="btn btn-primary">Cancel Appointment</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>
@endsection
