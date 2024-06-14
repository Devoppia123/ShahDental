<div class="@php
$url = $_SERVER['REQUEST_URI']; // Get the current URL
        
        // Split the URL by "/" and get the last element
        $parts = explode("/", $url);
        $id = end($parts);

        // Check if the URL contains "services_details/" and display the title accordingly
        if (strpos($url, 'services_details/') !== false) {
            echo 'service-details ';
        }
        else if(strpos($url, 'view_article/') !== false){
            echo 'View_Articles ';
        } 
        else if(strpos($url, 'doctor_profile/') !== false){
            echo 'doctor-profile ';
        } 
        else if(strpos($url, 'get_appointment/') !== false){
            echo 'get-appointment-2 ';
        } 
        elseif (strpos($url, 'ask_doctor/') !== false) {
            echo 'ask_doctor-1';
        }
        elseif (strpos($url, 'view_video/') !== false) {
            echo 'view_video';
        }
        else {
            $path = request()->path();
    switch ($path) {
        case 'our-mission':
            echo 'our-mission';
            break;
        case 'message':
            echo 'message';
            break;
        case 'highlights':
            echo 'highlights';
            break;
        case 'all-articles':
            echo 'all-articles';
            break;
        case 'gallery':
            echo 'gallery';
            break;
        case 'services-treatments':
            echo 'services-treatments';
            break;
        case 'contact-us':
            echo 'contact-us';
            break;
        case 'make-an-appointment':
            echo 'make-an-appointment';
            break;
        case 'site_map':
            echo 'site_map';
            break;
        case 'branch-directions':
            echo 'branch-direction';
            break;
        case 'find-doctors':
            echo 'find-doctors';
            break;
        case 'all-services':
            echo 'all-services';
            break;
        case 'our-team':
            echo 'our-team-1';
            break;
        case 'branch-directions':
            echo 'branch-directions';
            break;
        case 'our-team':
            echo 'our_team';
            break;
        default:
            echo 'callback';
            break;
    }} @endphp"
    id="header-inner">
    <div class="container-xxl">
        <div class="header-txt-blk all-txt-blk">
            <div class="top-header row">
                <div class="top-r">
                    <div class="address">    
                      <div class="row">
                        <div class="col-lg-3 col-md-3">
                          <div class="top-image-box call-us"><span>
                            <img src="{{ url('public/images/Shah-Dental_03.png') }}" alt="03">
                            <span class="call-bold"><a href="tel:02134963440">02134963440</a></span>
                            </span>          
                          </div>
                        </div>
                        <div class="col-lg-3 col-md-3">
                          <p>Gulshan-e-Iqbal: <a href="tel:02134963440">021-34963440</a></p>
                        </div>
                        <div class="col-lg-3 col-md-3">
                          <p>Bahadurabad Branch: <a href="tel:03341326378">03341326378</a></p>
                        </div>
                        <div class="col-lg-3 col-md-3">
                          <p>DHA Branch: <a href="tel:02135243482">021-35243482</a></p>
                        </div>
                      </div>                        
                    </div>
                </div>
            </div>
            <div class="mian-nav">
                <nav class="navbar navbar-expand-xl navbar-light">
                    <a class="navbar-brand" href="{{ url('/') }}">
                        <img src="{{ url('public/images/logo_03.png') }}" alt=""
                            class="d-inline-block align-text-top cus-logo">
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                        <ul class="navbar-nav">
                            <li class="nav-item"><a class="nav-link" href="{{ url('/our-mission') }}">Our Mission</a>
                            </li>
                            <li class="nav-item"><a class="nav-link" href="{{ url('/message') }}">Message</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ url('/highlights') }}">Highlights</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ url('/all-articles') }}">Articles</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ url('/gallery') }}">Gallery</a></li>
                            <li class="nav-item"><a class="nav-link"
                                    href="{{ url('/services-treatments') }}">Services/Treatments</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ url('/contact-us') }}">Contact</a></li>
                            <li class="nav-item"><a class="nav-link nav-btn-01"
                                    href="{{ url('/make-an-appointment') }}">MAKE AN APPOINTMENT</a></li>
                        </ul>
                    </div>
                </nav>
            </div>
            <div class="home-banner-content">
                {{-- Display Success and Fail Status --}}
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif

                <div id="banner-block-01 row">
                    <div class="inner-heading">
                        <h1>
                            <strong>
                                <?php
                                $url = $_SERVER['REQUEST_URI']; // Get the current URL
                                
                                // Split the URL by "/" and get the last element
                                $parts = explode('/', $url);
                                $id = end($parts);
                                
                                // Check if the URL contains "services_details/" and display the title accordingly
                                if (strpos($url, 'services_details/') !== false) {
                                    echo 'Service Details ';
                                } elseif (strpos($url, 'view_article/') !== false) {
                                    echo 'View Articles ';
                                } elseif (strpos($url, 'doctor_profile/') !== false) {
                                    echo 'Doctor Profile ';
                                } elseif (strpos($url, 'get_appointment/') !== false) {
                                    echo 'Get Appointment ';
                                } elseif (strpos($url, 'ask_doctor/') !== false) {
                                    echo 'Ask Doctor ';
                                } elseif (strpos($url, 'view_video/') !== false) {
                                    echo 'View Video ';
                                }
                                else {
                                    $path = request()->path();
                                    switch ($path) {
                                        case 'our-mission':
                                            echo 'Our Mission';
                                            break;
                                        case 'message':
                                            echo 'Message';
                                            break;
                                        case 'highlights':
                                            echo 'Highlights';
                                            break;
                                        case 'all-articles':
                                            echo 'Articles';
                                            break;
                                        case 'gallery':
                                            echo 'Gallery';
                                            break;
                                        case 'services-treatments':
                                            echo 'Services/Treatments';
                                            break;
                                        case 'contact-us':
                                            echo 'Contact Us';
                                            break;
                                        case 'make-an-appointment':
                                            echo 'Make an Appointment';
                                            break;
                                        case 'site_map':
                                            echo 'Site Map';
                                            break;
                                        case 'find-doctors':
                                            echo 'find doctors';
                                            break;
                                        case 'branch-directions':
                                            echo 'Branch Direction';
                                            break;
                                        case 'all-services':
                                            echo 'All Services';
                                            break;
                                        case 'our-team':
                                            echo 'Our Team';
                                            break;
                                        default:
                                            echo 'Call Back';
                                            break;
                                    }
                                }
                                ?>

                            </strong>
                        </h1>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

</div>

</div>
