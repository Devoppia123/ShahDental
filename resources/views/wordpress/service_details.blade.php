<!doctype html>
<html lang="en">

<head>
    <title>Speciality Details</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/Our-Speciality.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"
        integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('plyr/plyr.css') }}">
    <script src="{{ asset('plyr/plyr.min.js') }}"></script>
</head>

<style>
    .doc-info-btn {
        text-decoration: none;
        color: #fff;
    }

    .doc-info-btn:hover {
        text-decoration: none;
        color: #fff;
    }

    .doctor-image {
        width: 180px;
        height: 170px;
        border-radius: 100%;
        border: 8px solid #9b212a;
        margin: 5px;
        box-shadow: rgba(34, 33, 33, 0.35) 0px 5px 20px;
    }

    .card-title b {
        font-size: 16px;
        margin-bottom: 10px !important;
        display: inline-block;
        height: 9px;
        margin-top: 15px;
    }


    .btn-appointment {
        background-color: #35b34a;
        color: #fff;
        text-decoration: none !important;
        font-size: 14px;
        padding: 12px 22px;
        border-radius: 5px;
        cursor: pointer;
    }

    .btn-appointment:hover {
        color: #fff;
    }

    .top {
        margin-top: 50px;
    }

    .health-video-content pre a {
        text-decoration: none;
        padding: 0px;
        text-align: left;
        color: #ffffff;
    }

    .btn-appointment.view-more-btn {
        display: block;
        position: absolute;
        left: 50%;
        transform: translateX(-50%);
        top: 450px;
        padding: 15px 50px;
    }

    .bottom-btn {
        margin: 1.6rem 0rem;
        color: #fff;
    }

    .bottom-btn a {
        color: #fff;
        text-decoration: none;
        cursor: pointer;
        font-size: 13px;
        margin: 0px 10px;
    }

    .plyr--video {
        height: 150px;
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
                            <h2>Services Details <br><span> {{ $speciality->speciality }}</span> </h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <main>
        <section class="speciality-name">
            <div class="container">
                <h2>{{ $speciality->speciality }}</h2>
                <h6>{!! $speciality->description !!}</h6>
            </div>
        </section>

        <section class="doctor-section" style="padding-bottom: 300px">
            <div class="container">
                <h1 style="color: white;font-weight: 900; margin-top:300px;">
                    Consultant Doctors</h1>
                <div class="row top" style="margin-bottom: 50px">
                    @foreach ($doctor as $index => $doc)
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                            {{-- style="{{ $index == 1 || $index == 2 ? 'margin-top: 50px;' : '' }}"> --}}
                            <div class="text-center">
                                <img class="card-img-top doctor-image"
                                    src="{{ asset("profile_image/$doc->profile_image") }}" alt="profile image">
                                @foreach ($doc->user_role as $user_role)
                                    <h4 class="card-title text-white" style="margin-bottom: 30px;"><b>
                                            {{ $user_role->name }}</b>
                                    </h4>
                                @endforeach
                                <a class="btn-appointment" href="{{ url("get_appointment/$doc->doctorID") }}">Get An
                                    Appointment</a>
                                <div class="bottom-btn">
                                    <a class="doc-info-btn" href="{{ url("doctor_profile/$doc->doctorID") }}">View
                                        Profile </a>|
                                    <a class="doc-info-btn" href="{{ url("ask_doctor/$doc->doctorID") }}">Ask
                                        Doctor</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <a class="btn-appointment text-center" href="{{ url('/find_doctors') }}">VIEW MORE >> </a>
            </div>
        </section>

        <section class="speciality-blog" style="margin: 150px">
            <div class="container">
                <h2>{{ $speciality->speciality }}</h2>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-4 col-md-4">
                            @if ($latest_article != null)
                                <div class="blog-sec-01">
                                    <img style="width: 300px" src="{{ asset("articles/$latest_article->image") }}"
                                        alt="">
                                    <h3 class="heading-tab-1">{{ $latest_article->title }}</h3>
                                    <p>{!! Str::limit($latest_article->description, 300) !!}</p>
                                    <a class="btn btn-success btn-sm"
                                        href="{{ url("/view_article/$latest_article->id ") }}">View Article</a>
                                </div>
                            @else
                                <h4>No Article</h4>
                            @endif
                        </div>
                        <div class="col-lg-8"
                            style="display: flex;
                    flex-direction: column;
                    align-items: center;">
                            @foreach ($articles as $article)
                                <div class="col-lg-10">
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <img style="width: 100%" src="{{ asset("articles/$article->image") }}">
                                        </div>
                                        <div class="col-lg-8" style="padding-left: 10px">
                                            <div class="blog-content">
                                                <h5>{{ $article->title }}</h5>
                                                <h6>
                                                    {!! Str::limit($article->description, 80) !!}<a
                                                        href="{{ url("/view_article/$article->id ") }}">Read More</a>
                                                </h6>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="related-videos">
            <div class="container">
                <div class="row">
                    <div class="col-lg-1"></div>
                    <div class="col-lg-10">
                        <div class="health-video-content">
                            <div class="row">
                                <h2>Related Videos</h2>
                                @foreach ($videos as $video)
                                    <div class="col-lg-4 col-md-6 col-sm-6 col-12 p-2 video-inner-frame">
                                        <div class="simple_video" data-plyr-provider="youtube"
                                            data-plyr-embed-id="{{ $video->link }}"
                                            data-plyr-config='{ "id": "{{ $video->id }}" }'></div>
                                        <h5>{{ $video->title }}</h5>
                                        <p>{!! Str::limit($video->description, 30) !!}</p>
                                        <a class="btn btn-primary btn-sm" href="{{ url("/view_video/$video->id") }}">
                                            View Video</a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-1"></div>
                </div>
            </div>
        </section>
    </main>

    <footer>
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
        const simple_video = Plyr.setup('.simple_video', {
            invertTime: false
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
        integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>
</body>

</html>
