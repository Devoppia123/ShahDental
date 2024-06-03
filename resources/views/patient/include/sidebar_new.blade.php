 <style>
     .tab-inner-tabs-links {
         position: inherit;
         padding: 0px;
         text-align: start;
     }
 </style>
 @php
     $id = Session('user')['id'];
 @endphp
 <div class="left-sidebar-pro">
     <nav id="sidebar" class="">
         <div class="tabs-nav col">
             <div class="sidebar-hdr-left">
                 <a class="main-logo-link" href="index.html">
                     {{-- <img class="main-logo" src="{{ asset('images/logo.png') }}" alt=""> --}}
                     <img class="main-logo" src="{{ url('public/images/logo_03.png') }}" alt="">
                 </a>
             </div>
             <nav>
                 <a class="side-bar-anchor-selected @if (Request::is(
                         'home',
                         'find_doctor_appointment',
                         'book_appointment/*',
                         'appointment-instructions/*',
                         'view_booked_appointment/*',
                         'change_password/*')) selected @endif" id="side-bar-1"
                     onclick="show_parts(1);">
                     {{-- <img src="{{ asset('patient/images/sidebar-icon-1.png') }}" --}}
                     <img src="{{ url('public/patient/images/sidebar-icon-1.png') }}"
                         alt=""></a>
             </nav>
         </div>
         <div class="tabs tabs-content col">
             <h2 class="pg-title">Dashboard</h2>
             <div class="content">
                 <div class="inner-nav">
                     <div class="notification-head">
                         <strong>Notifications</strong>
                         <h6>Show all <span>143</span></h6>
                     </div>
                     <ul class="nav-list @if (Request::is(
                             'home',
                             'find_doctor_appointment',
                             'book_appointment/*',
                             'appointment-instructions/*',
                             'view_booked_appointment/*',
                             'change_password/*')) visible @endif " id="nav-list-1">
                         <li class="active-noti @if (Request::is('home')) active @endif">
                             <a class="tab-inner-tabs-links" style="margin-top:-12px" href="{{ url('/home') }}">
                                 <h6>Home Page</h6>
                                 <h5>Coca Juice Website</h5>
                             </a>
                         </li>

                         <li class="active-noti @if (Request::is('find_doctor_appointment', 'appointment-instructions/*', 'book_appointment/*')) active @endif">
                             <a class="tab-inner-tabs-links" style="margin-top:-12px"
                                 href="{{ url('/find_doctor_appointment') }}">
                                 <h6>Get Appointment</h6>
                                 <h5>Coca Juice Website</h5>
                             </a>
                         </li>

                         <li class="active-noti @if (Request::is('view_booked_appointment/*')) active @endif">
                             <a class="tab-inner-tabs-links" style="margin-top:-12px"
                                 href="{{ url("/view_booked_appointment/$id") }}">
                                 <h6>View Booked Appointment</h6>
                                 <h5>Coca Juice Website</h5>
                             </a>
                         </li>
                         <li class="active-noti @if (Request::is('change_password/*')) active @endif">
                             <a class="tab-inner-tabs-links" style="margin-top:-12px"
                                 href="{{ url("/change_password/$id") }}">
                                 <h6>Change Password</h6>
                                 <h5>Coca Juice Website</h5>
                             </a>
                         </li>
                     </ul>
                 </div>
                 <div class="sidebar-patient-records">
                     <h6>Advanced Patient Health Records</h6>
                     <h5>BY DEVOPPIA</h5>
                     <span class="record-chrt">
                         {{-- <img src="{{ asset('patient/images/side-bar-chart.png') }}"> --}}
                         <img src="{{ url('public/patient/images/side-bar-chart.png') }}">
                         <ul class="record-chart-labels">
                             <li>GMB Vault</li>
                             <li>Trading Company</li>
                             <li>Other</li>
                         </ul>
                     </span>
                 </div>
                 <div class="helpdesk-cont">
                     {{-- <img src="{{ asset('patient/images/sidebar-img.png') }}"> --}}
                     <img src="{{ url('public/patient/images/sidebar-img.png') }}">
                     <p>It will help us to avoid misspell and silly
                         errors since code is run through</p>
                     <a href="#"><i class="fa fa-paper-plane" aria-hidden="true"></i> Helpdesk</a>
                 </div>
             </div>
         </div>
     </nav>
 </div>
