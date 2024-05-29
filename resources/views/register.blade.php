@extends('layouts.app')
@section('content')
    <div class="login-wrapper-main">
        <div class="login-wrapper-inner">
            <div class="login-left">
                <div class="login-left-inner">
                    <h3>WELCOME TO Hospital</h3>
                    <img src="{{ asset('images/logo.png') }}" alt="Shah Dental Logo">
                    <p>Register in to get in the moment updates on the things<br>
                        that interest you.</p>

                    <p align="center" style="color:red">
                        @if (null !== Session('msg'))
                            {{ Session('msg') }}
                        @endif
                    </p>

                    <div class="login-form">
                        <form action="{{ url('/register') }}" method="POST">
                            @csrf
                            <input type="text" name="name" placeholder="Name" id="username">
                            <input type="text" name="email" placeholder="Email" id="username">
                            <input type="password" name="password" placeholder="Password" id="password">
                            <input type="password" name="confirm_password" placeholder="Confirm Password" id="password">
                            <button type="submit" class="submit-btn">SIGN IN</button>
                            <p> Have An Account? <a href="{{ url('/login') }}">Sign In</a></p>
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
