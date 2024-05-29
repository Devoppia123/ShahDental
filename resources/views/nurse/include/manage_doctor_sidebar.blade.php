<style>
    .tab-inner-tabs-links {
        position: inherit;
        padding: 0px;
        text-align: start;
    }
</style>
<div class="left-sidebar-pro">
    <nav id="sidebar" class="">
        <div class="tabs-nav col">
            <div class="sidebar-hdr-left">
                <a class="main-logo-link" href="{{ url('/nurse/home') }}">
                    <img class="main-logo" src="{{ asset('images/logo.png') }}" alt="">
                </a>
            </div>
            <nav>
                <a class="side-bar-anchor-selected @if (Request::is(
                        'nurse/home',
                        'nurse/set_doctor_schedule/*',
                        'nurse/add_schedule_slots',
                        'nurse/view_schedule/*',
                        'nurse/view_slots/*',
                        'nurse/view_appointment_queries/*',
                        'nurse/view_booked_appointment/*',
                        'nurse/view_current_month_booking/*',
                        'nurse/view_current_week_booking/*',
                        'nurse/view_current_day_booking/*',
                        'nurse/book_appointment/*',
                        'nurse/view_change_appointment_request/*',
                        'nurse/change_appointment_details/*',
                        'nurse/change_appointment_date/*',
                        'nurse/view_appointment_cancellation_request/*',
                        'nurse/view_questions/*',
                        'nurse/reply_question/*',
                        'nurse/reply_appointment_query/*')) selected @endif" id="side-bar-1"
                    onclick="show_parts(1);"><img src="{{ asset('patient/images/sidebar-icon-1.png') }}"
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
                            'nurse/home',
                            'nurse/set_doctor_schedule/*',
                            'nurse/add_schedule_slots',
                            'nurse/view_schedule/*',
                            'nurse/view_slots/*',
                            'nurse/view_appointment_queries/*',
                            'nurse/view_booked_appointment/*',
                            'nurse/view_current_month_booking/*',
                            'nurse/view_current_week_booking/*',
                            'nurse/view_current_day_booking/*',
                            'nurse/book_appointment/*',
                            'nurse/view_change_appointment_request/*',
                            'nurse/change_appointment_details/*',
                            'nurse/change_appointment_date/*',
                            'nurse/view_appointment_cancellation_request/*',
                            'nurse/view_questions/*',
                            'nurse/reply_question/*',
                            'nurse/reply_appointment_query/*')) visible @endif" id="nav-list-1">
                        <li class="active-noti @if (Request::is('nurse/home')) active @endif">
                            <a class="tab-inner-tabs-links" style="margin-top:-12px" href="{{ url('/nurse/home') }}">
                                <h6>Home Page</h6>
                                <h5>Home Page</h5>
                            </a>
                        </li>
                        @php
                            $month = date('m');
                            $year = date('Y');
                        @endphp
                        <li class="active-noti @if (Request::is('nurse/set_doctor_schedule/*', 'nurse/add_schedule_slots')) active @endif">
                            <a class="tab-inner-tabs-links" style="margin-top:-12px"
                                href="{{ url('/nurse/set_doctor_schedule/' . $selected_doctor_id) }}">
                                <h6>Set Doctor Schedule</h6>
                                <h5>Set Doctor Schedule</h5>
                            </a>
                        </li>

                        <li class="active-noti @if (Request::is('nurse/view_schedule/*', 'nurse/view_slots/*')) active @endif">
                            <a class="tab-inner-tabs-links" style="margin-top:-12px"
                                href="{{ url('/nurse/view_schedule/' . $month . '/' . $year . '/' . $selected_doctor_id) }}">
                                <h6>View Doctor Schedule</h6>
                                <h5>View Doctor Schedule</h5>
                            </a>
                        </li>

                        <li class="active-noti @if (Request::is(
                                'nurse/view_booked_appointment/*',
                                'nurse/view_current_month_booking/*',
                                'nurse/view_current_week_booking/*',
                                'nurse/view_current_day_booking/*',
                                'nurse/book_appointment/*')) active @endif">
                            <a class="tab-inner-tabs-links" style="margin-top:-12px"
                                href="{{ url("/nurse/view_booked_appointment/$selected_doctor_id") }}">
                                <h6>View Booked Appointment</h6>
                                <h5>View Booked Appointment</h5>
                            </a>
                        </li>

                        {{-- <li class="active-noti @if (Request::is('nurse/view_change_appointment_request/*', 'nurse/change_appointment_details/*', 'nurse/change_appointment_date/*')) active @endif">
                            <a class="tab-inner-tabs-links" style="margin-top:-12px"
                                href="{{ url("/nurse/view_change_appointment_request/$selected_doctor_id") }}">
                                <h6>View Change Appointment Request</h6>
                                <h5>Coca Juice Website</h5>
                            </a>
                        </li>

                        <li class="active-noti @if (Request::is('nurse/view_appointment_cancellation_request/*')) active @endif">
                            <a class="tab-inner-tabs-links" style="margin-top:-12px"
                                href="{{ url("/nurse/view_appointment_cancellation_request/$selected_doctor_id") }}">
                                <h6>View Appointment Cancellation Request</h6>
                                <h5>Coca Juice Website</h5>
                            </a>
                        </li> --}}

                        <li class="active-noti @if (Request::is('nurse/view_questions/*', 'nurse/reply_question/*')) active @endif">
                            <a class="tab-inner-tabs-links" style="margin-top:-12px"
                                href="{{ url("/nurse/view_questions/$selected_doctor_id") }}">
                                <h6>View Ask Question</h6>
                                <h5 style="color: red;">Unread Questions {{ $counter->questions }}</h5>
                            </a>
                        </li>
                        <li class="active-noti @if (Request::is('nurse/view_appointment_queries/*', 'nurse/reply_appointment_query/*')) active @endif">
                            <a class="tab-inner-tabs-links" style="margin-top:-12px"
                                href="{{ url("/nurse/view_appointment_queries/$selected_doctor_id") }}">
                                <h6>Appoinment Queries</h6>
                                <h5>Appoinment Queries</h5>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
</div>
