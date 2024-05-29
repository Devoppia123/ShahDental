@extends('layouts.login_template')

@section('content')
    <div class="row">
        <div class="col-lg-6 d-none d-lg-block">
            <img src="{{ url('public//img/login.PNG') }}">
        </div>
        <div class="col-lg-6">
            <div class="p-5">
                <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                </div>
                <p align="center">
                    @if (Session::has('message'))
                        <p style="color:red">{{ Session::get('message') }}</p>
                    @endif
                </p>
                <form class="user" action="{{ url('/adminlogin') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <input type="email" name="email" class="form-control form-control-user" id="exampleInputEmail"
                            aria-describedby="emailHelp" placeholder="Enter Email Address...">
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" class="form-control form-control-user"
                            id="exampleInputPassword" placeholder="Password">
                    </div>
                    <button type="submit" class="btn btn-primary btn-user btn-block">
                        Login
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
