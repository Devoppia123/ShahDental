@extends('layouts.app')
@section('content')
    <div class="login-wrapper-main">
        <div class="login-wrapper-inner">
            <div class="login-left">
                <div class="login-left-inner">
                    <h3>Forgot Password</h3>
                    <img src="{{ asset('patient/images/main-logo.png') }}" alt="">
                    <p>Please Enter Your Registered Email.</p>
                    <p align="center" style="color:red">
                        @if (Session::has('message'))
                            <p style="color:red">{{ Session::get('message') }}</p>
                        @endif
                    </p>
                    <div class="login-form">
                        <form action="{{ url('/update_password') }}" method="POST">
                            @csrf
                            <input type="hidden" name="email" value="{{ Session::get('email') }}">
                            <input type="password" name="password" placeholder="Enter New Password">
                            <input type="password" name="confirm_password" placeholder="Confirm Password">
                            <button type="submit" class="submit-btn">Change Password</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="login-right">
                <div class="login-right-inner">
                    <img src="{{ asset('patient/images/phr-white-logo.png') }}" alt="">
                    <p>We are a group of doctors gathered together and<br>
                        established an association for helping those youngsters who<br>
                        need training in Minimal Invasive Surgery. </p>
                </div>
            </div>
        </div>
    </div>
@endsection
