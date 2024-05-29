@extends('design.template')
@section('title', 'Shah Dental | Profile')
@section('customCSS')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    {{-- <link rel="stylesheet" href="{{ url('public/css/Our-Speciality.css') }}"> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <style>
        .main-section .container {
            max-width: 1600px !important;
            margin: 0 auto;
        }

        .profile_logo img {
            width: 70%;
            border-radius: 50%;
        }

        .Booking_btn {
            padding: 9px 15px;
            text-decoration: none;
            font-weight: 600;
            border-radius: 100px;
            display: inline-block;
            font-size: 14px;
        }

        .top_border_doc_profile h3 {
            font-size: 26px;
            font-family: "RedHatDisplay-Bold";
        }

        .top_border_doc_profile h5 {
            font-size: 20px;
            font-family: "CorporateNarrow-Bold";
        }

        .top_border_doc_profile h6 {
            FONT-SIZE: 14px;
            font-family: "RedHatDisplay-Regular";
        }

        .take_care_yourself .row {
            justify-content: space-evenly;
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
            background-color: #424343;
            border-radius: 8px;
            margin: 10px;
            width: 145px;
            padding: 20px 10px;
            color: #fff;
        }

        .doc_main_profile_info h3 {
            font-size: 36px;
            margin: 0px;
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
            padding: 35px 30px;
            margin-top: 90px;
            border-radius: 15px;
            box-shadow: 0px 0px 20px 0px #d0d0d06b;
            margin-bottom: 80px;
        }

        .heading_doc_main_profile {
            margin-top: 10px;
        }

        .doc_profile_section {
            padding: 0px 20px;
        }

        .take_care_yourself .p-4 {
            padding-bottom: 0px !important;
        }

        .expertise h5 {
            font-size: 28px;
            margin-top: 50px;
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
@endsection
@section('header-main')
    @include('design.header-main')
@endsection


@section('content')
    <section class="doc_profile_section">
        <div class="container">
            <div class="page-heading">
                <h1>Profile</h1>
            </div>
            {{-- <div class="col-lg-12 col-md-12 col-sm-12 col-12"> --}}
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-12 top_border_doc_profile">
                        <div class="row" style="align-items: center;">
                            <div class="profile_logo col-lg-2 col-md-2 col-sm-2 col-2">
                                @foreach ($doctor as $doc)
                                    <img src="{{ url("public/profile_image/$doc->profile_image") }}" alt="">
                                @endforeach
                            </div>
                            <div class="col-lg-10">
                                <div class="row" style="align-items: center;margin-bottom: 10px;">
                                    <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                        @foreach ($doctor as $doc)
                                            @foreach ($doc->user_role as $user_role)
                                                <h3>{{ $user_role->name }}</h3>
                                            @endforeach
                                        @endforeach
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                        <div class="row" style="text-align: end;">
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-6"> <a
                                                    style="border: 1px solid #ce0000;
                                                background-color: #a2262e;color: #fff;"
                                                    class="Booking_btn"
                                                    href="{{ url("/get_appointment/$doc->doctorID") }}">Book A
                                                    Appoinment</a></div>
                                            <div class="col-lg-4 col-md-6 col-sm-6 col-6">
                                                @foreach ($doctor as $doc)
                                                    @foreach ($doc->user_role as $user_role)
                                                        <a style="background-color: #424343; color: #fff;"
                                                            class="Booking_btn"
                                                            href="{{ url("/ask_doctor/$user_role->id") }}">Ask
                                                            Question</a>
                                                    @endforeach
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="heading_doc_main_profile col-lg-12 col-md-12 col-sm-12 col-12">
                                        <div class="row">
                                            <div class="col-lg-3 col-md-3 col-sm-3 col-6">
                                                <h5>Speciality:</h5>
                                                @foreach ($doctor as $doc)
                                                    @foreach ($doc->doctor_specaility as $doctor_specaility)
                                                        @foreach ($doctor_specaility->specialities_list as $specialities_record)
                                                            <h6> {{ $specialities_record->speciality }} </h6>
                                                        @endforeach
                                                    @endforeach
                                                @endforeach
                                            </div>
                                            <div class="col-lg-3 col-md-4 col-sm-4 col-6 ">
                                                <h5>Educations</h5>
                                                @foreach ($doctor as $doc)
                                                    <h6>{!! $doc->education !!}</h6>
                                                @endforeach
                                            </div>
                                            <div class="col-lg-3 col-md-2 col-sm-2 col-6">
                                                <h5>language:</h5>
                                                @foreach ($doctor as $doc)
                                                    @foreach ($doc->doctor_language as $doctor_language)
                                                        @foreach ($doctor_language->languages_list as $languages_record)
                                                            <h6> {{ $languages_record->language }} </h6>
                                                        @endforeach
                                                    @endforeach
                                                @endforeach
                                            </div>
                                            <div class="col-lg-3 col-md-3 col-sm-3 col-6">
                                                <h5>Phone no:</h5>
                                                @foreach ($doctor as $doc)
                                                    <h6>{{ $doc->phone1 }} Ext 1 {{ $doc->ext1 }}</h6>
                                                    <h6>{{ $doc->phone2 }} Ext 2 {{ $doc->ext2 }}</h6>
                                                @endforeach
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
                            @foreach ($doctor as $doc)
                                @foreach ($doc->user_role as $user_role)
                                    <h3>About {{ $user_role->name }}</h3>
                                @endforeach
                            @endforeach
                            {{-- <i class="fa fa-graduation-cap" aria-hidden="true"></i> --}}
                            <div class="expertise">
                                <h5 style="font-weight: 900;">OBJECTIVES:</h5>
                                <p>
                                    {!! $doc->biographical_sketch !!}
                                </p>
                            </div>
                            <div class="expertise">
                                <h5 style="font-weight: 900;">EDUCATIONAL DATA:</h5>
                                <p>
                                    {!! $doc->education_fellowship !!}
                                </p>
                            </div>
                            <div class="expertise">
                                <h5 style="font-weight: 900;">PROFESSIONAL PROFILE:</h5>
                                <p>
                                    {!! $doc->research_publications !!}
                                </p>
                            </div>
                            <div class="expertise">
                                <h5 style="font-weight: 900;">EXPERIENCE:</h5>
                                <p>
                                    {!! $doc->speciality_interests !!}
                                </p>
                            </div>
                            <div class="expertise">
                                <h5 style="font-weight: 900;">PROFESSIONAL MEMBERSHIP:</h5>
                                <p>
                                    {!! $doc->professional_memberships !!}
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-12">
                        <div class="take_care_yourself">
                            <div class="row">
                                <h3 class="p-4">HOW CAN WE TAKE <br> CARE YOURSELF</h3>
                                <div class="col-lg-6 col-md-6 col-sm-12 col-12 navigation_another"
                                    style="background-color: #a2262e;">
                                    <i class="fa fa-calendar-check-o" aria-hidden="true"></i> <br>
                                    <h6>Online
                                        Appointment</h6>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 col-12 navigation_another">
                                    <i class="fa fa-calendar-check-o" aria-hidden="true"></i> <br>
                                    <h6>Screening &
                                        Packages</h6>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-12 col-12 navigation_another">
                                    <i class="fa fa-archive" aria-hidden="true"></i>
                                    <h6>Patient &
                                        Visitors</h6>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 col-12 navigation_another">
                                    <i class="fa fa-thumbs-up" aria-hidden="true"></i><br>
                                    <h6>Recommend to
                                        Friend</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            {{-- </div> --}}
        </div>
    </section>
@endsection


@section('footer-main')
    @include('design.footer-main')
@endsection
