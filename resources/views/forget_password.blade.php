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
                        @if (session()->has('message'))
                            {{ Session::get('message') }}
                            @php
                                Session::forget('message');
                            @endphp
                        @endif
                    </p>
                    <div class="login-form">
                        <form action="{{ url('/send_password') }}" method="POST">
                            @csrf
                            <input type="text" name="email" placeholder="Email">
                            <button type="submit" class="submit-btn">Verify Email</button>
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
