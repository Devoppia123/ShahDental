<style>
    .tab-inner-tabs-links {
        position: inherit;
        padding: 0px;
        text-align: start;
    }
</style>
@php
    $doctor_id = Session('user')['id'];
    $month = date('m');
    $year = date('Y');
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
                        'doctor/home',
                        'doctor/view_schedule/*',
                        'doctor/set_doctor_schedule',
                        'doctor/view_booked_appointment',
                        'doctor/view_current_month_booking/*',
                        'doctor/view_current_week_booking/*',
                        'doctor/view_current_day_booking/*',
                        'doctor/book_appointment/*',
                        'doctor/add_videos/*',
                        'doctor/view_videos/*',
                        'doctor/edit_video/*')) selected @endif" id="side-bar-1"
                    onclick="show_parts(1);">
                    {{-- <img src="{{ asset('patient/images/sidebar-icon-1.png') }}" --}}
                    <img src="{{ url('public/patient/images/sidebar-icon-1.png') }}"
                        alt=""></a>
                <a class="side-bar-anchor-selected @if (Request::is(
                        'doctor/view_appointment_queries',
                        'doctor/reply_appointment_query/*',
                        'doctor/view_questions/*',
                        'doctor/reply_question/*',
                        'doctor/view_profile/*',
                        'doctor/edit_profile/*',
                        'doctor/visiting_card/*',
                        'doctor/view_visiting_card/*',
                        'doctor/add_social_links/*',
                        'doctor/view_social_links/*',
                        'doctor/set_timing/*',
                        'doctor/view_change_appointment_request',
                        'doctor/change_appointment_details/*',
                        'doctor/change_appointment_date/*',
                        'doctor/view_appointment_cancellation_request',
                        'doctor/view_chats',
                        'doctor/chat_with_patient/*',
                        'doctor_msg_loader/*')) selected @endif" id="side-bar-2"
                    onclick="show_parts(2);">
                    {{-- <img src="{{ asset('patient/images/sidebar-icons (2).png') }}" --}}
                    <img src="{{ url('public/patient/images/sidebar-icons (2).png') }}"
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
                            'doctor/home',
                            'doctor/set_doctor_schedule',
                            'doctor/view_schedule/*',
                            'doctor/view_slots/*',
                            'doctor/view_booked_appointment',
                            'doctor/view_current_month_booking/*',
                            'doctor/view_current_week_booking/*',
                            'doctor/view_current_day_booking/*',
                            'doctor/book_appointment/*',
                            'doctor/add_videos/*',
                            'doctor/view_videos/*',
                            'doctor/edit_video/*')) visible @endif" id="nav-list-1">
                        <li class="active-noti @if (Request::is('doctor/home', 'doctor/set_doctor_schedule')) active @endif">
                            <a class="tab-inner-tabs-links" style="margin-top:-12px" href="{{ url('/doctor/home') }}">
                                <h6>Set Schedule</h6>
                                <h5>Coca Juice Website</h5>
                            </a>
                        </li>
                        <li class="active-noti @if (Request::is('doctor/view_schedule/*', 'doctor/view_slots/*')) active @endif">
                            <a class="tab-inner-tabs-links" style="margin-top:-12px"
                                href="{{ url('/doctor/view_schedule/' . $month . '/' . $year . '/' . $doctor_id) }}">
                                <h6>View Schedule</h6>
                                <h5>Coca Juice Website</h5>
                            </a>
                        </li>
                        <li class="active-noti @if (Request::is(
                                'doctor/view_booked_appointment',
                                'doctor/view_current_month_booking/*',
                                'doctor/view_current_week_booking/*',
                                'doctor/view_current_day_booking/*',
                                'doctor/book_appointment/*')) active @endif">
                            <a class="tab-inner-tabs-links" style="margin-top:-12px"
                                href="{{ url('/doctor/view_booked_appointment') }}">
                                <h6>View Booked Appointment</h6>
                                <h5>Coca Juice Website</h5>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav-list @if (Request::is(
                            'doctor/view_appointment_queries',
                            'doctor/reply_appointment_query/*',
                            'doctor/view_questions/*',
                            'doctor/reply_question/*',
                            'doctor/view_profile/*',
                            'doctor/edit_profile/*',
                            'doctor/visiting_card/*',
                            'doctor/view_visiting_card/*',
                            'doctor/add_social_links/*',
                            'doctor/view_social_links/*',
                            'doctor/set_timing/*',
                            'doctor/view_change_appointment_request',
                            'doctor/change_appointment_details/*',
                            'doctor/change_appointment_date/*',
                            'doctor/view_appointment_cancellation_request',
                            'doctor/view_chats',
                            'doctor/chat_with_patient/*',
                            'doctor_msg_loader/*')) visible @endif" id="nav-list-2">
                        <li class="active-noti @if (Request::is('doctor/view_appointment_queries', 'doctor/reply_appointment_query/*')) active @endif">
                            <a class="tab-inner-tabs-links" style="margin-top:-12px"
                                href="{{ url('/doctor/view_appointment_queries') }}">
                                <h6>Appoinment Queries</h6>
                                <h5>Coca Juice Website</h5>
                            </a>
                        </li>
                        <li class="active-noti @if (Request::is('doctor/view_questions/*', 'doctor/reply_question/*')) active @endif">
                            <a class="tab-inner-tabs-links" href="{{ url("/doctor/view_questions/$doctor_id") }}">
                                <h6>View Ask Doctor</h6>
                                <h5 style="color: red;">Unread Questions {{ $counter->questions }}</h5>
                            </a>
                        </li>

                        <li class="active-noti @if (Request::is(
                                'doctor/view_profile/*',
                                'doctor/edit_profile/*',
                                'doctor/visiting_card/*',
                                'doctor/view_visiting_card/*',
                                'doctor/add_social_links/*',
                                'doctor/view_social_links/*',
                                'doctor/set_timing/*')) active @endif">
                            <a class="tab-inner-tabs-links" style="margin-top:-12px"
                                href="{{ url("/doctor/view_profile/$doctor_id") }}">
                                <h6>View Profile</h6>
                                <h5>View Profile</h5>
                            </a>
                        </li>
                        {{-- <li class="active-noti @if (Request::is('doctor/view_change_appointment_request')) active @endif">
                            <a class="tab-inner-tabs-links" style="margin-top:-12px"
                                href="{{ url('/doctor/view_change_appointment_request') }}">
                                <h6>Change Appointment Request</h6>
                                <h5>Coca Juice Website</h5>
                            </a>
                        </li>
                        <li class="active-noti @if (Request::is('doctor/view_appointment_cancellation_request')) active @endif">
                            <a class="tab-inner-tabs-links" style="margin-top:-12px"
                                href="{{ url('/doctor/view_appointment_cancellation_request') }}">
                                <h6>Appointment Cancellation Request</h6>
                                <h5>Coca Juice Website</h5>
                            </a>
                        </li> --}}
                        <li class="active-noti @if (Request::is('doctor/view_chats', 'doctor/chat_with_patient/*', 'doctor_msg_loader/*')) active @endif">
                            <a class="tab-inner-tabs-links" style="margin-top:-12px"
                                href="{{ url('/doctor/view_chats') }}">
                                <h6>Chat with Patient</h6>
                                <h5>Chat with Patient</h5>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
</div>
