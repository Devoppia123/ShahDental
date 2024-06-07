{{-- @extends('design.template')
@section('title', 'Shah Dental | Directions')
@section('customCSS')
    <style>
        /* Custom CSS for links */
        .custom-link {
            color: inherit;
            /* Blue color */
            text-decoration: none !important;
            /* Remove default underline */
        }

        .custom-link:hover {
            color: #0056b3;
            /* Darker blue on hover */
            text-decoration: underline;
            /* Underline on hover */
        }

        /* Google Map Css */
        #google-map {
            margin-top: 20px;
        }

        iframe {
            width: 100%;
            height: 450px;
            border: 0;
        }
    </style>

@endsection
@section('header-main')
    @include('design.header-main')
@endsection

@section('content')
    <div id="branches-main" class="main-section">
        <div class="container">
            <div class="branches-txt-blk all-txt-blk">
                <div class="branch-heading">
                    <h2>Our Branches</h2>
                    <p>Online to know about our locations and ease yourself in finding us wherever you are</p>
                </div>
            </div>
        </div>
    </div>
    <div id="appointment-main" class="main-section">
        <div class="container">
            <div class="appoint-txt-blk all-txt-blk">
                <div class="appoint-inner-block">
                    <div class="appoint-img-box appointment">
                        <img src="{{ url('public/images/Shah-Dental5_17.png') }}" alt="">
                        <a href="#" class="custom-link" data-location="Shah+Dental+Clinic+Gulshan-e-Iqbal+Karachi">
                            <h3>Shah Dental Clinic</h3>
                            <p>Gulshan-e-Iqbal, Karachi.</p>
                        </a>
                    </div>
                    <div class="appoint-img-box Doctor">
                        <img src="{{ url('public/images/Shah-Dental5_20.png') }}" alt="">
                        <a href="" class="custom-link" data-location="Dental+Art+Clinic+Phase+6+DHA+Karachi">
                            <h3>Dental Art Clinic</h3>
                            <p>Phase 6, DHA, Karachi</p>
                        </a>
                    </div>
                    <div class="appoint-img-box Call">
                        <img src="{{ url('public/images/Shah-Dental5_26.png') }}" alt="">
                        <a href="" class="custom-link" data-location="Prof+Syed+Shah+Faisal+Bahadurabad+Karachi">
                            <h3>Prof. Syed Shah Faisal <br>And Associates</h3>
                            <p> Bahadurabad, Karachi.</p>
                        </a>
                    </div>
                    <div class="appoint-img-box Directions">
                        <img src="{{ url('public/images/Shah-Dental5_32.png') }}" alt="">
                        <a href="#" class="custom-link" data-location="Shah+Dental+Clinic+Gulshan-e-Iqbal+Karachi">
                            <h3>Shah Dental Clinic</h3>
                            <p>Gulshan-e-Iqbal, Karachi.</p>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="container" id="google-map">
            <!-- The iframe for the Google Map will be dynamically inserted here -->
        </div>
    </div>
@endsection

@section('footer-main')
    @include('design.footer-main')
@endsection

@section('script')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.appoint-img-box a').forEach(function(link) {
                link.addEventListener('click', function(event) {
                    event.preventDefault();
                    const location = link.getAttribute('data-location');
                    const googleMapUrl = `https://www.google.com/maps?q=${location}&output=embed`;
                    const googleMapContainer = document.getElementById('google-map');
                    googleMapContainer.innerHTML =
                        `<iframe src="${googleMapUrl}" allowfullscreen></iframe>`;
                });
            });
        });
    </script>
@endsection
 --}}

@extends('design.template')
@section('title', 'Shah Dental | Directions')
@section('customCSS')
    <style>
        .no-underline {
            text-decoration: none;
            color: inherit;
        }

        #google-map {
            margin-top: 20px;
        }

        iframe {
            width: 100%;
            height: 450px;
            border: 0;
        }
    </style>
@endsection
@section('header-main')
    {{-- @include('design.header-main') --}}
    @include('inc.inner-header-header')

@endsection

@section('content')
    {{-- <div class="branch-heading">
        <h2>Directions</h2>
    </div> --}}
    <div id="appointment-main" class="main-section">
        <div class="container-xxl">
            <div class="appoint-txt-blk all-txt-blk">
                <div class="appoint-inner-block">
                    <div class="appoint-img-box appointment">
                        <a href="#" class="no-underline" data-location="Shah+Dental+Clinic+Gulshan-e-Iqbal+Karachi">
                            {{-- <img src="{{ url('public/images/Shah-Dental1_03.png') }}" alt=""> --}}
                            <img src="{{ url('public/images/Shah-Dental5_17.png') }}" alt="">
                            <h3>Shah Dental Clinic</h3>
                            <p>Gulshan-e-Iqbal, Karachi.</p>
                        </a>
                    </div>
                    <div class="appoint-img-box Doctor">
                        <a href="#" class="no-underline" data-location="Dental+Art+Clinic+Phase+6+DHA+Karachi">
                            {{-- <img src="{{ url('public/images/Shah-Dental1_05.png') }}" alt=""> --}}
                            <img src="{{ url('public/images/Shah-Dental5_20.png') }}" alt="">

                            <h3>Dental Art Clinic</h3>
                            <p>Phase 6, DHA, Karachi</p>
                        </a>
                    </div>
                    <div class="appoint-img-box Call">
                        <a href="#" class="no-underline" data-location="Prof+Syed+Shah+Faisal+Bahadurabad+Karachi">
                            {{-- <img src="{{ url('public/images/Shah-Dental1_07.png') }}" alt=""> --}}
                            <img src="{{ url('public/images/Shah-Dental5_26.png') }}" alt="">

                            <h3>Prof. Syed Shah Faisal
                                And Associates</h3>
                            <p>Bahadurabad, Karachi</p>
                        </a>
                    </div>

                    {{-- remove yasur shah dental record this is duplicate --}}
                    {{-- <div class="appoint-img-box Directions">
                        <a href="#" class="no-underline" data-location="Shah+Dental+Clinic+Gulshan-e-Iqbal+Karachi"> --}}
                    {{-- <img src="{{ url('public/images/Shah-Dental1_09.png') }}" alt=""> --}}
                    {{-- <img src="{{ url('public/images/Shah-Dental5_32.png') }}" alt="">

                            <h3>Shah Dental Clinic</h3>
                            <p>Gulshan-e-Iqbal, Karachi.</p>
                        </a>
                    </div> --}}
                </div>
            </div>
        </div>
        <div class="container" id="google-map">
        </div>
    </div>
@endsection

@section('footer-main')
    @include('design.footer-main')
@endsection

@section('script')
    {{-- Script to display map based on location --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Function to load map based on location
            function loadMap(location) {
                const googleMapUrl = `https://www.google.com/maps?q=${location}&output=embed`;
                const googleMapContainer = document.getElementById('google-map');
                googleMapContainer.innerHTML = `<iframe src="${googleMapUrl}" allowfullscreen></iframe>`;
            }

            // Get location data from URL query string
            const queryString = window.location.search;
            const urlParams = new URLSearchParams(queryString);
            const location = urlParams.get('location');

            // If location data is available, display map
            if (location) {
                loadMap(location);
            }

            // Update map on location click
            document.querySelectorAll('.appoint-img-box a').forEach(function(link) {
                link.addEventListener('click', function(event) {
                    event.preventDefault();
                    const location = link.getAttribute('data-location');
                    loadMap(location);

                    // Update the URL without reloading the page
                    history.pushState(null, '', `?location=${location}`);
                });
            });

            // Handle back/forward navigation
            window.addEventListener('popstate', function() {
                const newParams = new URLSearchParams(window.location.search);
                const newLocation = newParams.get('location');
                if (newLocation) {
                    loadMap(newLocation);
                } else {
                    document.getElementById('google-map').innerHTML = '';
                }
            });
        });
    </script>
@endsection
