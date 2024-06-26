<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Get An Appointment</title>
    <link type="text/css" href="{{ asset('css/jquery-ui-1.7.3.custom.css') }}" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/Our-Speciality.css') }}">
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

    #skip {
        display: none;
    }

    #get_appointment_form {
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

    .ui-icon {
        width: 16px;
        height: 16px;
        background-image: url({{ asset('images/arrow-next.png') }});
    }

    .ui-widget-content .ui-icon {
        background-image: url("{{ asset('images/arrow-next.png') }}");
        background-repeat: no-repeat;
        background-position: center;
        background-size: cover;
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
                            <img src="{{ asset('images/logo.png') }}" alt="">
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
                                        <a class="nav-link active"
                                            href="http://www.essamtalks.com/shah-dental/our-mission/"
                                            aria-current="page">Our Mission <span
                                                class="visually-hidden">(current)</span></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link"
                                            href="http://www.essamtalks.com/shah-dental/message/">Message</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link"
                                            href="http://www.essamtalks.com/shah-dental/highlights/">Highlights</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#">Articles</a>
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
                                            href="http://www.essamtalks.com/shah-dental/services-treatments/">Services/Treatments</a>
                                    </li>
                                    <li class="nav-item" style="border: none;">
                                        <a class="nav-link" href="https://fh2.getphr.com/contact_us">Contact</a>
                                    </li>
                                    <li class="nav-item " style="border: none;">
                                        <a class="nav-link make_appoitnment_btn"
                                            href="https://fh2.getphr.com/get_appointment/62">Make an
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
                            <h2>Get An Appointment From</h2>
                            <h1>{{ $doctor->name }}</h1>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="text-center p-5 row" id="show-section">
        <div class="col-md-6">
            <h3>Get An Appointment As A Guest</h3>
            <button class="btn btn-success" id="btn-skip">Get An Appointment</button>
        </div>
        <div class="col-md-6">
            <h3>Login To Your Personal Health Record</h3>
            <form action="https://getphr.com/" method="get">
                <input type="hidden" name="hospID" value="7" id="">
                <button class="btn btn-primary" type="submit" target="blank">Login</button>
            </form>
        </div>
    </div>
    <section class="main-content-section container">
        <div id="skip" class="container">
            <div class="half_leftcol_app">
                <h5>Please Select a Date</h5>
                <div id="datepicker" style="width:100%;"></div>
            </div>
            <div class="Cardiology">
                <h2 style="font-weight: 700;" id="hide">Get An Appointment From {{ $doctor->name }}</h2>
            </div>
            <form action="{{ url('booked_appointment_withoutlogin') }}" method="POST" id="get_appointment_form">
                @csrf
                <input type="hidden" id="date_input" name="appointment_date" value="">
                <input type="hidden" name="doctor_id" value="{{ $doctor->id }}">
                <div class="row">
                    <div class="col-md-4 p-2 form-group">
                        <label>Full Name</label>
                        <input type="text" name="patient_name" class="form-control">
                    </div>
                    <div class="col-md-4 p-2 form-group">
                        <label>Email </label>
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
                        <label>Phone</label>
                        <input type="text" name="patient_phone" class="form-control">
                    </div>
                    <div class="col-md-4 p-2 form-group" id="show-slots" style="display: none;">
                        <label>Available Slots</label>
                        <div id="appointments-container">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <p>Gender</p>
                    <div class="col-md-4 p-2 form-group">
                        <input type="radio" name="gender" value="1">
                        <label>Male</label>
                    </div>
                    <div class="col-md-4 p-2 form-group">

                        <input type="radio" name="gender" value="0">
                        <label>Female</label>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-4 p-2 form-group">
                        <label>Age (Optional)</label>
                        <input type="text" name="age" class="form-control">
                    </div>
                    <div class="col-md-4 p-2 form-group">
                        <label>DOB (Optional)</label>
                        <input type="date" name="dob" class="form-control">
                    </div>
                </div>
                <div>
                    <div class="col-md-6 services-col-multi">
                        <label>Select Procedure (Optional)</label>
                        <select name="appointment_procedure" class="form-control">
                            <option value="">Select Procedure</option>
                            @foreach ($procedures as $procedure)
                                <option value="{{ $procedure->id }}">{{ $procedure->name }}</option>
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
                        <img src="{{ asset('images/logo.png') }}" alt="">
                    </div>
                    <h5>With Verber Family Dentistry, what you see is what you get. All of the photos that you see
                        on our
                        website are the real deal: our team, our office, and our patients. These photos capture us
                        in our
                        day-to-day work as we strive to provide the best care for your smile!
                    </h5>
                    <h4 class="fter-submenu-head">Follow Us :</h4>
                    <img src="{{ asset('images/before1_03.png') }}" alt="">
                    <div class="footer-social-logo">
                        <i class="fa fa-facebook" aria-hidden="true"></i>
                        <i class="fa fa-instagram" aria-hidden="true"></i>
                        <i class="fa fa-twitter" aria-hidden="true"></i>
                    </div>
                </div>
                <div class="col-lg-2 col-md-2 col-sm-12 col-12 ftr-submenu">
                    <h4 class="fter-submenu-head">Home </h4>
                    <img src="{{ asset('images/before1_03.png') }}" alt="">
                    <ul class="list-unstyled p-0">
                        <li><a class="nav-link p-0 footer-nav" href="#"><img
                                    src="{{ asset('images/Inner-page01_03.png') }}" alt="">
                                <span>For Dentists
                                </span>
                            </a></li>
                        <li><a class="nav-link p-0 footer-nav" href="#"><img
                                    src="{{ asset('images/Inner-page01_03.png') }}" alt="">
                                <span>For Parthners
                                </span>
                            </a></li>
                        <li><a class="nav-link p-0 footer-nav" href="#"><img
                                    src="{{ asset('images/Inner-page01_03.png') }}" alt="">
                                <span>Directions</span>
                            </a></li>
                        <li><a class="nav-link p-0 footer-nav" href="#"><img
                                    src="{{ asset('images/Inner-page01_03.png') }}" alt="">
                                <span>Out Team
                                </span>
                            </a></li>
                        <li><a class="nav-link p-0 footer-nav" href="#"><img
                                    src="{{ asset('images/Inner-page01_03.png') }}" alt="">
                                <span>Blog & News
                                </span>
                            </a></li>
                        <li><a class="nav-link p-0 footer-nav" href="#"><img
                                    src="{{ asset('images/Inner-page01_03.png') }}" alt="">
                                <span>FAQ’s
                                </span>
                            </a></li>
                    </ul>
                </div>
                <div class="col-lg-2 col-md-2 col-sm-12 col-12 ftr-submenu ">
                    <h4 class="fter-submenu-head">Quick Links</h4>
                    <img src="{{ asset('images/before1_03.png') }}" alt="">
                    <ul class="list-unstyled p-0">
                        <li><a class="nav-link p-0 footer-nav" href="#"><img
                                    src="{{ asset('images/Inner-page01_03.png') }}" alt="">
                                <span>For Dentists
                                </span>
                            </a></li>
                        <li><a class="nav-link p-0 footer-nav" href="#"><img
                                    src="{{ asset('images/Inner-page01_03.png') }}" alt="">
                                <span>Appointments
                                </span>
                            </a></li>
                        <li><a class="nav-link p-0 footer-nav" href="#"><img
                                    src="{{ asset('images/Inner-page01_03.png') }}" alt="">
                                <span>Contact Us
                                </span>
                            </a></li>
                        <li><a class="nav-link p-0 footer-nav" href="#"><img
                                    src="{{ asset('images/Inner-page01_03.png') }}" alt="">
                                <span>Smile Gallery
                                </span>
                            </a></li>
                        <li><a class="nav-link p-0 footer-nav" href="#"><img
                                    src="{{ asset('images/Inner-page01_03.png') }}" alt="">
                                <span>Our Offices
                                </span>
                            </a></li>
                        <li><a class="nav-link p-0 footer-nav" href="#"><img
                                    src="{{ asset('images/Inner-page01_03.png') }}" alt="">
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
    <script src="{{ asset('js/jquery-1.4.3.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/jquery-ui-1.7.3.custom.min.js') }}"></script>
    <script>
        $(document).ready(function() {

            $('input[type="radio"]').change(function() {
                if ($('#ic_number').is(':checked')) {
                    $('#check_value').val('1');
                } else {
                    $('#check_value').val('2');
                }
            });

            $('#btn-skip').click(function() {
                $('#skip').show();
                $('#show-section').hide();
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

            $(function() {
                function initializeDatePicker() {
                    $("#datepicker").datepicker({
                        minDate: +1,
                        numberOfMonths: 2,
                        beforeShowDay: function(date) {
                            var day = date.getDay();
                            var formattedDate = $.datepicker.formatDate('dd-mm-yyyy', date);

                            if (date < new Date()) {
                                return [false, 'past-date'];
                            }

                            return [true, ''];
                        },
                        onSelect: function(date) {
                            $('#date_input').val(date);
                            $('#show-slots').show();
                            fetchslots(date);
                        }
                    });
                    $("#datepicker").datepicker("option", "dateFormat", "dd-mm-yy");
                }

                initializeDatePicker();

                function fetchslots(date) {
                    $.ajax({
                        url: "{{ url('show_slots') }}/{{ $doctor_id }}",
                        type: "GET",
                        data: {
                            dateas: date
                        },
                        dataType: "json",
                        success: function(response) {
                            var appointmentData = response;
                            var html = "";

                            if (appointmentData[0].slot_id !== undefined) {
                                html += '<label>Appointment Slots</label><br/>';
                                $.each(appointmentData, function(index, appointment) {
                                    html +=
                                        '<input type="radio" style="margin: 5px;" name="get_value" id="slot_id' +
                                        index + '" value="' + appointment.slot_id +
                                        '"> ' +
                                        appointment.start_time + ' - ' + appointment
                                        .end_time;
                                });
                            } else {
                                html += '<label>Appointment Sessions</label><br/>';
                                $.each(appointmentData, function(index, appointment) {
                                    var startTime = appointment.start_time ? appointment
                                        .start_time : '';
                                    var endTime = appointment.end_time ? ' - ' +
                                        appointment.end_time : '';
                                    html +=
                                        '<input type="radio" style="margin-right: 5px;" name="session_id" id="session' +
                                        index + '"  value="' + appointment.id +
                                        '">' + appointment.session_name + ' (' +
                                        startTime + endTime + ') ' + '<br/>';
                                });
                            }

                            $("#appointments-container").html(html);
                            $("#hide").show();
                            $("#get_appointment_form").show();
                        },
                        error: function(xhr, status, error) {
                            console.log(xhr.responseText);
                        }
                    });
                }

            });
        });
    </script>


</body>

</html>
