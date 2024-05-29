@extends('layouts.staff_template')

@section('sidebar')
    @include('nurse.include.sidebar_new')
@endsection

@section('navbar')
    @include('nurse.include.nav_bar_new')
@endsection

@section('content')
    <style>
        .set-monthly-heading h2 {
            color: #8b91a2;
            font-weight: 400;
            text-transform: capitalize;
            font-size: 36px;
        }

        body {
            overflow-x: clip;
        }

        .set-monthly-heading h2 span {
            color: #001746;
        }

        @media screen and (max-width:428px) {
            .card {
                border: 2px solid #e5e5e5;
                margin: 15px 20px;
                padding: 15px 0px;
                border-radius: 22px;
                box-shadow: 0px 0px 20px -7px;
            }
        }
    </style>

    <div class="main-cont-wrapper">
        <div class="container-fluid">
            <div class="set-monthly-heading">
                <h2>Manage <span>Doctors</span> </h2>
            </div>
        </div>
        <div class="row">
            @php
                $month = date('m');
                $year = date('Y');
            @endphp
            @foreach ($doctors as $doc)
                <div class="col-md-3 col-sm-6 col-xs-12 text-center">
                    <div class="card" style="">
                        <img style="border-radius:100%; width: 50%;" src="{{ asset("profile_image/$doc->profile_image") }}"
                            class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title" style="margin-top: 10px;">{{ $doc->doctor_name }}</h5>
                            <a href="{{ url("/nurse/view_schedule/$month/$year/$doc->doctor_id") }}"
                                class="btn btn-success">Manage</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
