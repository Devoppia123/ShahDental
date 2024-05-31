@extends('design.template')
@section('title', 'Shah Dental | Make an appointment')
@section('header-main')
    {{-- @include('design.header-main') --}}
    @include('inc.inner-header-header')

@endsection
<link type="text/css" href="{{ url('public/css/jquery-ui-1.7.3.custom.css') }}" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
<link rel="stylesheet" href="{{ url('public/css/Our-Speciality.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<meta name="csrf-token" content="{{ csrf_token() }}">

<style>
    .pass_box select {
        padding: 10px 10px;
        margin: 0px;
        width: 30%;
        margin-right: 20px;
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

    /* add yasir */
    .d-none {
        display: none;
    }
</style>
@section('content')
<div class="make-an-appoint">
    <div class="branch-heading">
        <h2>Make An Appointment</h2>
    </div>
    <div class="text-center p-5 row" id="show-section">
        <div class="col-md-4">
            <h3>Make An Appointment As A Guest</h3>
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
            <h3>Login To Your Personal Health Record</h3>
            <form action="https://getphr.com/" method="get">
                <input type="hidden" name="hospID" value="7" id="">
                <button class="btn btn-primary" type="submit" target="blank">Login</button>
            </form>
        </div>
    </div>
    <section class="main-content-section container">

        <div id="skip" class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="half_leftcol_app">
                        <h5>Please Select a Date</h5>
                        {{-- <div id="datepicker" style="width:100%;"></div> --}}
                        <div id="datepicker"></div>
                    </div>
                </div>
            </div>

            <div class="Cardiology">
                <h2 style="font-weight: 700;" id="hide">Make An Appointment From</h2>
            </div>
            <form action="{{ url('booked_appointment_withoutlogin') }}" method="POST" id="get_appointment_form">
                @csrf
                <input type="hidden" id="date_input" class="form-control" name="appointment_date" value="">
                <input type="hidden" id="doctor_id" name="doctor_id" value="">
                <div class="row">
                    <div class="col-md-4 p-2 form-group">
                        <label>Full Name</label>
                        <input type="text" name="patient_name" id="patient_name" class="form-control">
                        <p class="invalid-feedback" id="patient_name-error"></p>
                    </div>
                    <div class="col-md-4 p-2 form-group">
                        <label>Email </label>
                        <input type="email" name="patient_email" id="patient_email" class="form-control">
                        <p class="invalid-feedback" id="patient_email-error"></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 p-2 form-group">
                        <label>Phone</label>
                        <input type="text" name="patient_phone" id="patient_phone" class="form-control">
                        <p class="invalid-feedback" id="patient_phone-error"></p>
                    </div>
                    <div class="col-md-4 p-2 form-group" id="show-slots" style="display: none;">
                        <label>Available Slots</label>
                        <div id="appointments-container">
                        </div>
                        <p class="invalid-feedback" id="show-slots-error"></p>
                    </div>
                </div>
                <div class="row">
                    <p>Gender</p>
                    <div class="col-md-4 p-2 form-group">
                        <label>Male</label>
                        <input type="radio" name="male" id="gender" value="1">

                    </div>
                    <div class="col-md-4 p-2 form-group">
                        <label>Female</label>
                        <input type="radio" name="female" value="0">
                        <p class="invalid-feedback" id="gender-error"></p>

                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-4 p-2 form-group">
                        <label>Age (Optional)</label>
                        <input type="text" name="age" class="form-control">
                    </div>
                    <div class="col-md-4 p-2 form-group">
                        <label>DOB (Optional)</label>
                        <input type="date" name="dob" class="form-control">
                    </div>
                </div>
                <div>
                    <div class="col-md-6 services-col-multi">
                        <label>Select Procedure (Optional)</label>
                        <select name="appointment_procedure" id="appointment_procedure" class="form-control">
                            <option value="">Select Procedure</option>
                            @foreach ($procedures as $procedure)
                                <option value="{{ $procedure->id }}">{{ $procedure->name }}</option>
                            @endforeach
                        </select>
                        <p class="invalid-feedback" id="appointment_procedure-error"></p>
                    </div>
                </div>
                <div class="additional-search col-lg-8" id="clinic">
                    <div class="xyz row">
                        <div class="col-lg-6"> <label for="Radio">
                                <input type="radio" id="At_Clinic" name="mode" value="At Clinic" checked="checked"
                                    class="">
                                At Clinic</label></div>
                        <div class="row p-2 branch_value">
                            <div class="col-lg-8 col-md-8 col-sm-12 col-12">
                                @foreach ($branches as $branch)
                                    <input type="radio" name="branch_id" value="{{ $branch->id }}"
                                        class="branch-radio" id="branch_{{ $branch->id }}">
                                    <label for="branch_{{ $branch->id }}">{{ $branch->branch_name }}</label>
                                @endforeach
                                <p class="invalid-feedback" id="branch_id-error"></p>
                            </div>
                        </div>
                        <div class="col-lg-6"> <label for="Radio"> <input type="radio" name="mode"
                                    id="online_option" value="Online" class="">
                                Online</label></div>
                    </div>
                    <br>
                    <div class="online_value">
                        <div class="row">
                            <div class="col-lg-6"><label for="select">Platform:</label>
                                <select id="platform" class="form-control" name="platform">
                                    <option value="">Select Option</option>
                                    <option value="Facebook">Facebook</option>
                                    <option value="Twitter">Twitter</option>
                                    <option value="Skype">Skype</option>
                                    <option value="Google Meet">Google Meet</option>
                                </select>
                                <p class="text-danger" id="platform-error"></p>
                            </div>
                            {{-- <div class="col-lg-6">
                                <label for="Id_Number">ID/number:</label>
                                <input type="text" class="form-control" name="id_number" value="">
                                <p class="text-danger" id="id_number-error"></p>
                            </div> --}}
                        </div>


                    </div>
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-12 p-0">
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="radio" id="ic_number" name="identity_no" checked="checked"
                                        value="identity">
                                    <label for="ic_number">Identity Number:</label>
                                </div>
                                <div class="col-md-6">
                                    <input type="radio" id="passport-input" name="identity_no" value="passport">
                                    <label for="passport-input" class="passport_no" style="margin-left:15px">Passport
                                        Number:</label>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-md-12">
                                    <input type="number" class="form-control" id="identity_number"
                                        name="get_number_identity" placeholder="Identity Number">
                                    <p class="invalid-feedback" id="get_number_identity-error"></p>
                                    <input type="number" class="form-control d-none" id="passport_number"
                                        name="get_passport_number" placeholder="Passport Number">
                                    <p class="invalid-feedback" id="get_passport_number-error"></p>
                                    <input type="hidden" name="check_value" id="check_value" value="1">
                                </div>
                            </div>
                        </div>

                        <br> <br>
                        <div class="pass_box col-lg-12">
                            <label for="select">Platform:</label>
                            <div class="row">
                                <select class="form-control col-3" name="passport_date">
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

                                <select class="form-control col-3" name="passport_date">
                                    <option value="">Month</option>
                                    @for ($m = 1; $m <= 12; $m++)
                                        @php
                                            $month = date('F', mktime(0, 0, 0, $m, 1));
                                        @endphp
                                        <option value="{{ $month }}">
                                            {{ $month }}</option>
                                    @endfor
                                </select>

                                <select class="form-control col-3" name="passport_date">
                                    <option value="">Year</option>
                                    @php
                                        $i = 1920;
                                    @endphp
                                    @for ($i; $i < 2024; $i++)
                                        <option value="{{ $i }}">
                                            {{ $i }}</option>
                                    @endfor
                                </select>
                                <p class="invalid-feedback col-3" id="passport_date-error"></p>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <label for="Radio"> Appointment Reason: <input style="margin-left:0px !important"
                                    class="inpt-alignment" type="radio" value="1st Time Consultation"
                                    name="consultation_type" id="" checked="checked"> 1st
                                Time
                                Consultation</label>
                            <label for="Radio"><input class="inpt-alignment" value="Follow up Consultation"
                                    type="radio" name="consultation_type" id="">
                                Follow up
                                Consultation</label>
                            <br>
                            <textarea class="txt-area mandtry form-control" name="appointment_reason" id="appointment_reason" cols="45"
                                rows="5"></textarea>
                            <p class="invalid-feedback" id="appointment_reason-error"></p>
                            <br>
                            <button type="submit" style="margin-top: 20px"
                                class="nxt-btn btn btn-warning action-button">Submit</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
</div>
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="{{ url('public/js/jquery-1.4.3.min.js') }}"></script>
<script type="text/javascript" src="{{ url('public/js/jquery-ui-1.7.3.custom.min.js') }}"></script>

{{-- add yasir to hide identity and passport number textboxes then select if you have --}}
<script>
    $(document).ready(function() {
        $('input[name="identity_no"]').change(function() {
            if ($(this).val() === 'identity') {
                $('#identity_number').removeClass('d-none');
                $('#passport_number').addClass('d-none');
            } else if ($(this).val() === 'passport') {
                $('#passport_number').removeClass('d-none');
                $('#identity_number').addClass('d-none');
            }
        });

        // Trigger the change event on page load to ensure the correct input is displayed
        $('input[name="identity_no"]:checked').trigger('change');
    });
</script>
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
                                '<input type="radio" style="margin-right: 5px;" name="session_id" id="session_id' +
                                index + '"  value="' + appointment.id +
                                '">' + appointment.session_name + ' (' +
                                startTime + endTime + ') ' + '<br/>'
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

{{-- add validation on yasir --}}
<script>
    $(document).ready(function() {
        $("#get_appointment_form").submit(function(e) {
            e.preventDefault(); // Prevent the default form submission
            var element = $(this);


            $("button[type=submit]").attr('disabled', true);
            // Send an AJAX request to the server
            $.ajax({
                url: "{{ url('booked_appointment_withoutlogin') }}",
                type: "POST",
                data: element.serialize(),
                dataType: "json",
                success: function(response) {
                    console.log(response);
                    $("button[type=submit]").attr('disabled', false);

                    // Clear previous errors
                    $(".invalid-feedback").html("");
                    $(".form-control").removeClass("is-invalid");

                    if (response["status"] == true) {
                        // Redirect to the specified URL
                        window.location.href = "{{ url('make-an-appointment') }}";
                    } else {
                        var errors = response['errors'];
                        if (errors['patient_name']) {
                            $("#patient_name").addClass('is-invalid');
                            $("#patient_name-error").html(errors['patient_name'][0]);
                        }
                        if (errors['patient_email']) {
                            $("#patient_email").addClass('is-invalid');
                            $("#patient_email-error").html(errors['patient_email'][0]);
                        }
                        if (errors['patient_phone']) {
                            $("#patient_phone").addClass('is-invalid');
                            $("#patient_phone-error").html(errors['patient_phone'][0]);
                        }
                        if (errors['gender']) {
                            // Check if both male and female radio buttons are unchecked
                            if (!$("input[name='male']").is(":checked") && !$(
                                    "input[name='female']").is(":checked")) {
                                $("input[name='male'], input[name='female']").addClass(
                                    'is-invalid');
                                $("#gender-error").html(errors['gender'][0]);
                            }
                        }
                        if (errors['branch_id']) {
                            $("input[name='branch_id']").addClass('is-invalid');
                            $("#branch_id-error").html(errors['branch_id'][0]);
                        }
                        if (errors['platform']) {
                            $("input[name='platform']").addClass('is-invalid');
                            $("#platform-error").html(errors['platform'][0]);
                        }
                        var selectedIdentityType = $("input[name='identity_no']:checked")
                            .val();
                        // Display errors based on the selected identity type
                        if (selectedIdentityType === 'identity' && errors[
                                'get_number_identity']) {
                            $("input[name='get_number_identity']").addClass('is-invalid');
                            $("#get_number_identity-error").html(errors[
                                'get_number_identity'][0]);
                        }
                        if (selectedIdentityType === 'passport' && errors[
                                'get_passport_number']) {
                            $("input[name='get_passport_number']").addClass('is-invalid');
                            $("#get_passport_number-error").html(errors[
                                'get_passport_number'][0]);
                        }
                        if (errors['passport_date']) {
                            $(".pass_box select").addClass(
                            'is-invalid'); // Add 'is-invalid' class to all select elements inside .pass_box
                            $("#passport_date-error").html(errors['passport_date'][0]);
                        }
                        // if (errors['id_number']) {
                        //     $("input[name='id_number']").addClass('is-invalid');
                        //     $("#id_number-error").html(errors['id_number'][0]);
                        // }
                        if (errors['appointment_reason']) {
                            $("#appointment_reason").addClass('is-invalid');
                            $("#appointment_reason-error").html(errors['appointment_reason']
                                [0]);
                        }
                    }
                },
                error: function(xhr, status, error) {
                    console.log(xhr.responseText);
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
{{-- <script src="https://code.jquery.com/jquery-1.6.4.min.js"></script> --}}


@section('footer-main')
    @include('design.footer-main')
@endsection
