@extends('layouts.doctor_template')

@section('navbar')
    @include('doctor.include.nav_bar_new')
@endsection

@section('sidebar')
    @include('doctor.include.sidebar_new')
@endsection
@section('content')
    <div class="main-cont-wrapper">
        <div class="container-fluid">
            <a href="{{ $social->whatsapp }}"><img style="width: 100px" src="{{ asset('img/whatsapp.png') }}"
                    alt=""></a>
            <a href="{{ $social->facebook }}"><img style="width: 100px" src="{{ asset('img/facebook.png') }}"
                    alt=""></a>
            <a href="{{ $social->twitter }}"><img style="width: 100px" src="{{ asset('img/Twitter.png') }}"
                    alt=""></a>
            <a href="{{ $social->linkedin }}"><img style="width: 100px" src="{{ asset('img/linkedin.png') }}"
                    alt=""></a>
        </div>
    </div>
@endsection
