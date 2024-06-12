@extends('layouts.admin_template')

@section('sidebar')
    @include('admin.include.sidebar')
@endsection

@section('navbar')
    @include('admin.include.navbar')
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

        .card-box .card {
            padding: 30px 0px;
        }
    </style>

    <div class="main-cont-wrapper">
        <div class="container-fluid">
            <div class="set-monthly-heading">
                <h2>Select <span>Doctors</span> </h2>
            </div>
        </div>
        <div class="row">
            @php
                $month = date('m');
                $year = date('Y');
            @endphp
            @foreach ($doctors as $doc)
                <div class="col-md-3 col-sm-6 col-xs-12 card-box">
                    <div class="card text-center" style="">
                        <div class="imgbox-inner">
                            <img style="border-radius:100%; width: 140px;height: 138px;"
                                {{-- src="{{ asset("profile_image/$doc->profile_image") }}" class="card-img-top" alt="..."> --}}
                                src="{{ url("public/profile_image/$doc->profile_image") }}" class="card-img-top" alt="...">
                        </div>
                        <div class="card-body">
                            @foreach ($doc->user_role as $show)
                                <h5 class="card-title" style="margin-top: 10px;">{{ $show->name }}</h5>
                            @endforeach
                            <div>
                                <a href="{{ url("/admin/view_schedule/$month/$year/$doc->doctorID") }}"
                                    class="btn btn-success">View Schedule</a>
                                {{-- <a href="{{ url("/admin/edit_schedule/$doc->doctorID") }}" class="btn btn-primary mt-3">Edit
                                    Schedule</a> --}}
                            </div>
                        </div>

                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
