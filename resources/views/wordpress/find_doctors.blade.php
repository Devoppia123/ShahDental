<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DOCTOR-PROFILE</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="{{ url('public/css/Doc_Profile_Page.css') }}">
    <link rel="stylesheet" href="{{ url('public/css/Our-Speciality.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script> --}}
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"
        integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
</head>

<style>
    .doc-profile-btn {
        position: absolute;
        top: -10px;
        right: -20px;
        text-transform: capitalize;
        text-decoration: none;
        color: #fff;
        padding: 5px 10px;
        background-color: transparent;
        border: 1px solid #264e71;
        border-radius: 6px;
        font-size: 13px;
        display: inline-block;
        margin: 10px 0px;
        float: left;
    }

    .doc-card-img h5 {
        color: #000;
    }

    .gender_feild {
        margin-left: 30px;
    }

    .show-doc-card-content h5 {
        color: #fff !important;
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
                            <div class="container">
                                <h1>Find Doctor, Make an Appointment</h1>
                                <h6>Discover the best doctors,clinics and hospital the city near you.</h6>
                                <br><br>
                                <a href="#main-content-wrapper"> <i class="fa fa-angle-down go-down"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <section>
        <div class="container">
            <div class="header-sec">
                <form action="">
                    <div class="row" style="align-items: center;">

                        <div class="col-lg-5 col-md-5 col-sm-12 col-12 side-bar-search">
                            <label for="Srch-doc">Search Doctor Name & Speciality</label><br>
                            <div class="search">
                                <input type="text" id="input_doctor_search" class="form-control"
                                    onkeyup="find_doctors_search()" placeholder="Search Doctor Name & Speciality">
                            </div>
                        </div>
                        <div class="col-lg-5 col-md-5 col-sm-12 col-12">
                            <div class="gender_feild">
                                <label for="Srch-doc">Gender</label><br>
                                <button class="gender-btn" id="male-btn" type="button">Male</button>
                                <button class="gender-btn" id="female-btn" type="button">Female</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <section class="main-content-section" id="main-content-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                    <ul id="doctor-list" class="doc-card-u-list">
                        @foreach ($doctors as $doc)
                            <li>
                                <div class="row doc-card-content">
                                    <div class="col-lg-6 doc-card-img">
                                        <img style="border-radius: 98%; height:120px!important; width:130px !important;margin-bottom:10px"
                                            {{-- src="{{ asset("profile_image/$doc->profile_image") }}" alt=""> --}}
                                            src="{{ url("public/profile_image/$doc->profile_image") }}" alt="">
                                        <br>
                                        @foreach ($doc->user_role as $user_role)
                                            <h5>{{ $user_role->name }}</h5>
                                        @endforeach
                                    </div>
                                    <div class="col-lg-6 doc-card-info" style="display: none;">
                                        <h6>Degree</h6>
                                        <h5>{{ $doc->education }}</h5>
                                        <h6>Speciality</h6>
                                        @foreach ($doc->doctor_specaility as $doctor_specaility)
                                            @foreach ($doctor_specaility->specialities_list as $specialities_record)
                                                <h5>{{ $specialities_record->speciality }}</h5>
                                            @endforeach
                                        @endforeach
                                        @foreach ($doc->user_role as $user_role)
                                            <a href="{{ url("/doctor_profile/$user_role->id") }}"
                                                class="doc-profile-btn">Veiw
                                                Profile</a>
                                            <a style="margin-top:40px;"
                                                href="{{ url("/get_appointment/$user_role->id") }}"
                                                class="doc-profile-btn">Get An Appointment
                                            </a>
                                        @endforeach
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <footer>
        <hr>
        <div class="footer-bg">
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
                        <img src="{{ url('public/images/before1_03.png') }}" alt="">
                        <div class="footer-social-logo">
                            <i class="fa fa-facebook" aria-hidden="true"></i>
                            <i class="fa fa-instagram" aria-hidden="true"></i>
                            <i class="fa fa-twitter" aria-hidden="true"></i>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-12 col-12 ftr-submenu">
                        <h4 class="fter-submenu-head">Home </h4>
                        <img src="{{ url('public/images/before1_03.png') }}" alt="">
                        <ul class="list-unstyled p-0">
                            <li><a class="nav-link p-0 footer-nav" href="#"><img
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
                        <img src="{{ url('public/images/before1_03.png') }}" alt="">
                        <ul class="list-unstyled p-0">
                            <li><a class="nav-link p-0 footer-nav" href="#"><img
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
        function find_doctors_search() {
            var search = $('#input_doctor_search').val();
            $.ajax({
                url: "{{ url('/find_doctors_search') }}",
                type: 'GET',
                data: {
                    search: search
                },
                dataType: 'json',
                success: function(data) {
                    var html = '';
                    $.each(data, function(index, doctor) {
                        if (doctor.user_role && doctor.user_role[0] && doctor.user_role[0].name) {
                            html += '<li>';
                            html += '<div class="row doc-card-content">';
                            html += '<div class="col-lg-6 doc-card-img">';
                            html +=
                                '<img style="border-radius: 98%;height:120px!important; width:130px !important;margin-bottom:10px" src="{{ asset('profile_image/') }}/' +
                                doctor.profile_image + '" alt="">';
                            html += '<br>';
                            html += '<h5> ' + doctor.user_role[0].name + '</h5>';
                            html += '</div>';
                            html += '<div class="col-lg-6 doc-card-info" style="display: none;">';
                            html += '<h6>Degree</h6>';
                            html += '<h5>' + doctor.education + '</h5>';
                            html += '<h6>Speciality</h6>';
                            $.each(doctor.doctor_specaility, function(index,
                                doctor_specaility) {
                                $.each(doctor_specaility.specialities_list, function(
                                    index,
                                    specialty_record) {
                                    html += '<h5>' + specialty_record
                                        .speciality + '</h5>';
                                });
                            });
                            html += '<a href="/doctor_profile/' + doctor.user_role[0].id +
                                '" class="doc-profile-btn">View Profile</a>';
                            html += '<a href="/get_appointment/' +
                                doctor.user_role[0].id +
                                '" style="margin-top:40px;" class="doc-profile-btn">Get An Appointment</a>';
                            html += '</div>';
                            html += '</div>';
                            html += '</li>';
                        }
                    });
                    var doctorList = $('#doctor-list');
                    if (html === '') {
                        html = '<li>No doctors found.</li>';
                    }
                    doctorList.html(html);
                }
            });
        }

        $(document).on('click', '#male-btn', function() {
            var search = "1";
            $.ajax({
                url: "/male_filter",
                type: 'GET',
                data: {
                    search: search
                },
                dataType: 'json',
                success: function(data) {
                    var html = '';
                    $.each(data, function(index, doctor) {
                        if (doctor.user_role && doctor.user_role[0] && doctor.user_role[0]
                            .name) {
                            html += '<li>';
                            html += '<div class="row doc-card-content">';
                            html += '<div class="col-lg-6 doc-card-img">';
                            html +=
                                '<img style="border-radius: 98%;height:120px!important; width:130px !important;margin-bottom:10px" src="{{ asset('profile_image/') }}/' +
                                doctor.profile_image + '" alt="">';
                            html += '<br>';
                            html += '<h5> ' + doctor.user_role[0].name + '</h5>';
                            html += '</div>';
                            html +=
                                '<div class="col-lg-6 doc-card-info" style="display: none;">';
                            html += '<h6>Degree</h6>';
                            html += '<h5>' + doctor.education + '</h5>';
                            html += '<h6>Specialty</h6>';
                            $.each(doctor.doctor_specaility, function(index,
                                doctor_specaility) {
                                $.each(doctor_specaility.specialities_list, function(
                                    index,
                                    specialty_record) {
                                    html += '<h5>' + specialty_record
                                        .speciality + '</h5>';
                                });
                            });
                            html += '<a href="/doctor_profile/' + doctor.user_role[0].id +
                                '" class="doc-profile-btn">View Profile</a>';
                            html += '<a href="/get_appointment/' + doctor.user_role[0].id +
                                '" style="margin-top:40px;" class="doc-profile-btn">Get An Appointment</a>';
                            html += '</div>';
                            html += '</div>';
                            html += '</li>';
                        }
                    });
                    var doctorList = $('#doctor-list');
                    if (html === '') {
                        html = '<li>No doctors found.</li>';
                    }
                    doctorList.html(html);
                }
            });
        });


        $(document).on('click', '#female-btn', function() {
            var search = "0";
            $.ajax({
                url: "/male_filter",
                type: 'GET',
                data: {
                    search: search
                },
                dataType: 'json',
                success: function(data) {
                    var html = '';
                    $.each(data, function(index, doctor) {
                        if (doctor.user_role && doctor.user_role[0] && doctor.user_role[0]
                            .name) {
                            html += '<li>';
                            html += '<div class="row doc-card-content">';
                            html += '<div class="col-lg-6 doc-card-img">';
                            html +=
                                '<img style="border-radius: 98%;height:120px!important; width:130px !important;margin-bottom:10px" src="{{ asset('profile_image/') }}/' +
                                doctor.profile_image + '" alt="">';
                            html += '<br>';
                            html += '<h5> ' + doctor.user_role[0].name + '</h5>';
                            html += '</div>';
                            html +=
                                '<div class="col-lg-6 doc-card-info" style="display: none;">';
                            html += '<h6>Degree</h6>';
                            html += '<h5>' + doctor.education + '</h5>';
                            html += '<h6>Speciality</h6>';
                            $.each(doctor.doctor_specaility, function(index,
                                doctor_specaility) {
                                $.each(doctor_specaility.specialities_list, function(
                                    index,
                                    specialty_record) {
                                    html += '<h5>' + specialty_record
                                        .speciality + '</h5>';
                                });
                            });
                            html += '<a href="/doctor_profile/' + doctor.user_role[0].id +
                                '" class="doc-profile-btn">View Profile</a>';
                            html += '<a href="/get_appointment/' +
                                doctor.user_role[0].id +
                                '" style="margin-top:40px;" class="doc-profile-btn">Get An Appointment</a>';
                            html += '</div>';
                            html += '</div>';
                            html += '</li>';
                        }
                    });
                    var doctorList = $('#doctor-list');
                    if (html === '') {
                        html = '<li>No doctors found.</li>';
                    }
                    doctorList.html(html);
                }
            });
        });




        $(document).on('mouseleave', '.doc-card-content', function() {
            $(this).closest('.doc-card-content').removeClass('show-doc-card-content');
            $(this).closest('.doc-card-content').css('position', 'inherits');
            $(this).closest('.doc-card-content').css('margin-left', '0px');
            $(this).closest('.doc-card-content img').css('margin-bottom', '0px');
            $(this).closest('.doc-card-content').css('z-index', '0');
            $('.doc-card-info').hide();
            $(this).closest('.doc-card-content').css('background-color', 'transparent');
        })
        $(document).on('mouseenter', '.doc-card-img img', function() {
            $(this).closest('.doc-card-content').addClass('show-doc-card-content');
            $(this).closest('.doc-card-content').css('background-color', '#0d3a61');
            $(this).closest('.doc-card-content').css('position', 'relative');
            $(this).closest('.doc-card-content').css('margin-left', '-100px');
            $(this).closest('.doc-card-content img').css('margin-bottom', '10px');
            $(this).closest('.doc-card-content').css('z-index', '999');
            $(this).closest('.doc-card-content h5').css('color', '#fff');
            $(this).parent().next().show();
        })
    </script>

</body>

</html>
