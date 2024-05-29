@extends('layouts.admin_template')
@section('sidebar')
    @include('admin.include.sidebar')
@endsection
@section('navbar')
    @include('admin.include.navbar')
@endsection
@section('content')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500;600;700;800&display=swap');

        body {
            font-family: 'Open Sans', sans-serif !important;
        }

        .profile_logo img {
            width: 100%;
            border-radius: 50%;
        }

        .Booking_btn {
            padding: 15px 10px;
            text-decoration: none;
            font-weight: 600;
            display: inline-block;
        }

        .Booking_btn:hover {
            background-color: aliceblue;
        }

        .doc_main_profile_info i.fa.fa-graduation-cap {
            font-size: 22px;
            margin-bottom: 15px;
            color: #414141;
        }

        .doc_main_profile_info i.fa.fa-star {
            font-size: 22px;
            margin-bottom: 15px;
            color: #414141;
        }

        .doc_main_profile_info i span {
            font-family: 'OpenSans';
            margin-left: 5px;
        }

        .navigation_another {
            background-color: #858585;
            border-radius: 8px;
            margin-right: 15px;
            padding: 20px 10px;
            color: #fff;
            margin-bottom: 15px;
        }

        .doc_main_profile_info h3 {
            font-size: 24px;
        }

        .navigation_another h6 {
            font-size: 16px;
        }

        .doc_main_profile_info {
            margin-top: 10px;
        }

        .doc_main_profile_info h6 {
            font-size: 16px;
            font-weight: 400;
            color: #969696;
        }

        .take_care_yourself h3 {
            font-size: 22px;
            margin-top: 10px;
        }

        .doc_main_profile_info h4 {
            font-size: 18px;
            font-weight: 600;
            color: #414141;
        }

        .top_border_doc_profile {
            padding: 20px 10px;
            margin-top: 20px;
            border-radius: 15px;
            box-shadow: 0px 0px 22px 0px #d0d0d0;
            margin-bottom: 80px;
        }


        .heading_doc_main_profile h4 {
            font-size: 17px;
        }

        .heading_doc_main_profile h6 {
            font-size: 15px;
        }

        .doc_profile_section {
            padding: 0px 20px;
        }

        @media screen and (max-width: 566px) {
            .Booking_btn {
                padding: 15px 10px;
                text-decoration: none;
                font-weight: 600;
                display: inline-block;
                margin-bottom: 10px;
            }

            .profile_logo img {
                width: unset;
                border-radius: 50%;
            }

            .top_border_doc_profile {
                padding: 20px 20px;
                margin-top: 20px;
                border-radius: 15px;
                box-shadow: 0px 0px 22px 0px #d0d0d0;
                margin-bottom: 80px;
            }
        }
    </style>
    <div class="main-cont-wrapper">
        <div class="container-fluid">
            <a href="{{ url("/admin/add_visiting_card/$doctor->doctorID") }}">
                <button class="btn btn-primary" style="margin-top: 20px">Add Visiting Card</button>
            </a>
            <a href="{{ url("/admin/view_visiting_card/$doctor->doctorID") }}">
                <button class="btn btn-success" style="margin-top: 20px">View Visiting Card</button>
            </a>
            @if ($social != null)
                <a href="{{ url("/admin/view_social_links/$doctor->doctorID") }}">
                    <button class="btn btn-success" style="margin-top: 20px">View Social Links</button>
                </a>
            @else
                <a href="{{ url("/admin/add_social_links/$doctor->doctorID") }}">
                    <button class="btn btn-primary" style="margin-top: 20px">Add Social Links</button>
                </a>
            @endif
            <a href="{{ url("/admin/assign_speciality/$doctor->doctorID") }}">
                <button class="btn btn-primary" style="margin-top: 20px">Assign Speciality</button>
            </a>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 top_border_doc_profile">
                        <div class="row" style="align-items: center;height: 175px;">
                            <div class="profile_logo col-lg-2 col-md-2 col-sm-2 col-xs-2"><img
                                    src="{{ asset("profile_image/$doctor->profile_image") }}" alt=""></div>
                            <div class="col-lg-10">
                                <div class="row" style="align-items: center;">
                                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                        <h3>{{ $doctor->name }}</h3>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="heading_doc_main_profile col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="row">
                                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                                <h6>Speciality:</h6>
                                                @foreach ($speciality as $sp)
                                                    <h4>{{ $sp->speciality }}</h4>
                                                @endforeach
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6 ">
                                                <h6>Educations</h6>
                                                <h4>{!! $doctor->education !!}</h4>
                                            </div>
                                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                                                <h6>language:</h6>
                                                <h4>Malay, Enaglish</h4>
                                            </div>
                                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                                <h6>Phone no 1:</h6>
                                                <h4>{{ $doctor->phone1 }} Ext 1 : {{ $doctor->ext1 }}</h4>
                                                <h6>Phone no 2:</h6>
                                                <h4>{{ $doctor->phone2 }} Ext 2 : {{ $doctor->ext2 }}</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-8 col-sm-8 col-12">
                        <div class="doc_main_profile_info">

                            <br><br>
                            <h3>About Dr {{ $doctor->name }}</h3>
                            {{-- <i class="fa fa-graduation-cap" aria-hidden="true"></i> --}}
                            <div>
                                <h5 style="font-weight: 700;">OBJECTIVES:</h5>
                                <p>
                                    {!! $doctor->biographical_sketch !!}
                                </p>
                            </div>
                            <div>
                                <h5 style="font-weight: 700;">EDUCATIONAL DATA:</h5>
                                <p>
                                    {!! $doctor->education_fellowship !!}
                                </p>
                            </div>
                            <div>
                                <h5 style="font-weight: 700;">PROFESSIONAL PROFILE:</h5>
                                <p>
                                    {!! $doctor->research_publications !!}
                                </p>
                            </div>
                            <div>
                                <h5 style="font-weight: 700;">EXPERIENCE:</h5>
                                <p>
                                    {!! $doctor->speciality_interests !!}
                                </p>
                            </div>
                            <div>
                                <h5 style="font-weight: 700;">PROFESSIONAL MEMBERSHIP:</h5>
                                <p>
                                    {!! $doctor->professional_memberships !!}
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-12">
                        <div class="take_care_yourself">
                            <h3>HOW CAN WE TAKE <br> CARE YOURSELF</h3>
                            <div class="row">
                                <div class="col-lg-5 col-md-6 col-sm-12 col-xs-12 navigation_another"
                                    style="background-color: #ce0000;;">
                                    <i class="fa fa-calendar-check-o" aria-hidden="true"></i> <br>
                                    <h6>Online
                                        Appointment</h6>
                                </div>
                                <div class="col-lg-5 col-md-6 col-sm-12 col-xs-12 navigation_another">
                                    <i class="fa fa-calendar-check-o" aria-hidden="true"></i> <br>
                                    <h6>Screening &
                                        Packages</h6>
                                </div>
                                <div class="col-lg-5 col-md-6 col-sm-12 col-xs-12 navigation_another">
                                    <i class="fa fa-archive" aria-hidden="true"></i>
                                    <h6>Patient &
                                        Visitors</h6>
                                </div>
                                <div class="col-lg-5 col-md-6 col-sm-12 col-xs-12 navigation_another">
                                    <i class="fa fa-thumbs-up" aria-hidden="true"></i><br>
                                    <h6>Recommend to
                                        Friend</h6>
                                </div>
                            </div>
                            <div class="row">

                            </div>
                        </div>
                        @if ($timing != null)
                            <div>
                                <ul>
                                    <b>
                                        <li>Monday : <span> From {{ $timing->monday_from }} To {{ $timing->monday_to }}
                                            </span>
                                        </li>
                                    </b>
                                    <b>
                                        <li>Tuesday : <span> From {{ $timing->tuesday_from }} To {{ $timing->tuesday_to }}
                                            </span></li>
                                    </b>
                                    <b>
                                        <li>Wednesday : <span> From {{ $timing->wednesday_from }} To
                                                {{ $timing->wednesday_to }}
                                            </span></li>
                                    </b>
                                    <b>
                                        <li>Thursday : <span> From {{ $timing->thursday_from }} To
                                                {{ $timing->thursday_to }}
                                            </span></li>
                                    </b>
                                    <b>
                                        <li>Friday : <span> From {{ $timing->friday_from }} To {{ $timing->friday_to }}
                                            </span></li>
                                    </b>
                                    <b>
                                        <li>Saturday : <span> From {{ $timing->saturday_from }} To
                                                {{ $timing->saturday_to }}
                                            </span></li>
                                    </b>
                                    <b>
                                        <li>Sunday : <span> From {{ $timing->sunday_from }} To {{ $timing->monday_to }}
                                            </span></li>
                                    </b>
                                </ul>
                            </div>
                        @else
                            <a href="{{ url("/admin/set_timing/$doctor->doctorID") }}">
                                <button class="btn btn-success form-control"
                                    style="background-color:#5cb85c; color: #fff; margin-top: 20px">Set
                                    Timing</button>
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
