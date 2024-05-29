@extends('layouts.app')
@section('content')
    <div class="login-wrapper-main">
        <div class="login-wrapper-inner">
            <div class="login-left">
                <div class="login-left-inner">
                    <h3>WELCOME TO Shah Dental</h3>
                    <img src="{{ asset('public/images/logo.png') }}" alt="Shah Dental Logo">
                    <p>Log in to get in the moment updates on the things<br>
                        that interest you.</p>
                    <p align="center" style="color:red">
                        @if (Session::has('message'))
                            <p style="color:red">{{ Session::get('message') }}</p>
                        @endif
                    </p>

                    <div class="login-form">
                        <form action="{{ url('/dologin') }}" method="POST">
                            @csrf
                            <input type="text" name="email" placeholder="Email" id="username">
                            <input type="password" name="password" placeholder="Password" id="password">
                            <button type="submit" class="submit-btn">SIGN IN</button>
                            <a style="display: inline-block;margin-top:10px;font-size:14px"
                                href="{{ url('forget_password') }}">Forgot Password</a>
                            {{-- <a href="{{ route('google.login') }}" class="submit-btn">Login With Google</a> --}}
                            <p>Don’t have an account? <a href="{{ url('/register') }}">Sign Up</a></p>
                        </form>
                    </div>
                </div>
            </div>
            <div class="login-right">
                <div class="login-right-inner">
                    <img src="{{ asset('images/logo.png') }}" alt="Shah Dental Logo">
                    <p>We are a group of doctors gathered together and<br>
                        established an association for helping those youngsters who<br>
                        need training in Minimal Invasive Surgery. </p>
                </div>
            </div>
        </div>
    </div>
@endsection
