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
            <h3>Patient Details</h3>
            <hr>
            <div>
                <h5>Name : {{ $patient->patient_name }}</h5>
                <h5>Email : {{ $patient->patient_email }}</h5>
                <h5>Phone : {{ $patient->patient_phone }}</h5>
                <h5>MRN : {{ $patient->mrn }}</h5>
                @if ($patient->age != null)
                    <h5>Age : {{ $patient->age }}</h5>
                @endif
                @if ($patient->dob != null)
                    <h5>Age : {{ $patient->dob }}</h5>
                @endif
            </div>
        </div>
    </div>
@endsection
