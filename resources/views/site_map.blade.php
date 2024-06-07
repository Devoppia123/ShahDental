@extends('design.template')
@section('title', 'Shah Dental | Site Map')
@section('customCSS')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="{{ asset('css/Our-Speciality.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

    <style>
        .Our-services ul {
            list-style-type: circle;
            padding: 0;
        }

        .Our-services ul li {
            margin-bottom: 10px;
        }

        .Our-services ul li a {
            text-decoration: none;
            /* Remove underline */
            color: #1414b7;
            /* Change link color */
            font-weight: bold;
            /* Make the text bold */
            font-size: 18px;
            /* Adjust font size */
        }

        .Our-services ul li a:hover {
            color: #010101;
            /* Change link color on hover */
        }

        .Our-services h1 {
            font-size: 24px;
            /* Adjust heading size */
            margin-bottom: 20px;
            /* Add some space below the heading */
        }

        .container {
            margin-top: 2%;
        }
    </style>
@endsection
@section('header-main')
    {{-- @include('design.header-main') --}}
    @include('inc.inner-header-header')

@endsection
@section('content')
    <main>
        <section class="Our-services">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="white-box">
                            <ul>
                                <h2><strong>Header Pages:</strong></h2>
                                <li><a href="{{ url('/our-mission') }}">Our Mission</a></li>
                                <li><a href="{{ url('/message') }}">Message</a></li>
                                <li><a href="{{ url('/highlights') }}">Highlights</a></li>
                                <li><a href="{{ url('/all-articles') }}">Articles</a></li>
                                <li><a href="{{ url('/gallery') }}">Gallery</a></li>
                                <li><a href="{{ url('/services-treatments') }}">Service/Treatment</a></li>
                                <li><a href="{{ url('/contact-us') }}">Contact</a></li>
                                <li><a href="{{ url('/make-an-appointment') }}">Make An Appointment</a></li>
                                <li><a href="{{ url('/find-doctors') }}">Find Doctors</a></li>
                                <li><a href="{{ url('/callback') }}">Call Back</a></li>
                                <li><a href="{{ url('/branch-directions') }}">Directions</a></li>
                                <!-- Add more list items as needed -->
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="white-box">
                            <ul>
                                <h2><strong>Our Branches:</strong></h2>
                                <li><a
                                        href="{{ url('/branch-directions?location=Shah+Dental+Clinic+Gulshan-e-Iqbal+Karachi') }}">Shah
                                        Dental Clinic</a></li>
                                <li><a
                                        href="{{ url('/branch-directions?location=Dental+Art+Clinic+Phase+6+DHA+Karachi') }}">Dental
                                        Art Clinic</a></li>
                                <li><a
                                        href="{{ url('/branch-directions?location=Prof+Syed+Shah+Faisal+Bahadurabad+Karachi') }}">Prof.
                                        Syed Shah Faisal
                                        And Associates</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="white-box">
                            <ul>
                                <h2><strong>Meet The Team:</strong></h2>
                                <li><a href="{{ url('find-doctors') }}">Find Doctor</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="white-box">
                            <ul>
                                <h2><strong>Our Services:</strong></h2>
                                <li><a href="{{ url('/services_details/10') }}">Pediatric Dentistry Services</a></li>
                                <li><a href="{{ url('/services_details/7') }}">DENTURES</a></li>
                                <li><a href="{{ url('/services_details/6') }}">DENTAL SURGERIES</a></li>
                                <li><a href="{{ url('/services_details/5') }}">DENTAL IMPLANT</a></li>
                                <li><a href="{{ url('/services_details/3') }}">ORTHODONTICS</a></li>
                                <li><a href="{{ url('/services_details/2') }}">TOOTH CLEANING</a></li>
                                <li><a href="{{ url('/services_details/1') }}">ROOT CANAL TREATMENT</a></li>
                                <li><a href="{{ url('/all-services') }}">View All Services</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="white-box">
                            <ul>
                                <h2><strong>Articles:</strong></h2>
                                <li><a href="{{ url('/view_article/44') }}">Sedation Dentistry</a></li>
                                <li><a href="{{ url('/view_article/43') }}">Dental Trauma</a></li>
                                <li><a href="{{ url('/view_article/42') }}">Malocclusion</a></li>
                                <li><a href="{{ url('/view_article/2') }}">Accessing the Pulp Chamber</a></li>
                                <li><a href="{{ url('/view_article/3') }}">Cleaning and Shaping</a></li>
                                <li><a href="{{ url('/view_article/4') }}">Root Canal Treatment</a></li>
                                <li><a href="{{ url('/all-articles') }}">View All Articles</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="white-box">
                            <ul>
                                <h2><strong>Footer Pages:</strong></h2>
                                <li><a href="https://getphr.com/" target="_blank">Patient Check-In</a></li>
                                <li><a href="{{ url('/branch-directions') }}">Our Branches</a></li>
                                <li><a
                                        href="{{ url('/branch-directions?location=3920+Market+Street,+Camp+Hill,+PA+17011') }}">Location</a>
                                </li>
                                <li><a href="{{ url('/our-team') }}">Our Team</a></li>
                                <li><a href="http://www.webwooter.com" target="_blank">Webwooter Official Site</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="white-box">
                            <ul>
                                <h2><strong>Social Links:</strong></h2>
                                <li><a href="https://www.facebook.com/dentalartclinicpk/" target="_blank">Dental Art Clinic
                                        On Facebook</a></li>
                                <li><a href="https://www.facebook.com/shahdentalclinicSyedShahFaisal" target="_blank">Shah
                                        Dental Clinic On Facebook</a></li>
                                <li><a href="https://www.instagram.com/dentalartclinicc" target="_blank">Instragram</a></li>
                                <li><a href="https://twitter.com/SYEDSHA07606672" target="_blank">Twitter</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection

{{-- add script to redirect pages --}}

@section('footer-main')
    @include('design.footer-main')
@endsection
@section('script')

@endsection
