<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor Profile</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="{{ asset('css/Our-Speciality.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('plyr/plyr.css') }}">
    <script src="{{ asset('plyr/plyr.min.js') }}"></script>
</head>
<style>
    .form-control {
        width: 95%;
    }

    .ask-doc-form label {
        margin-bottom: 5px;
        font-weight: 500;
    }

    .header_content h2 {
        font-size: 28px;
        margin-top: 5px;
        margin-bottom: 0px;
        color: #fff;
        font-weight: 600;
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
                            <h2>Video</h2>
                            <h1>{{ $video->title }}</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="container " style="padding-top: 50px">
        @if ($video->is_compulsory == 1)
            <div>
                <div class="simple_video" data-plyr-provider="youtube" data-plyr-embed-id="{{ $video->link }}"
                    data-plyr-config='{ "id": "{{ $video->id }}" }'>
                </div>
                <h1 class="text-center mt-5">{{ $video->title }}</h1>
                <h5>{{ $video->speciality }}</h5>
                <p>{!! $video->description !!}</p>
            </div>
        @else
            <div>
                <div class="simple_video" data-plyr-provider="youtube" data-plyr-embed-id="{{ $video->link }}"
                    data-plyr-config='{ "id": "{{ $video->id }}" }'>
                </div>
                <h1 class="text-center mt-5">{{ $video->title }}</h1>
                <h5>{{ $video->speciality }}</h5>
                <p>{!! $video->description !!}</p>
            </div>
        @endif
    </div>
    <footer>
        <hr>
        <div class="footer-bg">
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
                        <img src="images/before1_03.png" alt="">
                        <div class="footer-social-logo">
                            <i class="fa fa-facebook" aria-hidden="true"></i>
                            <i class="fa fa-instagram" aria-hidden="true"></i>
                            <i class="fa fa-twitter" aria-hidden="true"></i>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-12 col-12 ftr-submenu">
                        <h4 class="fter-submenu-head">Home </h4>
                        <img src="images/before1_03.png" alt="">
                        <ul class="list-unstyled p-0">
                            <li><a class="nav-link p-0 footer-nav" href="#"><img
                                        src="images/Inner-page01_03.png" alt="">
                                    <span>For Dentists
                                    </span>
                                </a></li>
                            <li><a class="nav-link p-0 footer-nav" href="#"><img
                                        src="images/Inner-page01_03.png" alt="">
                                    <span>For Parthners
                                    </span>
                                </a></li>
                            <li><a class="nav-link p-0 footer-nav" href="#"><img
                                        src="images/Inner-page01_03.png" alt="">
                                    <span>Directions</span>
                                </a></li>
                            <li><a class="nav-link p-0 footer-nav" href="#"><img
                                        src="images/Inner-page01_03.png" alt="">
                                    <span>Out Team
                                    </span>
                                </a></li>
                            <li><a class="nav-link p-0 footer-nav" href="#"><img
                                        src="images/Inner-page01_03.png" alt="">
                                    <span>Blog & News
                                    </span>
                                </a></li>
                            <li><a class="nav-link p-0 footer-nav" href="#"><img
                                        src="images/Inner-page01_03.png" alt="">
                                    <span>FAQ’s
                                    </span>
                                </a></li>
                        </ul>
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-12 col-12 ftr-submenu ">
                        <h4 class="fter-submenu-head">Quick Links</h4>
                        <img src="images/before1_03.png" alt="">
                        <ul class="list-unstyled p-0">
                            <li><a class="nav-link p-0 footer-nav" href="#"><img
                                        src="images/Inner-page01_03.png" alt="">
                                    <span>For Dentists
                                    </span>
                                </a></li>
                            <li><a class="nav-link p-0 footer-nav" href="#"><img
                                        src="images/Inner-page01_03.png" alt="">
                                    <span>Appointments
                                    </span>
                                </a></li>
                            <li><a class="nav-link p-0 footer-nav" href="#"><img
                                        src="images/Inner-page01_03.png" alt="">
                                    <span>Contact Us
                                    </span>
                                </a></li>
                            <li><a class="nav-link p-0 footer-nav" href="#"><img
                                        src="images/Inner-page01_03.png" alt="">
                                    <span>Smile Gallery
                                    </span>
                                </a></li>
                            <li><a class="nav-link p-0 footer-nav" href="#"><img
                                        src="images/Inner-page01_03.png" alt="">
                                    <span>Our Offices
                                    </span>
                                </a></li>
                            <li><a class="nav-link p-0 footer-nav" href="#"><img
                                        src="images/Inner-page01_03.png" alt="">
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
                        <p>© 2023 Shah Dental Clinic, PC. All Rights Reserved. | 3920 Market St. Camp Hill, PA 17011</p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <script>
        const compulsory_video = Plyr.setup('.compulsory_video', {
            invertTime: false,
            controls: ['play', 'current-time', 'mute', 'volume', 'settings', 'fullscreen']
        });


        const simple_video = Plyr.setup('.simple_video', {
            invertTime: false
        });
    </script>
</body>
</html>
