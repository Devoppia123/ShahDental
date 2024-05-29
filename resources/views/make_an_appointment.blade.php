@extends('design.template')
@section('title', 'Shah Dental | Make an appointment')
@section('customCSS')
    <link type="text/css" href="{{ url('public/css/jquery-ui-1.7.3.custom.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ url('public/css/Our-Speciality.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <style>
        .container {
            max-width: 1600px !important;
            margin: 0 auto;
        }

        .pass_box select {
            padding: 10px 10px;
            margin: 0px;
            width: 29%;
            /* margin-right: 18px; */
        }

        .online_value {
            display: none;
        }

        #skip {
            display: none;
        }

        #get_appointment_form {
            display: none;
        }

        #hide {
            display: none;
        }

        form label {
            margin-bottom: 6px;
        }

        .pass_box {
            margin: 20px 0px;
            display: none;
        }

        select#Social {
            padding: 6px 6px;
            margin-bottom: 20px;
            margin-left: 0px;
        }

        .ui-datepicker {
            width: 100% !important;
            border: 5px solid #2c3e50;
        }

        .ui-widget-content {
            background: none;
            color: #333333;
            padding: 10px 40px;
        }

        .ui-state-default,
        .ui-widget-content .ui-state-default {
            border: none;
            background: none;
            color: #a2262;
            outline: none;
            font-size: 18px;
            text-align: center;
        }

        span.ui-datepicker-month {
            font-family: redhatdisplay-bold;
        }

        span.ui-datepicker-year {
            font-family: redhatdisplay-regular;
        }

        .ui-datepicker-current-day a {
            background-image: none !important;
            background-color: #a2262e !important;
            color: White !important;
        }

        thead tr {
            color: #2c3e50;
        }

        .ui-widget-header {
            background: none !important;
            color: #464443 !important;
            font-size: 26px;
            border-radius: 0px;
            border-bottom: 1px solid;
            border-top: none !important;
            border-right: none !important;
            border-left: none !important;
        }

        .ui-datepicker th {
            padding: 10px 0px;
            text-align: center;
            border: 0;
            font-size: 18px;
            font-weight: 400;
            border-bottom: 1px solid #f8f9f9;
        }

        .ui-datepicker td.ui-state-disabled>span {
            background: #fff !important;
            opacity: 100 !important;
            color: #abb0b5 !important;
            font-size: 18px;
            text-align: center;
            border: none !important;
        }

        tbody tr {
            border-bottom: 1px solid #f8f9f9;
            height: 55px;
        }

        .ui-widget-header {
            background: none !important;
            color: #464443 !important;
            font-size: 26px;
            border-radius: 0px;
            border-bottom: 1px solid #f5f6f7 !important;
            border-top: none !important;
            border-right: none !important;
            border-left: none !important;
        }

        .ui-datepicker th {
            padding: 15px 0px !important;
            text-align: center;
            border: 0;
            font-size: 18px;
            font-weight: 400;
            border-bottom: 1px solid #f8f9f9;
        }

        .half_leftcol_app h5 {
            text-align: center;
            font-size: 34px;
            margin: 30px 0px;
            font-family: redhatdisplay-bold;
            color: #424343;
        }

        .ui-datepicker .ui-datepicker-title {
            margin: 0 2.3em;
            line-height: 1.8em;
            text-align: left !important;
        }

        .ui-datepicker .ui-datepicker-next {
            left: 180px;
        }

        .ui-icon {
            width: 16px;
            height: 16px;
            background-image: url({{ url('public/images/arrow-next.png') }});
        }

        .ui-widget-content .ui-icon {
            background-image: url("{{ url('public/images/arrow-next.png') }}");
            background-repeat: no-repeat;
            background-position: center;
            background-size: cover;
        }
    </style>
@endsection
@section('header-main')
    {{-- @include('design.header-main') --}}
    @include('inc.inner-header-header')

@endsection

@section('content')
    <div class="text-center">
        <h2>Make An Appointment</h2>
    </div>
    <div class="text-center row mx-2" id="show-section">
        <div class="col-md-6">
            <h4>Appointment As A Guest</h4>
            <div id="doc" style="margin-left: 60px">
                <select id="doctor" class="form-control">
                    <option value="" selected disabled>Select a doctor</option>
                    @foreach ($doctors as $doc)
                        @foreach ($doc->user_role as $user_role)
                            <option value="{{ $user_role->id }}">{{ $user_role->name }}</option>
                        @endforeach
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-md-6">
            <h4>Login To Your Personal Health Record</h4>
            <form action="https://getphr.com/" method="get">
                <input type="hidden" name="hospID" value="7" id="">
                <button class="btn btn-primary" type="submit" target="blank">Login</button>
            </form>
        </div>
    </div>

    <section class="main-content-section container">

        <div id="skip" class="mx-2">
            <div class="half_leftcol_app">
                <h5>Please Select a Date</h5>
                <div id="datepicker" style="width:100%;"></div>
            </div>

            {{-- Appointment Form --}}
            <div class="Cardiology text-center my-2">
                <h2 id="hide">Make An Appointment From</h2>
            </div>
            {{-- <form action="{{ url('booked_appointment_withoutlogin') }}" method="POST" id="get_appointment_form">
                @csrf
                <input type="hidden" id="date_input" class="form-control" name="appointment_date" value="">
                <input type="hidden" id="doctor_id" name="doctor_id" value="">
                <div class="row justify-content-around py-2">
                    <div class="col-md-4  form-group">
                        <label>Full Name</label>
                        <input type="text" name="patient_name" class="form-control" placeholder="Enter full name">
                        <span class="text-danger error-text"></span>
                    </div>
                    <div class="col-md-4 form-group">
                        <label>Email </label>
                        <input type="email" name="patient_email" placeholder="Enter Email" class="form-control">
                        <span class="text-danger error-text"></span>
                    </div>
                </div>
                <div class="row justify-content-around py-2">
                    <div class="col-md-4 form-group">
                        <label>Phone</label>
                        <input type="text" name="patient_phone" placeholder="Enter Phone" class="form-control">
                        <span class="text-danger error-text"></span>
                    </div>
                    <div class="col-md-4 form-group" id="show-slots" style="display: none;">
                        <label><strong>Available Slots</strong></label>
                        <div id="appointments-container"></div>
                    </div>
                </div>
                <div class="row justify-content-around py-2">
                    <div class="col-md-4 form-group">
                        <label><strong>Gender</strong></label> <br>
                        <input type="radio" name="gender" value="1">
                        <label>Male</label>
                        <input type="radio" name="gender" value="0">
                        <label>Female</label>
                        <span class="text-danger error-text"></span>
                    </div>
                    <div class="col-md-4 form-group">
                        <label>Age (Optional)</label>
                        <input type="text" name="age" class="form-control" placeholder="25">
                        <span class="text-danger error-text"></span>
                    </div>
                </div>
                <div class="row justify-content-around py-2">
                    <div class="col-md-4 form-group">
                        <label>DOB (Optional)</label>
                        <input type="date" name="dob" class="form-control">
                        <span class="text-danger error-text"></span>
                    </div>
                    <div class="col-md-4 services-col-multi">
                        <label>Select Procedure (Optional)</label>
                        <select name="appointment_procedure" class="form-control">
                            <option value="">Select Procedure</option>
                            @foreach ($procedures as $procedure)
                                <option value="{{ $procedure->id }}">{{ $procedure->name }}</option>
                            @endforeach
                        </select>
                        <span class="text-danger error-text"></span>
                    </div>
                </div>
                <div class="row justify-content-around py-2 " id="clinic">
                    <div class="col-lg-4 form-group">
                        <label for="Radio"> At Clinic</label>
                        <input type="radio" id="At_Clinic" name="mode" value="At Clinic" checked="checked"
                            class="">
                        <div class="row branch_value">
                            <div class="col-sm-12 col-12">
                                @foreach ($branches as $branch)
                                    <input type="radio" name="branch_id" value="{{ $branch->id }}"
                                        class="branch-radio" id="branch_{{ $branch->id }}">
                                    <label for="branch_{{ $branch->id }}">{{ $branch->branch_name }}</label> <br>
                                @endforeach
                            </div>
                        </div>
                        <span class="text-danger error-text"></span>
                    </div>
                    <div class="col-lg-4 form-group">
                        <label for="Radio"> Online</label>
                        <input type="radio" name="mode" id="online_option" value="Online" class="">
                        <span class="text-danger error-text"></span>
                    </div>
                    <div class="online_value">
                        <div class="row justify-content-around py-2">
                            <div class="col-lg-4"><label for="select">Platform:</label>
                                <select id="Social" class="form-control" name="platform">
                                    <option value="">Select Option</option>
                                    <option value="Facebook">Facebook</option>
                                    <option value="Twitter">Twitter</option>
                                    <option value="Skype">Skype</option>
                                    <option value="Google Meet">Google Meet</option>
                                </select>
                                <span class="text-danger error-text"></span>
                            </div>
                            <div class="col-lg-4">
                                <label for="Id_Number">ID number:</label>
                                <input type="text" class="form-control" placeholder="Enter id numbner"
                                    name="id_number" value="">
                                <span class="text-danger error-text"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-around py-2">
                    <div class="col-sm-4 form-group">
                        <input type="radio" id="ic_number" name="identity_no" checked="checked"
                            placeholder="Enter IC number">
                        <label for="Radio"> IC Number:</label>
                        <input type="number" class="form-control" placeholder="Enter IC number"
                            name="get_number_identity">
                        <input type="hidden" name="check_value" id="check_value" value="1">
                        <span class="text-danger error-text"></span>
                    </div>
                    <div class="col-md-4 form-group">
                        <input type="radio" value="passport-input" name="identity_no" id="passport-input">
                        <label for="Radio" class="passport_no" style="margin-left:15px" id="passport">Passport
                            Number:</label>
                        <span class="text-danger error-text"></span>
                    </div>
                </div>
                <div class="row justify-content-around py-2">
                    <div class="pass_box col-md-4">
                        <label for="select">Date:</label>
                        <div class="row">
                            <select class="form-control col-2" name="passport_date">
                                <option value="">Day</option>
                                @for ($i = 1; $i <= 31; $i++)
                                    <option value="{{ str_pad($i, 2, '0', STR_PAD_LEFT) }}">
                                        {{ str_pad($i, 2, '0', STR_PAD_LEFT) }}</option>
                                @endfor
                            </select>
                            <select class="form-control mx-3 col-3" name="passport_date">
                                <option value="">Month</option>
                                @for ($m = 1; $m <= 12; $m++)
                                    @php
                                        $month = date('F', mktime(0, 0, 0, $m, 1));
                                    @endphp
                                    <option value="{{ $month }}">{{ $month }}</option>
                                @endfor
                            </select>
                            <select class="form-control col-3" name="passport_date">
                                <option value="">Year</option>
                                @for ($i = 1920; $i <= 2023; $i++)
                                    <option value="{{ $i }}">{{ $i }}</option>
                                @endfor
                            </select>
                            <span class="text-danger error-text"></span>
                        </div>
                    </div>
                    <div class="col-lg-4 appointment-div ml-4">
                        <label for="Radio"> Appointment Reason:</label> <br>
                        <input style="margin-left:0px !important" class="inpt-alignment" type="radio"
                            value="1st Time Consultation" name="consultation_type" id="" checked="checked">
                        1st Time Consultation
                        <label for="Radio">
                            <input class="inpt-alignment" value="Follow up Consultation" type="radio"
                                name="consultation_type" id="">
                            Follow up Consultation
                        </label>
                        <br>
                        <textarea class="txt-area mandtry form-control" name="appointment_reason" placeholder=" Appointment reason here"
                            id="reason" cols="45" rows="5"></textarea>
                        <span class="text-danger error-text"></span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 text-center">
                        <button type="submit" style="margin-top: 20px"
                            class="nxt-btn btn btn-warning action-button">Submit</button>
                    </div>
                </div>
            </form> --}}
            <form action="{{ url('booked_appointment_withoutlogin') }}" method="POST" id="get_appointment_form">
                @csrf
                <input type="hidden" id="date_input" class="form-control" name="appointment_date" value="">
                <input type="hidden" id="doctor_id" name="doctor_id" value="">

                <div class="row justify-content-around py-2">
                    <div class="col-md-4 form-group">
                        <label>Full Name</label>
                        {{-- <input type="text" name="patient_name" class="form-control" placeholder="Enter full name">
                        <span class="error-text patient_name_error"></span> --}}
                        <input type="text" name="patient_name" id="patient_name" class="form-control"
                            placeholder="Enter full name">
                        <p class="text-danger" id="patient_name_error"></p>

                    </div>
                    <div class="col-md-4 form-group">
                        <label>Email</label>
                        <input type="email" name="patient_email" id="patient_email" placeholder="Enter Email"
                            class="form-control">
                        {{-- <span class="text-danger error-text patient_email_error"></span> --}}
                        <p class="text-danger" id="patient_email_error"></p>
                    </div>
                </div>

                <div class="row justify-content-around py-2">
                    <div class="col-md-4 form-group">
                        <label>Phone</label>
                        <input type="text" name="patient_phone" placeholder="Enter Phone" id="patient_phone"
                            class="form-control">
                        {{-- <span class="text-danger error-text patient_phone_error"></span> --}}
                        <p class="text-danger" id="patient_phone_error"></p>
                    </div>
                    <div class="col-md-4 form-group" id="show-slots" style="display: none;">
                        <label><strong>Available Slots</strong></label>
                        <div id="appointments-container"></div>
                        <p class="text-danger" id="session_error"></p>

                    </div>
                </div>

                <div class="row justify-content-around py-2">
                    <div class="col-md-4 form-group">
                        <label><strong>Gender</strong></label> <br>
                        <input type="radio" name="gender" value="1">
                        <label>Male</label>
                        <input type="radio" name="gender" value="0">
                        <label>Female</label>
                        {{-- <span class="text-danger error-text gender_error"></span> --}}
                        <p class="text-danger" id="gender_error"></p>

                    </div>
                    <div class="col-md-4 form-group">
                        <label>Age (Optional)</label>
                        <input type="text" name="age" class="form-control" placeholder="25">
                    </div>
                </div>

                <div class="row justify-content-around py-2">
                    <div class="col-md-4 form-group">
                        <label>DOB (Optional)</label>
                        <input type="date" name="dob" class="form-control">
                    </div>
                    <div class="col-md-4 services-col-multi">
                        <label>Select Procedure (Optional)</label>
                        <select name="appointment_procedure" class="form-control">
                            <option value="">Select Procedure</option>
                            @foreach ($procedures as $procedure)
                                <option value="{{ $procedure->id }}">{{ $procedure->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="row justify-content-around py-2" id="clinic">
                    <div class="col-lg-4 form-group">
                        <label for="Radio"> At Clinic</label>
                        <input type="radio" id="At_Clinic" name="mode" value="At Clinic" checked="checked"
                            class="">
                        <div class="row branch_value">
                            <div class="col-sm-12 col-12">
                                @foreach ($branches as $branch)
                                    <input type="radio" name="branch_id" value="{{ $branch->id }}"
                                        class="branch-radio" id="branch_{{ $branch->id }}">
                                    <label for="branch_{{ $branch->id }}">{{ $branch->branch_name }}</label> <br>
                                @endforeach
                                <p class="text-danger" id="clinic_error"></p>
                            </div>
                        </div>
                        <p class="text-danger" id="mode_error"></p>
                    </div>
                    <div class="col-lg-4 form-group">
                        <label for="Radio"> Online</label>
                        <input type="radio" name="mode" id="online_option" value="Online" class="">
                    </div>
                    <div class="online_value">
                        <div class="row justify-content-around py-2">
                            <div class="col-lg-4"><label for="select">Platform:</label>
                                <select id="Social" class="form-control" name="platform">
                                    <option value="">Select Option</option>
                                    <option value="Facebook">Facebook</option>
                                    <option value="Twitter">Twitter</option>
                                    <option value="Skype">Skype</option>
                                    <option value="Google Meet">Google Meet</option>
                                </select>
                                <p class="text-danger" id="platform_error"></p>
                            </div>
                            <div class="col-lg-4">
                                <label for="Id_Number">ID number:</label>
                                <input type="text" class="form-control" placeholder="Enter id number"
                                    name="id_number" value="">
                                {{-- <span class="text-danger error-text id_number_error"></span> --}}
                                <p class="text-danger" id="id_number_error"></p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row justify-content-around py-2">
                    <div class="col-sm-4 form-group">
                        <input type="radio" value="national_id" id="national_id" name="identity_no"
                            checked="checked">
                        <label for="Radio"> National Id Number:</label>
                        <input type="number" class="form-control" placeholder="Enter national ID card number"
                            name="get_national_id">
                        <input type="hidden" name="check_value" id="check_value" value="1">
                        {{-- <span class="text-danger error-text get_number_identity_error"></span> --}}
                        <p class="text-danger" id="ic_number_error"></p>
                    </div>
                    <div class="col-md-4 form-group">
                        <input type="radio" value="passport_id" name="identity_no" id="passport-input">
                        <label for="Radio" id="passport">Passport Number:</label>
                        <input type="number" class="form-control" placeholder="Enter passort ID number"
                            name="get_passport_id">
                        <span class="text-danger error-text identity_no_error"></span>
                    </div>
                </div>

                <div class="row justify-content-around py-2">
                    <div class="pass_box col-md-4">
                        <label for="select">Passport Expiry Date:</label>
                        <div class="row">
                            <select class="form-control col-2" name="passport_date">
                                <option value="">Day</option>
                                @for ($i = 1; $i <= 31; $i++)
                                    <option value="{{ str_pad($i, 2, '0', STR_PAD_LEFT) }}">
                                        {{ str_pad($i, 2, '0', STR_PAD_LEFT) }}</option>
                                @endfor
                            </select>
                            <select class="form-control mx-3 col-3" name="passport_date">
                                <option value="">Month</option>
                                @for ($m = 1; $m <= 12; $m++)
                                    @php
                                        $month = date('F', mktime(0, 0, 0, $m, 1));
                                    @endphp
                                    <option value="{{ $month }}">{{ $month }}</option>
                                @endfor
                            </select>
                            <select class="form-control col-3" name="passport_date">
                                <option value="">Year</option>
                                @for ($y = date('Y'); $y >= date('Y') - 100; $y--)
                                    <option value="{{ $y }}">{{ $y }}</option>
                                @endfor
                            </select>
                            {{-- <span class="text-danger error-text passport_date_error"></span> --}}
                            <p class="text-danger" id="passport_date_error"></p>

                        </div>
                    </div>
                    <div class="col-lg-4 appointment-div ml-4">
                        <label for="Radio"> Appointment Reason:</label> <br>
                        <input style="margin-left:0px !important" class="inpt-alignment" type="radio"
                            value="1st Time Consultation" name="consultation_type" id="" checked="checked">
                        1st Time Consultation
                        <label for="Radio">
                            <input class="inpt-alignment" value="Follow up Consultation" type="radio"
                                name="consultation_type" id="">
                            Follow up Consultation
                        </label>
                        <br>
                        <textarea class="txt-area mandtry form-control" name="appointment_reason" id="appointment_reason"
                            placeholder=" Appointment reason here" id="reason" cols="45" rows="5"></textarea>
                        {{-- <span class="text-danger error-text"></span> --}}
                        <p class="text-danger" id="appointment_reason_error"></p>

                    </div>
                </div>

                <div class="row justify-content-around py-2">
                    <div class="col-sm-12 text-center">
                        <button type="submit" style="margin-top: 20px"
                            class="nxt-btn btn btn-warning action-button">Submit
                        </button>
                    </div>
                </div>
            </form>

        </div>
    </section>
@endsection


@section('footer-main')
    @include('design.footer-main')
@endsection

@section('script')
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script> --}}
    {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="{{ url('public/js/jquery-1.4.3.min.js') }}"></script>
    <script type="text/javascript" src="{{ url('public/js/jquery-ui-1.7.3.custom.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#doctor').change(function() {
                var doctorId = $(this).val();
                if (doctorId) {
                    $('#skip').show();
                    $('#doctor_id').val(doctorId);
                } else {
                    $('#skip').hide();
                }
            });

            $('input[type="radio"]').change(function() {
                if ($('#ic_number').is(':checked')) {
                    $('#check_value').val('1');
                } else {
                    $('#check_value').val('2');
                }
            });

            $("#At_Clinic").click(function() {
                $(".online_value").hide();
                $(".branch_value").show();
            });

            $("#online_option").click(function() {
                $(".online_value").show();
                $(".branch_value").hide();
            });

            $("#passport-input").click(function() {
                $(".pass_box").show();
            });

            $("#ic_number").click(function() {
                $(".pass_box").hide();
            });

            // update the column width accordingly
            function updateAppointmentDiv() {
                if ($("#ic_number").is(":checked")) {
                    $(".appointment-div").removeClass("col-lg-4").addClass("col-lg-10");
                    $(".pass_box").hide();
                } else if ($("#passport-input").is(":checked")) {
                    $(".appointment-div").removeClass("col-lg-10").addClass("col-lg-4");
                    $(".pass_box").show();
                }
            }
            // Initial load
            updateAppointmentDiv();
            // Update on radio button click
            $("#ic_number, #passport-input").click(function() {
                updateAppointmentDiv();
            });

            function initializeDatePicker() {
                $("#datepicker").datepicker({
                    minDate: +1,
                    numberOfMonths: 2,
                    beforeShowDay: function(date) {
                        var day = date.getDay();
                        var formattedDate = $.datepicker.formatDate('dd-mm-yyyy', date);
                        if (date < new Date()) {
                            return [false, 'past-date'];
                        }
                        return [true, ''];
                    },
                    onSelect: function(date) {
                        $('#date_input').val(date);
                        $('#show-slots').show();
                        fetchslots(date);
                    }
                });
                $("#datepicker").datepicker("option", "dateFormat", "dd-mm-yy");
            }

            initializeDatePicker();

            function fetchslots(date) {
                var doctorId = $('#doctor').val();
                $.ajax({
                    url: "{{ url('show_slots') }}/" + doctorId,
                    type: "GET",
                    data: {
                        dateas: date
                    },
                    dataType: "json",
                    success: function(response) {
                        var appointmentData = response;
                        var html = "";

                        if (appointmentData[0].slot_id !== undefined) {
                            html += '<label>Appointment Slots</label><br/>';
                            $.each(appointmentData, function(index, appointment) {
                                html +=
                                    '<input type="radio" style="margin: 5px;" name="get_value" id="slot_id' +
                                    index + '" value="' + appointment.slot_id +
                                    '"> ' +
                                    appointment.start_time + ' - ' + appointment
                                    .end_time;
                            });
                        } else {
                            html += '<label>Appointment Sessions</label><br/>';
                            $.each(appointmentData, function(index, appointment) {
                                var startTime = appointment.start_time ? appointment
                                    .start_time : '';
                                var endTime = appointment.end_time ? ' - ' +
                                    appointment.end_time : '';
                                html +=
                                    '<input type="radio" style="margin-right: 5px;" name="session_id" id="session' +
                                    index + '"  value="' + appointment.id +
                                    '">' + appointment.session_name + ' (' +
                                    startTime + endTime + ') ' + '<br/>';
                            });
                        }

                        $("#appointments-container").html(html);
                        $("#hide").show();
                        $("#get_appointment_form").show();
                    },
                    error: function(xhr, status, error) {
                        console.log(xhr.responseText);
                    }
                });
            }
        });
    </script> --}}

    {{-- <script>
        $(document).ready(function() {
            // Form Validation Ajax
            $("#get_appointment_form").bind('submit', function(e) {
                e.preventDefault();
                var form = $(this);
                $('#submit-btn').attr('disabled', true);
                $.ajax({
                    url: form.attr('action'),
                    type: form.attr('method'),
                    data: form.serialize(),
                    dataType: 'json',
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest'
                    },
                    success: function(response) {
                        if (response.success) {
                            console.log(response);
                            window.location.href = "/"; // Redirect to the homepage
                        }
                    },
                    error: function(xhr) {
                        console.log(xhr);
                        $('#submit-btn').attr('disabled', false);
                        if (xhr.status === 400) {
                            var errors = xhr.responseJSON.errors;
                            $('.error-text').html(''); // Clear all existing error messages

                            $.each(errors, function(key, value) {
                                $('.' + key + '-error').html(value[0]).css('font-size',
                                    '0.9rem'); // Update error message for each field
                            });
                        }
                    }
                });

            });
        });
    </script> --}}

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="{{ url('public/js/jquery-1.4.3.min.js') }}"></script>
    <script type="text/javascript" src="{{ url('public/js/jquery-ui-1.7.3.custom.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#doctor').change(function() {
                var doctorId = $(this).val();
                if (doctorId) {
                    $('#skip').show();
                    $('#doctor_id').val(doctorId);
                } else {
                    $('#skip').hide();
                }
            });

            $('input[type="radio"]').change(function() {
                if ($('#ic_number').is(':checked')) {
                    $('#check_value').val('1');
                } else {
                    $('#check_value').val('2');
                }
            });

            $("#At_Clinic").click(function() {
                $(".online_value").hide();
                $(".branch_value").show();
            });

            $("#online_option").click(function() {
                $(".online_value").show();
                $(".branch_value").hide();
            });

            $("#passport-input").click(function() {
                $(".pass_box").show();
            });

            $("#ic_number").click(function() {
                $(".pass_box").hide();
            });
            // update the column width accordingly
            function updateAppointmentDiv() {
                if ($("#ic_number").is(":checked")) {
                    $(".appointment-div").removeClass("col-lg-4").addClass("col-lg-10");
                    $(".pass_box").hide();
                } else if ($("#passport-input").is(":checked")) {
                    $(".appointment-div").removeClass("col-lg-10").addClass("col-lg-4");
                    $(".pass_box").show();
                }
            }
            // Initial load
            updateAppointmentDiv();
            // Update on radio button click
            $("#ic_number, #passport-input").click(function() {
                updateAppointmentDiv();
            });

            function initializeDatePicker() {
                $("#datepicker").datepicker({
                    minDate: +1,
                    numberOfMonths: 2,
                    beforeShowDay: function(date) {
                        var day = date.getDay();
                        var formattedDate = $.datepicker.formatDate('dd-mm-yyyy', date);
                        if (date < new Date()) {
                            return [false, 'past-date'];
                        }
                        return [true, ''];
                    },
                    onSelect: function(date) {
                        $('#date_input').val(date);
                        $('#show-slots').show();
                        fetchslots(date);
                    }
                });
                $("#datepicker").datepicker("option", "dateFormat", "dd-mm-yy");
            }

            initializeDatePicker();

            function fetchslots(date) {
                var doctorId = $('#doctor').val();
                $.ajax({
                    url: "{{ url('show_slots') }}/" + doctorId,
                    type: "GET",
                    data: {
                        dateas: date
                    },
                    dataType: "json",
                    success: function(response) {
                        var appointmentData = response;
                        var html = "";

                        if (appointmentData[0].slot_id !== undefined) {
                            html += '<label>Appointment Slots</label><br/>';
                            $.each(appointmentData, function(index, appointment) {
                                html +=
                                    '<input type="radio" style="margin: 5px;" name="get_value" id="slot_id' +
                                    index + '" value="' + appointment.slot_id +
                                    '"> ' +
                                    appointment.start_time + ' - ' + appointment
                                    .end_time;
                            });
                        } else {
                            html += '<label>Appointment Sessions</label><br/>';
                            $.each(appointmentData, function(index, appointment) {
                                var startTime = appointment.start_time ? appointment
                                    .start_time : '';
                                var endTime = appointment.end_time ? ' - ' +
                                    appointment.end_time : '';
                                html +=
                                    '<input type="radio" style="margin-right: 5px;" name="session_id" id="session' +
                                    index + '"  value="' + appointment.id +
                                    '">' + appointment.session_name + ' (' +
                                    startTime + endTime + ') ' + '<br/>';
                            });
                        }

                        $("#appointments-container").html(html);
                        $("#hide").show();
                        $("#get_appointment_form").show();
                    },
                    error: function(xhr, status, error) {
                        console.log(xhr.responseText);
                    }
                });
            }
        });
    </script>

    {{-- Client Side validation --}}
    <script>
        $(document).ready(function() {
            $("#get_appointment_form").submit(function(event) {
                event.preventDefault();
                var element = $(this);

                // Clear previous error messages
                $("input, textarea").removeClass('is-invalid');
                $("p.text-danger").empty();

                // Perform client-side validation
                var isValid = true;

                // Check if Full Name is empty
                if ($("#patient_name").val() === "") {
                    $("#patient_name").addClass('is-invalid');
                    $("#patient_name_error").html("Please enter your patient name.");
                    isValid = false;
                }

                // Check if Email is empty
                if ($("#patient_email").val() === "") {
                    $("#patient_email").addClass('is-invalid');
                    $("#patient_email_error").html("Please enter your patient email.");
                    isValid = false;
                }

                // Check if Phone is empty
                if ($("#patient_phone").val() === "") {
                    $("#patient_phone").addClass('is-invalid');
                    $("#patient_phone_error").html("Please enter patient phone number.");
                    isValid = false;
                }

                // Check if Slots are checked.
                if (!$('input[name="session_id"]:checked').val()) {
                    $("#session_error").html("Please select a session.");
                    isValid = false;
                } else {
                    $("#session_error").html("");
                }

                // Check if Gender is selected
                if (!$("input[name='gender']:checked").val()) {
                    $("#gender_error").html("Please select your gender.");
                    isValid = false;
                }

                // Check if At Clinic or Online mode is selected
                if (!$("input[name='mode']:checked").val()) {
                    $("#mode_error").html("Please select mode (At Clinic or Online).");
                    isValid = false;
                }

                // Check if Platform is selected for Online mode
                if ($("input[name='mode']:checked").val() == 'Online' && !$("select[name='platform']")
                    .val()) {
                    $("#platform_error").html("Please select a platform for online mode.");
                    isValid = false;
                }

                // Check if Clinic is selected for At_Clinic mode
                if ($("input[name='mode']:checked").val() == 'At Clinic' && !$(
                        "input[name='branch_id']:checked")
                    .val()) {
                    $("#clinic_error").html("Please select a clinic.");
                    isValid = false;
                }

                // Check if ID/Number is provided
                if (!$("input[name='id_number']").val()) {
                    $("#id_number").addClass('is-invalid');
                    $("#id_number_error").html("Please provide ID/Number.");
                    isValid = false;
                }

                // Check if IC Number or Passport is selected
                if ($("input[name='get_number_identity']:checked").val() == 'ic_number') {
                    // Check if IC Number is empty
                    if (!$("input[name='get_number_identity']").val()) {
                        $("#ic_number_error").html("Please provide IC Number.");
                        isValid = false;
                    }
                } else if ($("input[name='identity_no']:checked").val() == 'passport-input') {
                    // Check if Passport Date is selected
                    if (!$("select[name='passport_date']").eq(0).val() || !$("select[name='passport_date']")
                        .eq(1).val() || !$("select[name='passport_date']").eq(2).val()) {
                        $("#passport_date_error").html("Please select a valid passport date.");
                        isValid = false;
                    }
                }

                // Check if Appointment Reason is empty
                if ($("#appointment_reason").val() === "") {
                    $("#appointment_reason").addClass('is-invalid');
                    $("#appointment_reason_error").html("Please provide a reason for the appointment.");
                    isValid = false;
                }

                if (!isValid) {
                    // If any validation error, do not proceed with form submission
                    return false;
                }

                // If validation passes, proceed with form submission via AJAX
                // $("button[type=submit]").attr('disabled', true);

                $.ajax({
                    url: '{{ url('booked_appointment_withoutlogin') }}',
                    type: 'post',
                    data: element.serializeArray(),
                    dataType: 'json',
                    success: function(response) {
                        $("button[type=submit]").attr('disabled', false);
                        if (response.status === false) {
                            // Handle server-side validation errors if any
                            $.each(response.errors, function(key, value) {
                                $("#" + key).addClass('is-invalid').siblings('p').html(
                                    value[0]);
                            });
                        } else {
                            // Show success message or redirect to another page
                            alert(response.message);
                            // Optional: Redirect to another page
                            window.location.href = response.redirect_url;
                        }
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.log("AJAX Error:", textStatus, errorThrown);
                        // Enable the submit button if there's an error
                        // $("button[type=submit]").prop('disabled', false);
                    }
                });
            });
        });
    </script>

    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }

        });
    </script>
@endsection
