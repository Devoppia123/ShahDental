@extends('layouts.patient_new_template')

@section('sidebar')
    @include('patient.include.sidebar_new')
@endsection

@section('navbar')
    @include('patient.include.nav_bar_new')
@endsection

@section('content')
    <link type="text/css" href="{{ asset('css/jquery-ui-1.7.3.custom.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/book-appointment.css') }}">

    <div class="main-cont-wrapper" style="border:1px solid red;">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                    <div class="inner-pg-cont">
                        <div class="inner-container">
                            <h2 class="main-head">Get <span>Appointment</span></h2>
                            <p>PWe will make every effort to contact you within the next 24 hours or the next working
                                day to
                                confirm your request.</p>
                            <p>If this is a medical emergency, please contact our Accident & Emergency service (A&E)
                                direct
                                line at 03-4270 7060 or contact your family physician.</p>

                            @if ($patient != null)
                                <div class="fielset-app-main" id="msform">
                                    <form action="{{ url('/booked_appointment') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="doctor_id" value="{{ $doctor->id }}">
                                        <input type="hidden" id="date_input" name="appointment_date"
                                            value="{{ $date }}">
                                        <h3>Selected Dr. {{ $doctor->name }}</h3>
                                        <div id="book_slots">
                                            @if ($doctor->enable_slots > 0 && $check_slots != null)
                                                @foreach ($appointment as $app)
                                                    @if ($app->booking_id == null)
                                                        <label for="slot_id{{ $app->slot_id }}">
                                                            <input type="radio"
                                                                style="padding: 10px; margin-right: 5px; margin-left: 15px;"
                                                                name="get_value" id="slot_id{{ $app->slot_id }}"
                                                                value="{{ $app->slot_id }}">{{ $app->start_time }} -
                                                            {{ $app->end_time }}
                                                        </label>
                                                        @php
                                                            $alert_show = 0;
                                                        @endphp
                                                    @else
                                                        <p>No Slots Found</p>
                                                    @endif
                                                @endforeach
                                            @else
                                                @foreach ($appointment_sessions as $session)
                                                    <input type="radio" id="session" style="margin-right: 5px"
                                                        value="{{ $session->id }}"
                                                        name="session_id">{{ $session->session_name }}
                                                    @if ($session->start_time && $session->end_time)
                                                        ({{ $session->start_time }} - {{ $session->end_time }})
                                                    @endif
                                                    <br>
                                                @endforeach
                                                @php
                                                    $alert_show = 1;
                                                @endphp
                                            @endif
                                            <p class="btn btn-success" id="next">Next</p>
                                        </div>
                                        <div id="patient_form" class="fieldset-step fieldset-step2" id="fieldset-step2">
                                            <div class="additional-search">
                                                <h5>Personal Information</h5>
                                                <div class="appointment-form">
                                                    <input class="form-control" type="hidden" name="patient_id"
                                                        value="{{ $patient->id }}" />
                                                    <label for="Name">* Name :
                                                        <input class="form-control" readonly
                                                            value="{{ $patient->name }}"></label>
                                                    <br> <br>
                                                    <label for="Phone">Phone Number :
                                                        <input class="form-control" readonly type="tel"
                                                            value="{{ $patient->phone }}"></label>
                                                    <br> <br>
                                                    <label for="Email">* Email :
                                                        <input class="form-control" readonly type="email"
                                                            value="{{ $patient->email }}"></label>
                                                    <br> <br>
                                                    <label for="MRN">* MRN :
                                                        <input class="form-control" readonly
                                                            value="{{ $patient->mrn }}"></label>
                                                    <br> <br>

                                                    <div class="xyz">
                                                        <label for="Radio">
                                                            <input type="radio" id="At_Clinic" name="mode"
                                                                value="At Clinic" checked="checked">
                                                            At Clinic</label>
                                                        <label for="Radio"> <input type="radio" name="mode"
                                                                id="online_option" value="Online">
                                                            Online</label>
                                                    </div>
                                                    <br>
                                                    <div class="online_value">
                                                        <label for="select">Platform:</label>
                                                        <select class="form-control" id="Social" name="platform">
                                                            <option value="">Select Option</option>
                                                            <option value="Facebook">Facebook</option>
                                                            <option value="Twitter">Twitter</option>
                                                            <option value="Skype">Skype</option>
                                                            <option value="Google Meet">Google Meet</option>
                                                        </select>
                                                        <label for="Id_Number">ID/number:</label>
                                                        <input class="form-control" type="text" name="id_number"
                                                            value="">
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-lg-6 col-md-6 col-sm-12 col-12 p-0"><label
                                                                for="ic_number"> IC
                                                                Number:
                                                                <input type="radio" id="ic_number" name="identity_no"
                                                                    checked="checked">
                                                                <input class="form-control" type="number"
                                                                    name="get_number_identity">
                                                            </label>
                                                        </div>
                                                        <div class="col-lg-6 col-md-6 col-sm-12 col-12 p-0">
                                                            <label for="passport-input" class="passport_no"
                                                                style="margin-left:15px" id="passport"> Passport
                                                                Number:
                                                                <input type="radio" value="passport-input"
                                                                    name="identity_no" id="passport-input">
                                                                <input class="form-control" type="number"
                                                                    name="get_number_identity">
                                                            </label>
                                                        </div>
                                                        <br> <br>
                                                        <div class="pass_box col-lg-12">
                                                            <label for="select">Platform:</label>
                                                            <select class="form-control" name="passport_date">
                                                                <option value="">Day</option>
                                                                @php
                                                                    $i = 00;
                                                                @endphp
                                                                @for ($i; $i < 32; $i++)
                                                                    @if ($i < 10)
                                                                        <option value="0{{ $i }}">
                                                                            0{{ $i }}</option>
                                                                    @else
                                                                        <option value="{{ $i }}">
                                                                            {{ $i }}</option>
                                                                    @endif
                                                                @endfor
                                                            </select>
                                                            <select class="form-control" name="passport_date">
                                                                <option value="">Month</option>
                                                                @for ($m = 1; $m <= 12; $m++)
                                                                    @php
                                                                        $month = date('F', mktime(0, 0, 0, $m, 1));
                                                                    @endphp
                                                                    <option value="{{ $month }}">
                                                                        {{ $month }}</option>
                                                                @endfor
                                                            </select>

                                                            <select class="form-control" name="passport_date">
                                                                <option value="">Year</option>
                                                                @php
                                                                    $i = 1920;
                                                                @endphp
                                                                @for ($i; $i < 2024; $i++)
                                                                    <option value="{{ $i }}">
                                                                        {{ $i }}</option>
                                                                @endfor
                                                            </select>
                                                        </div>
                                                        <br> <br>
                                                        <div class="col-lg-12">
                                                            <label for="Radio"> Appointment Reason: <input
                                                                    style="margin-left:0px !important"
                                                                    class="inpt-alignment" type="radio"
                                                                    value="1st Time Consultation" name="consultation_type"
                                                                    id="" checked="checked"> 1st
                                                                Time
                                                                Consultation</label>
                                                            <label for="Radio"><input class="inpt-alignment"
                                                                    value="Follow up Consultation" type="radio"
                                                                    name="consultation_type" id="">
                                                                Follow up
                                                                Consultation</label>
                                                            <br> <br>
                                                            <textarea class="txt-area mandtry form-control" name="appointment_reason" id="reason" cols="45"
                                                                rows="5"></textarea>
                                                            <br>
                                                            <button type="submit"
                                                                class="nxt-btn btn btn-warning action-button">Submit</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                    </form>
                                </div>
                            @else
                                @php
                                    $id = Session('user')['id'];
                                @endphp
                                <a href="{{ url("/edit_profile/$id") }}" class="btn btn-primary">Edit Profile</a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection


    @section('js_code')
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>
            $(document).ready(function() {
                $("#next").click(function() {
                    $("#book_slots").hide();
                    if ({{ $alert_show }} == 1) {
                        var selectedSlot = $('input[name="session_id"]:checked').val();
                        if (!selectedSlot) {
                            e.preventDefault();
                            alert("Please select a appointment session.");
                        } else {
                            $("#patient_form").show();
                        }
                    } else {
                        var selectedSlot = $('input[name="get_value"]:checked').val();
                        if (!selectedSlot) {
                            e.preventDefault();
                            alert("Please select a time slot.");
                            $("#book_slots").show();
                        } else {
                            $("#patient_form").show();
                        }
                    }
                });

                $("#At_Clinic").click(function() {
                    $(".online_value").hide();
                });

                $("#online_option").click(function() {
                    $(".online_value").show();
                });

                $("#passport-input").click(function() {
                    $(".pass_box").show();
                });

                $("#ic_number").click(function() {
                    $(".pass_box").hide();
                });
            });
        </script>
    @endsection
