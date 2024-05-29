@extends('layouts.admin_template')

@section('sidebar')
    @include('admin.include.sidebar')
@endsection

@section('navbar')
    @include('admin.include.navbar')
@endsection

@section('content')
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"
        integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <style>
        .services-col-multi {
            margin-bottom: 30px;
        }

        .services-col-multi label {
            margin-bottom: 5px;
        }

        .pass_box {
            margin-bottom: 30px;
        }

        .display_show {
            background: whitesmoke;
            padding: 5px 10px;
            border-radius: 5px;
            box-shadow: 1px 1px 5px 0px;
            cursor: pointer;
        }
    </style>
    <div class="main-cont-wrapper">
        <div class="container-fluid">
            <h1>Book An Appointment</h1>
            <div class="row">
                <div class="col-md-12">
                    <div class="white-box">
                        <form action="{{ url('/admin/booked_appintment') }}" method="POST">
                            @csrf
                            <div class="form-item row" style="padding: 10px">
                                <div class="col-md-6">
                                    <h4>Appointment Date: {{ $slot->schedule_date }}</h4>
                                </div>
                                <div class="col-md-6">
                                    <h4>Slot Timing: {{ $slot->start_time . ' : ' . $slot->end_time }}</h4>
                                </div>
                                <input type="hidden" name="get_value" value="{{ $slot->slot_id }}">
                            </div>
                            <div>
                                <label>Search By Patient Name</label>
                                <input type="text" id="patient_search" name="search" class="form-control"
                                    onkeyup="search_patient()" placeholder="Search By Patient Name">
                                <div id="patient_list">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 services-col-multi ">
                                    <label>Patient Name</label>
                                    <input type="text" name="patient_name" id="patient_name" class="form-control">
                                </div>

                                <div class="col-md-6 services-col-multi">
                                    <label>Patient Phone</label>
                                    <input type="text" name="patient_phone" id="patient_phone" class="form-control">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 services-col-multi">
                                    <label>Age</label>
                                    <input type="text" name="age" id="age" class="form-control">
                                </div>

                                <div class="col-md-6 services-col-multi">
                                    <label>Date of Birth</label>
                                    <input type="date" name="dob" id="dob" class="form-control">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 services-col-multi">
                                    <label>Select Procedure</label>
                                    <select name="appointment_procedure" class="form-control">
                                        <option value="">Select Procedure</option>
                                        @foreach ($procedures as $procedure)
                                            <option value="{{ $procedure->id }}">{{ $procedure->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-6 services-col-multi">
                                    <label>Patient Email</label>
                                    <input type="text" name="patient_email" id="patient_email" class="form-control">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 services-col-multi"><label for="ic_number"> IC
                                        Number:
                                        <input type="radio" id="ic_number" name="identity_no" checked="checked">
                                        <input class="form-control" type="number" name="get_number_identity">
                                    </label>
                                </div>
                                <div class="col-md-6 services-col-multi">
                                    <label for="passport-input" class="passport_no" style="margin-left:15px" id="passport">
                                        Passport
                                        Number:
                                        <input type="radio" value="passport-input" name="identity_no" id="passport-input">
                                        <input class="form-control" type="number" name="get_number_identity">
                                        <input type="hidden" name="check_value" id="check_value" value="1">
                                    </label>
                                </div>
                            </div>
                            <div class="pass_box row" style="display: none;">
                                <label class="col-md-12" for="select">Platform:</label>

                                <div class="col-md-3">
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
                                </div>

                                <div class="col-md-3">
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
                                </div>
                                <div class="col-md-3">
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
                            </div>
                            <div class="row">
                                <div class="col-md-6 services-col-multi">
                                    <label for="At_Clinic">
                                        <input type="radio" id="At_Clinic" name="mode" value="At Clinic"
                                            checked="checked">
                                        At Clinic</label>
                                </div>
                                <div class="col-md-6 services-col-multi">
                                    <label for="online_option">
                                        <input type="radio" name="mode" id="online_option" value="Online">
                                        Online</label>
                                </div>
                            </div>
                            <div class="online_value row" style="display: none;">
                                <div class="col-md-6 services-col-multi">
                                    <label for="select">Platform:</label>
                                    <select class="form-control" id="Social" name="platform">
                                        <option value="">Select Option</option>
                                        <option value="Facebook">Facebook</option>
                                        <option value="Twitter">Twitter</option>
                                        <option value="Skype">Skype</option>
                                        <option value="Google Meet">Google Meet</option>
                                    </select>
                                </div>
                                <div class="col-md-6 services-col-multi">
                                    <label for="Id_Number">ID/number:</label>
                                    <input class="form-control" type="text" name="id_number" value="">
                                </div>
                            </div>
                            <div class="col-lg-12 p-0">
                                <label for="Radio"> Appointment Reason: <input style="margin-left:0px !important"
                                        class="inpt-alignment" type="radio" value="1st Time Consultation"
                                        name="consultation_type" id="" checked="checked"> 1st
                                    Time
                                    Consultation</label>
                                <label for="Radio"><input class="inpt-alignment" value="Follow up Consultation"
                                        type="radio" name="consultation_type" id="">
                                    Follow up
                                    Consultation</label>
                                <textarea class="txt-area mandtry form-control" name="appointment_reason" id="reason" cols="45"
                                    rows="5"></textarea>
                                <br>
                            </div>

                            <button type="submit" class="btn btn-warning" style="margin-top: 10px">Book</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function() {

            $('input[type="radio"]').change(function() {
                if ($('#ic_number').is(':checked')) {
                    $('#check_value').val('1');
                } else {
                    $('#check_value').val('2');
                }
            });

            $('#btn-skip').click(function() {
                $('#skip').show();
                $('#show-section').hide();
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


        function search_patient() {
            var searchInput = $('#patient_search').val();

            $.ajax({
                url: '/search_patient',
                data: {
                    search: searchInput
                },
                success: function(response) {
                    $("#patient_list").html(response);
                },
                error: function(error) {
                    console.log(error);
                }
            });
        }

        function patient_details(patient_id) {
            $(".display_show").hide();
            $.ajax({
                url: "/patient_details",
                type: "get",
                dataType: "json",
                data: {
                    patient_id: patient_id,
                },
                success: function(response) {
                    var patient_email = JSON.stringify(response.email).replace(/"/g, '');
                    var patient_name = JSON.stringify(response.name).replace(/"/g, '');
                    var patient_phone = JSON.stringify(response.phone).replace(/"/g, '');
                    var age = JSON.stringify(response.age).replace(/"/g, '');
                    var dob = JSON.stringify(response.dob).replace(/"/g, '');

                    $("#patient_email").val(patient_email);
                    $("#patient_name").val(patient_name);
                    $("#patient_phone").val(patient_phone);
                    $("#age").val(age);
                    $("#dob").val(dob);
                }
            });
        }
    </script>
@endsection
