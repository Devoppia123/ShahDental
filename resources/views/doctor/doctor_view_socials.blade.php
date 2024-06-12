@extends('layouts.doctor_template')

@section('navbar')
    @include('doctor.include.nav_bar_new')
@endsection

@section('sidebar')
    @include('doctor.include.sidebar_new')
@endsection
@section('content')
    <div class="main-cont-wrapper">
<<<<<<< Updated upstream
        <div class="container-fluid">            
            <div class="row doc-view-social-links">
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <a href="{{ $social->whatsapp }}"><img class="so-icon" src="{{ url('public/img/whatsapp.png') }}"
                                alt=""></a>
                            <h4>Dr.Rida Sabir</h4>
                        </div>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <a href="{{ $social->facebook }}"><img class="so-icon" src="{{ url('public/img/facebook.png') }}"
                                alt=""></a>
                            <h4>Dr.Rida Sabir</h4>
                        </div>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <a href="{{ $social->twitter }}"><img class="so-icon" src="{{ url('public/img/Twitter.png') }}"
                                alt=""></a>
                            <h4>Dr.Rida Sabir</h4>
                        </div>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <a href="{{ $social->linkedin }}"><img class="so-icon" src="{{ url('public/img/linkedin.png') }}"
                                alt=""></a>
                            <h4>Dr.Rida Sabir</h4>
                        </div>
                    </div>
                </div>
                <!-- ./col -->
            </div>
=======
        <div class="container-fluid">
            <a href="{{ $social->whatsapp }}"><img style="width: 100px" src="{{ url('public/img/whatsapp.png') }}"
                    alt=""></a>
            <a href="{{ $social->facebook }}"><img style="width: 100px" src="{{ url('public/img/facebook.png') }}"
                    alt=""></a>
            <a href="{{ $social->twitter }}"><img style="width: 100px" src="{{ url('public/img/Twitter.png') }}"
                    alt=""></a>
            <a href="{{ $social->linkedin }}"><img style="width: 100px" src="{{ url('public/img/linkedin.png') }}"
                    alt=""></a>
>>>>>>> Stashed changes
        </div>
    </div>
@endsection
