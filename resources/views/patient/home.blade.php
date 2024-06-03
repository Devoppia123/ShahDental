@extends('layouts.patient_new_template')

@section('sidebar')
    @include('patient.include.sidebar_new')
@endsection

@section('navbar')
    @include('patient.include.nav_bar_new')
@endsection

@section('content')
    <style>
        .owl-carousel .owl-item img {
            width: 30%;
            float: left;
            margin-right: 5px;
            padding-left: 10px;
            padding-top: 17px;
            margin-left: 5px;
        }

        .item {
            background-color: #ffb800;
            min-width: 150px !important;
            min-height: 175px;
            border-radius: 8px;
            padding-top: 10px;
            padding-left: 2px;
        }

        .owl-carousel .item .row {
            margin: 0px !important;
        }

        .slider-inner-cont {
            padding-top: 15px;
        }

        .slider-inner-cont h4 {
            float: left;
            font-size: 14px;
            margin-left: 5px;
            color: #fff;
            margin-bottom: 2px;
            margin-right: 4px;
        }

        .slider-inner-cont h5 {
            float: left;
            font-size: 13px;
            margin-left: 5px;
            font-weight: 400;
            color: #fff6df;
            margin-right: 13px;
        }

        .slider-inner-cont h2 {
            margin-left: 15px;
            color: #fff;

        }

        .slider-inner-cont h2 span {
            background-color: #f4b001;
            border-radius: 40% 40%;
            padding: 5px 10px 4px 10px;
            font-size: 16px;
            font-weight: 400;
            vertical-align: middle;
            color: #f9d79c;
        }

        .slider-inner-cont h3 {
            font-size: 17px;
            color: #a3792a;
            margin-left: 15px;
        }

        .owl-dots {
            display: none;
        }

        button.owl-prev {
            position: absolute;
            top: -45px;
            right: 80px;
            min-width: 43px !important;
            min-height: 7px !important;
            background-color: #e6edfc !important;
            border-radius: 50% !important;
            font-size: 30px !important;
            margin-top: -10px !important;
            color: #0f5ef7 !important;
        }

        button.owl-next {
            position: absolute;
            top: -45px;
            right: 20px;
            min-width: 43px !important;
            min-height: 7px !important;
            background-color: #e6edfc !important;
            border-radius: 50% !important;
            font-size: 30px !important;
            margin-top: -10px !important;
            color: #0f5ef7 !important;
        }

        .slider-heading {
            color: #001746;
            margin-bottom: 20px;
            font-weight: 700;
            font-size: 24px;
        }

        .patient-img {
            border-radius: 100%;
            width: 80px;
            margin-top: 20px;
            margin-left: 15px;
        }
    </style>
    @php
        $patient_id = Session('user')['id'];
    @endphp
    <div class="main-cont-wrapper">
        <div class="container-fluid">
            @if (session()->has('message'))
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>{{ session()->get('message') }}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            <h2 style="color:#8b91a2;font-weight:400">Welcome back,
                <span style="color:#001746;font-weight:400">
                    {{ $user->name }}</span>
            </h2>
            <div class="row" style="padding-bottom:20px">
                <div class="col-lg-5">
                    @if (!$aftersubmit)
                        <a href="{{ url("/edit_profile/$patient_id") }}" class="btn btn-success">Edit Profie</a>
                    @else
                        <div class="info-data-main">
                            <div class="row">
                                <div class="col-md-8">
                                    <h4>My Information <span></span></h4> <br>
                                    <h6 class="info-sec">Age :<span> {{ $aftersubmit->age }}</span> Years</h6> <br>
                                    <h6 class="info-sec">Gender :<span>
                                            @if ($aftersubmit->gender == 1)
                                                Male
                                            @elseif($aftersubmit->gender == 2)
                                                Female
                                            @endif
                                        </span>
                                    </h6> <br>
                                    {{-- <h6 class="info-sec">City:
                                        {{ $aftersubmit->city ?? 'N/A' }}
                                    </h6>
                                    <br>
                                    <h6 class="info-sec">State:
                                        {{ $aftersubmit->state ?? 'N/A' }}
                                    </h6>
                                    <br>
                                    <h6 class="info-sec">Country:
                                        {{ $aftersubmit->country ?? 'N/A' }}
                                    </h6> --}}
                                </div>
                                <div class="col-md-4">
                                    {{-- <img class="patient-img"
                                        src="{{ url("public/patient_profile/$aftersubmit->profile_image") }}" alt=""> --}}
                                </div>

                            </div>
                        </div>
                    @endif
                </div>
                <div class="col-lg-7">
                    <h2 class="slider-heading">Appointments</h2>
                    <div class="owl-carousel owl-theme">
                        <div class="item">
                            <div class="row">
                                <div class="col-6"> <img src="{{ asset('patient/images/Dashboard-book-logo_03.png') }}"
                                        alt=""></div>
                                <div class="col-6 slider-inner-cont">
                                    <h4>Appointment</h4>
                                    <h5>Doctor<br>
                                        <span>
                                        </span>
                                    </h5>
                                    <h2>3 <span> 30%</span></h2>
                                    <h3>Upcoming</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <a class="health-alert-heading" href="#">Visit History <i class="fa fa-chevron-right"></i></a>
            <div class="reading-table-main">
                <table class="reading-tble">
                    <thead>
                        <tr>
                            <th style="width: 8%;">Case No.</th>
                            <th>Patient Type</th>
                            <th class="text-center">Visit Type</th>
                            <th class="text-center">Date Time <i class="fa fa-caret-down"></i></th>
                            <th class="text-center">ActiVE</th>
                            <th class="text-center">Last 24 Hours</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-center">1</td>
                            <td>Patient 1 <br>
                                <span>PST</span>
                            </td>
                            <td class="text-center td-text-btn"><span>013751</span></td>
                            <td class="text-center">17306 <i class="fa fa-chevron-up"></i></td>
                            <td class="text-center">11000</td>
                            <td class="text-center">~Chart~</td>
                        </tr>
                        <tr>
                            <td class="text-center">2</td>
                            <td>Patient 1 <br>
                                <span>PST</span>
                            </td>
                            <td class="text-center td-text-btn"><span>013751</span></td>
                            <td class="text-center">17306 <i class="fa fa-chevron-up"></i></td>
                            <td class="text-center">11000</td>
                            <td class="text-center">~Chart~</td>
                        </tr>
                        <tr>
                            <td class="text-center">3</td>
                            <td>Patient 1 <br>
                                <span>PST</span>
                            </td>
                            <td class="text-center td-text-btn"><span>013751</span></td>
                            <td class="text-center">17306 <i class="fa fa-chevron-up"></i></td>
                            <td class="text-center">11000</td>
                            <td class="text-center">~Chart~</td>
                        </tr>
                        <tr>
                            <td class="text-center">4</td>
                            <td>Patient 1 <br>
                                <span>PST</span>
                            </td>
                            <td class="text-center td-text-btn"><span>013751</span></td>
                            <td class="text-center">17306 <i class="fa fa-chevron-up"></i></td>
                            <td class="text-center">11000</td>
                            <td class="text-center">~Chart~</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Tabs Custom Css -->

            <style>
                .tab {
                    overflow: hidden;
                    border: none;
                    background-color: #fff;
                    position: absolute;
                    right: 180px;
                    z-index: 99;
                }

                button.tablinks.active {
                    background-color: #0f5ef7;
                    color: #fff;
                }

                .tab button {
                    background-color: inherit;
                    float: left;
                    border: 1px solid #f4f7ff;
                    outline: none;
                    cursor: pointer;
                    padding: 8px 16px;
                    transition: 0.3s;
                    font-size: 17px;
                    margin-top: 5px;
                    margin-right: 10px;
                    border-radius: 8px;
                }

                .tabcontent {
                    display: none;
                    padding: 8px;
                    border: none;
                    border-top: none;
                }

                .tabs-table {
                    padding: 0px;
                }

                .even td {
                    background-color: #fff !important;
                    width: 50%;
                }

                .odd td {
                    background-color: #f8f8f8;
                    width: 50%;
                }

                .reading-tble thead {
                    border: none !important;
                }

                .reading-tble th:last-child {
                    border-top-right-radius: 0px !important;
                    border: none;
                }

                .reading-tble th:first-child {
                    border-top-left-radius: 0px !important;
                }

                .fa-chevron-right {
                    margin-left: 30px;
                }

                .even td {
                    background-color: #fff !important;
                    width: 30%;
                }
            </style>

            <!-- Tabs custom css up here -->
            <a class="health-alert-heading" href="#">Vital Alert <i class="fa fa-chevron-right"></i></a>
            <div class="vital-alert-main ">
                <div class="tab">
                    <button class="tablinks active" onclick="openCity(event, 'Glucose')">Glucose</button>
                    <button class="tablinks" onclick="openCity(event, 'BP')">BP</button>
                    <button class="tablinks" onclick="openCity(event, 'Weight')">Weight</button>
                </div>
                <div class="tabs-table">


                    <div id="Glucose" class="tabcontent" style="display: block;">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <table class="reading-tble">
                                    <thead>
                                        <tr class="odd">
                                            <th style="background-color: #2b5a99; color:#f4f7ff;">
                                                Reading Date/Time</th>
                                            <th style="background-color:#f4f7ff !important; color:#2b5a99;">MMOL</th>
                                            <th style="background-color:#f4f7ff !important; color:#2b5a99;">MG </th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        {{-- @foreach ($glusoce as $glusoce_list)
                                            <tr class="even">
                                                <td>{{ $glusoce_list->readingDate }}</td>
                                                <td>{{ $glusoce_list->reading }}</td>
                                                <td>{{ $glusoce_list->deciliter }}</td>

                                            </tr>
                                        @endforeach --}}


                                    </tbody>
                                </table>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                <div id="container_glucose_1" style="margin-top: 40px;"></div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                <div id="container_glucose_2" style="margin-top: 40px;"></div>
                            </div>
                        </div>
                    </div>

                    <div id="BP" class="tabcontent">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <table class="reading-tble">
                                    <thead>
                                        <tr class="odd">
                                            <th style="background-color: #2b5a99; color:#f4f7ff;">
                                                Reading Date/Time</th>
                                            <th style="background-color:#f4f7ff !important; color:#2b5a99;">Systolic</th>
                                            <th style="background-color:#f4f7ff !important; color:#2b5a99;">Dystolic</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        {{-- @foreach ($bp as $bp_list)
                                            <tr class="even">
                                                <td>{{ $bp_list->readingDate }}</td>
                                                <td>{{ $bp_list->systolic }}</td>
                                                <td>{{ $bp_list->dystolic }}</td>

                                            </tr>
                                        @endforeach --}}
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <div id="container" style="margin-top: 40px;"></div>
                            </div>
                        </div>
                    </div>

                    <div id="Weight" class="tabcontent">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <table class="reading-tble">
                                    <thead>
                                        <tr class="odd">
                                            <th style="background-color: #2b5a99; color:#f4f7ff;">
                                                Reading Date/Time</th>
                                            <th style="background-color:#f4f7ff !important; color:#2b5a99;">Reading</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        {{-- @foreach ($weight_tabs as $weight_list)
                                            <tr class="even">
                                                <td>{{ $weight_list->alertFrom }}</td>
                                                <td>{{ $weight_list->alertReading }}</td>
                                            </tr>
                                        @endforeach --}}

                                    </tbody>
                                </table>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <div id="container2" style="margin-top: 40px;"></div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- <div class="col-lg-6 tab-sec-columns-2"></div> --}}
                <script>
                    function openCity(evt, cityName) {
                        var i, tabcontent, tablinks;
                        tabcontent = document.getElementsByClassName("tabcontent");
                        for (i = 0; i < tabcontent.length; i++) {
                            tabcontent[i].style.display = "none";
                        }
                        tablinks = document.getElementsByClassName("tablinks");
                        for (i = 0; i < tablinks.length; i++) {
                            tablinks[i].className = tablinks[i].className.replace(" active", "");
                        }
                        document.getElementById(cityName).style.display = "block";
                        evt.currentTarget.className += " active";
                    }
                </script>
            </div>

            <div>
                <a class="health-alert-heading" href="#">Health Alert <i class="fa fa-chevron-right"></i></a>
                <div class="row health-alert-sec-02">
                    <div class="col-lg-4 health-alert-boxes">
                        <h3>Immuni</h3>
                        <h3 style="color:#9ba7c0;font-size :16px !important;margin-bottom: 40px;">Medications</h3>
                        <div class="row">
                            <div class="col-lg-4">
                                <h5><span>5</span>Completed</h5>
                            </div>
                            <div class="col-lg-4">
                                <h5><span style="background-color:#ff9e01">3</span>In Progress</h5>
                            </div>
                            <div class="col-lg-4">
                                <h5><span style="background-color:#ef3737">2</span>To Do</h5>
                            </div>
                            <img src="{{ asset('patient/images/bottom-line-border_14.png') }}" alt="">
                        </div>
                    </div>
                    <div class="col-lg-4 health-alert-boxes">
                        <h3>Allergy</h3>
                        <h3 style="color:#9ba7c0;font-size :16px !important;margin-bottom: 40px;">Medications</h3>
                        <div class="row">
                            <div class="col-lg-4">
                                <h5><span>5</span>Completed</h5>
                            </div>
                            <div class="col-lg-4">
                                <h5><span style="background-color:#ff9e01">3</span>In Progress</h5>
                            </div>
                            <div class="col-lg-4">
                                <h5><span style="background-color:#ef3737">2</span>To Do</h5>
                            </div>
                            <img src="{{ asset('patient/images/bottom-line-border_14.png') }}" alt="">
                        </div>
                    </div>
                    <div class="col-lg-4 health-alert-boxes">
                        <h3>General</h3>
                        <h3 style="color:#9ba7c0;font-size :16px !important;margin-bottom: 40px;">Medications</h3>
                        <div class="row">
                            <div class="col-lg-4">
                                <h5><span>5</span>Completed</h5>
                            </div>
                            <div class="col-lg-4">
                                <h5><span style="background-color:#ff9e01">3</span>In Progress</h5>
                            </div>
                            <div class="col-lg-4">
                                <h5><span style="background-color:#ef3737">2</span>To Do</h5>
                            </div>
                            <img src="{{ asset('patient/images/bottom-line-border_14.png') }}" alt="">
                        </div>

                    </div>
                </div>



            </div>


        </div>

    </div>
@endsection
