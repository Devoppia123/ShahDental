<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Get An Appointment</title>
    {{-- <link type="text/css" href="{{ asset('css/jquery-ui-1.7.3.custom.css') }}" rel="stylesheet"> --}}
    <link type="text/css" href="{{ url('public/css/jquery-ui-1.7.3.custom.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ url('public/css/Our-Speciality.css') }}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<style>
    .pass_box select {
        padding: 10px 10px;
        margin: 0px;
        width: 30%;
        margin-right: 20px;
    }

    .online_value {
        display: none;
    }


    #hide {
        display: none;
    }

    form label {
        margin-bottom: 6px;
    }

    .pass_box {
        margin: 20px 0px;
        display: none;
    }

    select#Social {
        padding: 6px 6px;
        margin-bottom: 20px;
        margin-left: 0px;
    }

    .ui-datepicker {
        width: 100% !important;
        border: 5px solid #2c3e50;
    }

    .ui-widget-content {
        background: none;
        color: #333333;
        padding: 10px 40px;
    }

    .ui-state-default,
    .ui-widget-content .ui-state-default {
        border: none;
        background: none;
        color: #a2262;
        outline: none;
        font-size: 18px;
        text-align: center;
    }

    span.ui-datepicker-month {
        font-family: redhatdisplay-bold;
    }

    span.ui-datepicker-year {
        font-family: redhatdisplay-regular;
    }

    .ui-datepicker-current-day a {
        background-image: none !important;
        background-color: #a2262e !important;
        color: White !important;
    }

    thead tr {
        color: #2c3e50;
    }

    .ui-widget-header {
        background: none !important;
        color: #464443 !important;
        font-size: 26px;
        border-radius: 0px;
        border-bottom: 1px solid;
        border-top: none !important;
        border-right: none !important;
        border-left: none !important;
    }

    .ui-datepicker th {
        padding: 10px 0px;
        text-align: center;
        border: 0;
        font-size: 18px;
        font-weight: 400;
        border-bottom: 1px solid #f8f9f9;
    }

    .ui-datepicker td.ui-state-disabled>span {
        background: #fff !important;
        opacity: 100 !important;
        color: #abb0b5 !important;
        font-size: 18px;
        text-align: center;
        border: none !important;
    }

    tbody tr {
        border-bottom: 1px solid #f8f9f9;
        height: 55px;
    }

    .ui-widget-header {
        background: none !important;
        color: #464443 !important;
        font-size: 26px;
        border-radius: 0px;
        border-bottom: 1px solid #f5f6f7 !important;
        border-top: none !important;
        border-right: none !important;
        border-left: none !important;
    }

    .ui-datepicker th {
        padding: 15px 0px !important;
        text-align: center;
        border: 0;
        font-size: 18px;
        font-weight: 400;
        border-bottom: 1px solid #f8f9f9;
    }

    .half_leftcol_app h5 {
        text-align: center;
        font-size: 34px;
        margin: 30px 0px;
        font-family: redhatdisplay-bold;
        color: #424343;
    }

    .ui-datepicker .ui-datepicker-title {
        margin: 0 2.3em;
        line-height: 1.8em;
        text-align: left !important;
    }

    .ui-datepicker .ui-datepicker-next {
        left: 180px;
    }
</style>

<body>
    <header>
        <div class="main-banner">
            <div class="row">
                <div class="col-lg-5 col-md-4 col-sm-0 col-0"></div>
                <div class="col-lg-7 col-md-8 col-sm-12 col-12">
                    <div class="inner-top-bar">
                        <div class="call-tag top-bar-servics">
                            <i class="fa fa-phone" aria-hidden="true"></i>
                            <div class="top-bar-contact">
                                <p style="font-size: 12px;
                                font-weight: 600;">
                                    Gulshan-e-Iqbal Branch</p>
                                <p
                                    style="color: #d7cfcf;
                                font-size: 13px; font-weight: 400;">
                                    Call Us : <span><a style="color: #d7cfcf;" href="tel:021-34963440">
                                            021-34963440</a></span></p>
                            </div>
                        </div>
                        <div class="call-tag top-bar-servics">
                            <i class="fa fa-phone" aria-hidden="true"></i>
                            <div class="top-bar-contact">
                                <p style=" font-size: 12px;
                                font-weight: 600;">
                                    Bahadurabad Branch</p>
                                <p
                                    style="color: #d7cfcf;
                                font-size: 13px; font-weight: 400;">
                                    Call Us : <span><a style="color: #d7cfcf;"
                                            href="tel:03341326378">03341326378</a></span></p>
                            </div>
                        </div>
                        <div class="call-tag top-bar-servics">
                            <i class="fa fa-phone" aria-hidden="true"></i>
                            <div class="top-bar-contact">
                                <p style="font-size: 12px;
                                font-weight: 600;">DHA
                                    Branch</p>
                                <p
                                    style="color: #d7cfcf;
                                font-size: 13px; font-weight: 400;">
                                    Call Us : <span><a style="color: #d7cfcf;"
                                            href="tel:021-35243482">021-35243482</a></span></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-4 col-sm-6 col-6">
                        <div class="nav-brand">
                            {{-- <img src="{{ asset('images/logo.png') }}" alt=""> --}}
                            <img src="{{ url('public/images/logo.png') }}" alt="">
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-8 col-sm-6 col-6 nav-main-sec">
                        <nav class="navbar navbar-expand-lg">
                            <span class="navbar-toggler d-lg-none" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapsibleNavId" aria-controls="collapsibleNavId"
                                aria-expanded="false" aria-label="Toggle navigation"><i class="fa fa-bars"
                                    aria-hidden="true"></i>
                            </span>
                            <div class="collapse navbar-collapse" id="collapsibleNavId">
                                <ul class="navbar-nav me-auto mt-2 mt-lg-0">
                                    <li class="nav-item">
                                        <a class="nav-link active" href="{{ url('/our-mission') }}"
                                            aria-current="page">Our Mission <span
                                                class="visually-hidden">(current)</span></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ url('/message') }}">Message</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ url('/highlights') }}">Highlights</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ url('/all-articles') }}">Articles</a>
                                    </li>
                                    <li class="nav-item">
                                        <div class="dropdown">
                                            <button class="nav-link dropdown-toggle" type="button"
                                                id="dropdownMenuButton1" data-bs-toggle="dropdown"
                                                aria-expanded="false">
                                                Gallery
                                            </button>
                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                                <li><a class="dropdown-item" href="#">Image Gallery</a></li>
                                                <li><a class="dropdown-item" href="#">Video Gallery</a></li>
                                            </ul>
                                        </div>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link"
                                            href="{{ url('/services-treatments') }}">Services/Treatments</a>
                                    </li>
                                    <li class="nav-item" style="border: none;">
                                        <a class="nav-link" href="{{ url('/contact-us') }}">Contact</a>
                                    </li>
                                    <li class="nav-item " style="border: none;">
                                        <a class="nav-link make_appoitnment_btn"
                                            href="https://foundershospital.com/get_appointment/62">Make an
                                            appointment</a>
                                    </li>
                                </ul>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-1">
                        <div class="banar-social">
                            <p>Follow Us</p>
                            <div class="social-icon">
                                <i class="fa fa-facebook" aria-hidden="true"></i>
                                <i class="fa fa-instagram" aria-hidden="true"></i>
                                <i class="fa fa-twitter" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-11">
                        <div class="baner-inner-text">
                            <h2>Make An Appointment</h2>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <section class="main-content-section container">
        <div class="container pt-5">
            <div class="half_leftcol_app">
                {{-- <h5>Please Select a Date</h5> --}}
                <div id="datepicker" style="width:100%;"></div>
            </div>
            <div class="Cardiology">
                <h2 style="font-weight: 700;" id="hide">Make An Appointment</h2>
            </div>
            <form action="{{ url('booked_appointment_withoutlogin') }}" method="POST" id="get_appointment_form">
                @csrf
                <div class="row">
                    <div class="col-md-4 p-2 form-group">
                        <label>Patient Name</label>
                        <input type="text" name="patient_name" class="form-control">
                    </div>
                    <div class="col-md-4 p-2 form-group">
                        <label>Patient Email </label>
                        <input type="email" name="patient_email"
                            class="form-control @error('email') is-invalid @enderror">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 p-2 form-group">
                        <label>Patient Phone</label>
                        <input type="text" name="patient_phone" class="form-control">
                    </div>
                    <div class="col-md-4 p-2 form-group">
                        <label>Session</label>
                        <div>
                            <input type="radio" value="1" name="session">Morning
                            <input type="radio" value="2" name="session">Afternoon
                            <input type="radio" value="3" name="session">Evening
                            <input type="radio" value="4" name="session">Any Time
                        </div>
                    </div>
                </div>
                <div class="row p-2">
                    <div class="col-lg-8 col-md-8 col-sm-12 col-12">
                        <select class="form-control" name="branch" id="">
                            @foreach ($branches as $branch)
                                <option value="{{ $branch->id }}">{{ $branch->branch_name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="additional-search col-lg-8">
                    <div class="xyz row">
                        <div class="col-lg-6"> <label for="Radio">
                                <input type="radio" id="At_Clinic" name="mode" value="At Clinic"
                                    checked="checked" class="">
                                At Clinic</label></div>
                        <div class="col-lg-6"> <label for="Radio"> <input type="radio" name="mode"
                                    id="online_option" value="Online" class="">
                                Online</label></div>
                    </div>
                    <br>
                    <div class="online_value">
                        <div class="row">
                            <div class="col-lg-6"><label for="select">Platform:</label>
                                <select id="Social" class="form-control" name="platform">
                                    <option value="">Select Option</option>
                                    <option value="Facebook">Facebook</option>
                                    <option value="Twitter">Twitter</option>
                                    <option value="Skype">Skype</option>
                                    <option value="Google Meet">Google Meet</option>
                                </select>
                            </div>
                            <div class="col-lg-6">
                                <label for="Id_Number">ID/number:</label>
                                <input type="text" class="form-control" name="id_number" value="">
                            </div>
                        </div>


                    </div>
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-12 p-0">
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="radio" id="ic_number" name="identity_no" checked="checked">
                                    <label for="Radio"> IC Number:</label>
                                </div>
                                <div class="col-md-6">
                                    <input type="radio" value="passport-input" name="identity_no"
                                        id="passport-input">
                                    <label for="Radio" class="passport_no" style="margin-left:15px"
                                        id="passport">
                                        Passport Number:</label>
                                </div>
                            </div>
                            <input type="number" class="form-control" name="get_number_identity">
                            <input type="hidden" name="check_value" id="check_value" value="1">
                        </div>
                        <br> <br>
                        <div class="pass_box col-lg-12">
                            <label for="select">Platform:</label>
                            <div class="row">
                                <select class="form-control col-3" name="passport_date">
                                    <option value="">Day</option>
                                    @php
                                        $i = 00;
                                    @endphp
                                    @for ($i; $i < 32; $i++)
                                        @if ($i < 10)
                                            <option value="0{{ $i }}">
                                                0{{ $i }}</option>
                                        @else
                                            <option value="{{ $i }}">
                                                {{ $i }}</option>
                                        @endif
                                    @endfor
                                </select>

                                <select class="form-control col-3" name="passport_date">
                                    <option value="">Month</option>
                                    @for ($m = 1; $m <= 12; $m++)
                                        @php
                                            $month = date('F', mktime(0, 0, 0, $m, 1));
                                        @endphp
                                        <option value="{{ $month }}">
                                            {{ $month }}</option>
                                    @endfor
                                </select>

                                <select class="form-control col-3" name="passport_date">
                                    <option value="">Year</option>
                                    @php
                                        $i = 1920;
                                    @endphp
                                    @for ($i; $i < 2024; $i++)
                                        <option value="{{ $i }}">
                                            {{ $i }}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <label for="Radio"> Appointment Reason: <input style="margin-left:0px !important"
                                    class="inpt-alignment" type="radio" value="1st Time Consultation"
                                    name="consultation_type" id="" checked="checked"> 1st
                                Time
                                Consultation</label>
                            <label for="Radio"><input class="inpt-alignment" value="Follow up Consultation"
                                    type="radio" name="consultation_type" id="">
                                Follow up
                                Consultation</label>
                            <br>
                            <textarea class="txt-area mandtry form-control" name="appointment_reason" id="reason" cols="45"
                                rows="5"></textarea>
                            <br>
                            <button type="submit" style="margin-top: 20px"
                                class="nxt-btn btn btn-warning action-button">Submit</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
    <footer>
        <hr>
        <div class="container">
            <div class="row footer-row">
                <div class="col-lg-4 col-md-4 col-sm-12 col-12 footer-logo-col">
                    <div class="footer-logo">
                        {{-- <img src="{{ asset('images/logo.png') }}" alt=""> --}}
                        <img src="{{ url('public/images/logo.png') }}" alt="">
                    </div>
                    <h5>With Verber Family Dentistry, what you see is what you get. All of the photos that you see
                        on our
                        website are the real deal: our team, our office, and our patients. These photos capture us
                        in our
                        day-to-day work as we strive to provide the best care for your smile!
                    </h5>
                    <h4 class="fter-submenu-head">Follow Us :</h4>
                    {{-- <img src="{{ asset('images/before1_03.png') }}" alt=""> --}}
                    <img src="{{ url('public/images/before1_03.png') }}" alt="">
                    <div class="footer-social-logo">
                        <i class="fa fa-facebook" aria-hidden="true"></i>
                        <i class="fa fa-instagram" aria-hidden="true"></i>
                        <i class="fa fa-twitter" aria-hidden="true"></i>
                    </div>
                </div>
                <div class="col-lg-2 col-md-2 col-sm-12 col-12 ftr-submenu">
                    <h4 class="fter-submenu-head">Home </h4>
                    {{-- <img src="{{ asset('images/before1_03.png') }}" alt=""> --}}
                    <img src="{{ url('public/images/before1_03.png') }}" alt="">
                    <ul class="list-unstyled p-0">
                        <li><a class="nav-link p-0 footer-nav" href="#"><img
                                    {{-- src="{{ asset('images/Inner-page01_03.png') }}" alt=""> --}}
                                    src="{{ url('public/images/Inner-page01_03.png') }}" alt="">
                                <span>For Dentists
                                </span>
                            </a></li>
                        <li><a class="nav-link p-0 footer-nav" href="#"><img
                                    src="{{ url('public/images/Inner-page01_03.png') }}" alt="">
                                <span>For Parthners
                                </span>
                            </a></li>
                        <li><a class="nav-link p-0 footer-nav" href="#"><img
                                    src="{{ url('public/images/Inner-page01_03.png') }}" alt="">
                                <span>Directions</span>
                            </a></li>
                        <li><a class="nav-link p-0 footer-nav" href="#"><img
                                    src="{{ url('public/images/Inner-page01_03.png') }}" alt="">
                                <span>Out Team
                                </span>
                            </a></li>
                        <li><a class="nav-link p-0 footer-nav" href="#"><img
                                    src="{{ url('public/images/Inner-page01_03.png') }}" alt="">
                                <span>Blog & News
                                </span>
                            </a></li>
                        <li><a class="nav-link p-0 footer-nav" href="#"><img
                                    src="{{ url('public/images/Inner-page01_03.png') }}" alt="">
                                <span>FAQ’s
                                </span>
                            </a></li>
                    </ul>
                </div>
                <div class="col-lg-2 col-md-2 col-sm-12 col-12 ftr-submenu ">
                    <h4 class="fter-submenu-head">Quick Links</h4>
                    {{-- <img src="{{ asset('images/before1_03.png') }}" alt=""> --}}
                    <img src="{{ url('public/images/before1_03.png') }}" alt="">
                    <ul class="list-unstyled p-0">
                        <li><a class="nav-link p-0 footer-nav" href="#"><img
                                    {{-- src="{{ asset('images/Inner-page01_03.png') }}" alt=""> --}}
                                    src="{{ url('public/images/Inner-page01_03.png') }}" alt="">
                                <span>For Dentists
                                </span>
                            </a></li>
                        <li><a class="nav-link p-0 footer-nav" href="#"><img
                                    src="{{ url('public/images/Inner-page01_03.png') }}" alt="">
                                <span>Appointments
                                </span>
                            </a></li>
                        <li><a class="nav-link p-0 footer-nav" href="#"><img
                                    src="{{ url('public/images/Inner-page01_03.png') }}" alt="">
                                <span>Contact Us
                                </span>
                            </a></li>
                        <li><a class="nav-link p-0 footer-nav" href="#"><img
                                    src="{{ url('public/images/Inner-page01_03.png') }}" alt="">
                                <span>Smile Gallery
                                </span>
                            </a></li>
                        <li><a class="nav-link p-0 footer-nav" href="#"><img
                                    src="{{ url('public/images/Inner-page01_03.png') }}" alt="">
                                <span>Our Offices
                                </span>
                            </a></li>
                        <li><a class="nav-link p-0 footer-nav" href="#"><img
                                    src="{{ url('public/images/Inner-page01_03.png') }}" alt="">
                                <span>Patient Check-in
                                </span>
                            </a></li>
                    </ul>
                </div>
                <div class="col-lg-2 col-md-2 col-sm-12 col-12 ftr-submenu">
                    <h4 class="fter-submenu-head">Contact Us</h4>
                    <ul class="list-unstyled p-0 contat-us">

                        <li><a class="nav-link p-0 footer-nav" href="#"><i class="fa fa-phone"
                                    aria-hidden="true"></i>
                                <span>
                                    <em> Call Us :</em>
                                    <br>
                                    <strong>717-737-4337</strong>
                                </span>
                            </a></li>
                        <li><a class="nav-link p-0 footer-nav" href="#"><i class="fa fa-envelope"
                                    aria-hidden="true"></i>
                                <span>
                                    <em>Email:</em>
                                    <br>
                                    <strong> Info@gmail.com</strong>
                                </span>
                            </a></li>
                        <li><a class="nav-link p-0 footer-nav" href="#"><i class="fa fa-map-marker"
                                    aria-hidden="true"></i>
                                <span>
                                    <em>Location :</em> <br>
                                    <strong class="ftr-location"> 3920 Market Street, Camp
                                        Hill, PA 17011 Make an
                                        Appointment</strong>
                                </span>
                            </a></li>
                    </ul>
                </div>
            </div>
        </div>
        <hr>
        <div class="footer-privacy-policy">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12 col-12">

                        <ul class="navbar nav">
                            <li style="padding-left: 0px;">Sitemap</li>
                            <li style="border: none;">Privacy Policy</li>
                        </ul>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                        <p>© 2023 Shah Dental Clinic, PC. All Rights Reserved. | 3920 Market St. Camp Hill, PA
                            17011</p>
                    </div>
                </div>
            </div>

    </footer>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    {{-- <script src="{{ asset('js/jquery-1.4.3.min.js') }}"></script> --}}
    <script src="{{ url('public/js/jquery-1.4.3.min.js') }}"></script>

    {{-- <script type="text/javascript" src="{{ asset('js/jquery-ui-1.7.3.custom.min.js') }}"></script> --}}
    <script type="text/javascript" src="{{ url('public/js/jquery-ui-1.7.3.custom.min.js') }}"></script>
    {{-- <script src="{{ asset('js/jquery.easing.min.js') }}" type="text/javascript"></script> --}}
    <script src="{{ url('public/js/jquery.easing.min.js') }}" type="text/javascript"></script>
    {{-- <script type="text/javascript" src="{{ asset('js/pscripts.js') }}"></script> --}}
    <script type="text/javascript" src="{{ url('public/js/pscripts.js') }}"></script>
    {{-- <script language="javascript" type="text/javascript" src="{{ asset('js/actb.js') }}"></script> --}}
    <script language="javascript" type="text/javascript" src="{{ url('public/js/actb.js') }}"></script>
    {{-- <script language="javascript" type="text/javascript" src="{{ asset('js/common.js') }}"></script> --}}
    <script language="javascript" type="text/javascript" src="{{ url('public/js/common.js') }}"></script>
    {{-- <script language="javascript" src="{{ asset('js/ajax-call2.js') }}"></script> --}}
    <script language="javascript" src="{{ url('public/js/ajax-call2.js') }}"></script>
    {{-- <script language="javascript" src="{{ asset('js/CalendarPopup.js') }}"></script> --}}
    <script language="javascript" src="{{ url('public/js/CalendarPopup.js') }}"></script>
    <script language="javascript" src="https://momentjs.com/downloads/moment.js"></script>
    {{-- <script src="{{ asset('js/jquery.magnific-popup.mi n.js') }}"></script> --}}
    <script src="{{ url('public/js/jquery.magnific-popup.mi n.js') }}"></script>

    <script>
        $(document).ready(function() {

            $('input[type="radio"]').change(function() {
                if ($('#ic_number').is(':checked')) {
                    $('#check_value').val('1');
                } else {
                    $('#check_value').val('2');
                }
            });

            $("#At_Clinic").click(function() {
                $(".online_value").hide();
            });

            $("#online_option").click(function() {
                $(".online_value").show();
            });

            $("#passport-input").click(function() {
                $(".pass_box").show();
            });

            $("#ic_number").click(function() {
                $(".pass_box").hide();
            });

        });
    </script>

</body>
</html>
