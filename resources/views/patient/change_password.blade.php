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
            <h3 class="text-center">Update Password</h3>

            <div class="row" style="margin: 20px">
                <form action="{{ url('/update_password_login') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label>Change Password</label>
                        <input type="password" name="password" style="margin-top: 15px" class="form-control"
                            placeholder="Password">
                        @error('password')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <input type="password" name="confirm_password" style="margin-top: 15px" class="form-control"
                            placeholder="Confirm Password">
                    </div>
                    <button type="submit" class="btn btn-info">Submit</button>
                </form>
            </div>
        </div>
    @endsection
