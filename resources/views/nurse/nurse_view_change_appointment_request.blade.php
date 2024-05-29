@extends('layouts.staff_template')

@section('sidebar')
    @include('nurse.include.manage_doctor_sidebar')
@endsection

@section('navbar')
    @include('nurse.include.nav_bar_new')
@endsection
<style>
    .table-responsive::-webkit-scrollbar {
        display: none;
    }
</style>
@section('content')
    <div class="main-cont-wrapper">
        <div class="container-fluid">
            @if (Session('success'))
                <div class="alert alert-success">
                    <div id="alert" class="alert alert-success alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>{{ Session('success') }}</strong>
                    </div>
                </div>
            @endif
            <h3 class="text-center" style="padding-bottom: 10px">Change Appointment Requests</h3>
            <div class="view_change_appointment_request-overfle">
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
                                        <a href="{{ url("/nurse/change_appointment_details/$req->id") }}"
                                            class="btn btn-info">View Details</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
