<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointment Instructions </title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="{{ asset('css/Our-Speciality.css') }}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

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
                            @foreach ($show_details as $show)
                                <h1>Dr. {{ $show->doctor_name }}</h1>
                            @endforeach
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <section class="main-content-section">
        <div class="container">
            <div class="Cardiology">
                <h2 style="font-weight: 700;">Instructions</h2>
            </div>
            <div>
                <p>
                    Write down your symptoms: Before your appointment, make a list of any symptoms
                    you're experiencing, how long you've had them, and anything that seems to trigger or
                    alleviate them.
                </p>
                <p>
                    List your medications: Make a list of all the medications you're currently taking,
                    including over-the-counter drugs, vitamins, and supplements. Also, include the
                    dosage and frequency of each medication.
                </p>

                <p>
                    Bring your medical records: If you're seeing a new doctor, bring copies of any
                    relevant medical records, including past test results, x-rays, and treatment plans.
                </p>

                <p>
                    Bring your medical records: If you're seeing a new doctor, bring copies of any
                    relevant medical records, including past test results, x-rays, and treatment plans.
                </p>

                <p>
                    Prepare questions: Write down any questions you have for your doctor, so you don't
                    forget to ask them during your appointment. This could be anything from how to
                    manage a chronic condition to clarifying information about a new medication.
                </p>

                <p>
                    Arrive early: Give yourself plenty of time to get to your appointment, so you don't
                    feel rushed or stressed. If you're a new patient, arrive early to fill out any
                    necessary paperwork.
                </p>

                <p>
                    Wear comfortable clothing: Wear loose, comfortable clothing that's easy to remove,
                    in case your doctor needs to examine you.
                </p>

                <p>
                    Be honest: Be honest and open with your doctor about your symptoms, lifestyle, and
                    medical history. This will help them make an accurate diagnosis and develop an
                    effective treatment plan.
                </p>

                @foreach ($show_details_slots as $list)
                    @if ($list->session == null)
                        <div class="Cardiology">
                            <h2 style="font-weight: 700;">Doctor {{ $list->doctor_name }}</h2>
                        </div>
                        <div>
                            <p>Patient Name : {{ $list->patient_name }}</p>
                            <p>Patient Email : {{ $list->patient_email }}</p>
                            <p>Patient Phone : {{ $list->patient_phone }}</p>
                            <p>Date : {{ $list->schedule_date }}</p>
                            <p>Slot Timing : {{ $list->start_time }} to {{ $list->end_time }}</p>
                            <p>{{ $list->mode }}</p>
                        </div>
                        <a href="{{ url("/appointment_mail/$list->booking_id") }}" class="btn btn-primary"
                            id="inst-btn">Confirm Appointment</a>
                    @endif
                @endforeach

                @foreach ($show_details as $show)
                    @if ($show->slot_id == null)
                        <div class="Cardiology">
                            <h2 style="font-weight: 700;">Doctor {{ $show->doctor_name }}</h2>
                        </div>
                        <p>Patient Name : {{ $show->patient_name }}</p>
                        <p>Patient Email : {{ $show->patient_email }}</p>
                        <p>Patient Phone : {{ $show->patient_phone }}</p>
                        <p>Session : {{ $show->session_name }} ({{ $show->start_time }} - {{ $show->end_time }})</p>
                        <p>Appointment Date : {{ $show->appointment_date }}</p>
                        <a href="{{ url("/appointment_mail/$show->booking_id") }}" class="btn btn-primary"
                            id="inst-btn">Confirm Appointment</a>
                    @endif
                @endforeach
            </div>
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


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</body>

</html>
