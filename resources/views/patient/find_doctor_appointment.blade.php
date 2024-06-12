@extends('layouts.patient_new_template')

@section('sidebar')
    @include('patient.include.sidebar_new')
@endsection

@section('navbar')
    @include('patient.include.nav_bar_new')
@endsection

@section('content')
    {{-- <link type="text/css" href="{{ asset('css/jquery-ui-1.7.3.custom.css') }}" rel="stylesheet"> --}}
    <link type="text/css" href="{{ url('public/css/jquery-ui-1.7.3.custom.css') }}" rel="stylesheet">
    {{-- <link rel="stylesheet" href="{{ asset('css/book-appointment.css') }}"> --}}
    <link rel="stylesheet" href="{{ url('public/css/book-appointment.css') }}">

    <div class="main-cont-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                    {{-- main content --}}
                    <div class="inner-pg-cont">
                        <div class="inner-container">
                            <h2 class="main-head">Get <span>Appointment</span></h2>
                            <p>We will make every effort to contact you within the next 24 hours or the next working
                                day to
                                confirm your request.</p>
                            <p>If this is a medical emergency, please contact our Accident & Emergency service (A&E)
                                direct
                                line at 03-4270 7060 or contact your family physician.</p>
                            @if ($patient->mrn != null)
                                <div class="fielset-app-main" id="msform">
                                    <div class="fieldset-step1" id="fieldset-step1">
                                        <div class="half_leftcol_app">
                                            <h5>Please Select a Date</h5>
                                            <div id="datepicker" style="float:left;  width:100%;"></div>
                                            <input type="hidden" id="date_input" name="appointment_date" value="">
                                        </div>
                                        
                                        <div id="appointment-form" style="display:none; margin-top:20px;">
                                            <div style="margin-top: 20px; display: inline-block;">
                                                <input type="radio" name="demo" value="One" checked /> Search By
                                                Doctor
                                                Name
                                                <input type="radio" name="demo" value="Two" /> Search By Doctor
                                                Speciality
                                                <div id="showOne" class="myDiv">
                                                    <form method="post" id="doctor-name-form" action="#">
                                                        <div class="form-group">
                                                            <label for="doctor_name">Search By Doctor Name:</label>
                                                            <input type="text" class="form-control" id="doctor-search"
                                                                placeholder="Search for a doctor" onkeyup="searchDoctors()">
                                                        </div>
                                                    </form>
                                                </div>
                                                <div id="showTwo" style="display: none" class="myDiv">
                                                    <form method="post" id="doctor-speciality-form" action="#">
                                                        <div class="form-group">
                                                            <label for="doctor_speciality">Search By Doctor
                                                                Speciality:</label>
                                                            <select class="form-control" name="speciality" id="speciality">
                                                                <option value="">Select the Speciality</option>
                                                                @foreach ($speciaities as $sp)
                                                                    <option value="{{ $sp->id }}">
                                                                        {{ $sp->speciality }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="doctor-list" class="col-lg-6 col-md-8 col-sm-12 col-xs-12">
                                        </div>
                                    </div>
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
    </div>
@endsection


@section('js_code')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    {{-- <script src="{{ asset('js/jquery-1.4.3.min.js') }}"></script> --}}
    <script src="{{ url('public/js/jquery-1.4.3.min.js') }}"></script>
    <script type="text/javascript" src="{{ url('public/js/jquery-ui-1.7.3.custom.min.js') }}"></script>
    <script src="{{ url('public/js/jquery.easing.min.js') }}" type="text/javascript"></script>
    <script type="text/javascript" src="{{ url('public/js/pscripts.js') }}"></script>
    <script language="javascript" type="text/javascript" src="{{ url('public/js/actb.js') }}"></script>
    <script language="javascript" type="text/javascript" src="{{ url('public/js/common.js') }}"></script>
    <script language="javascript" src="{{ url('public/js/ajax-call2.js') }}"></script>
    <script language="javascript" src="{{ url('public/js/CalendarPopup.js') }}"></script>
    <script src="{{ url('public/js/jquery.magnific-popup.min.js') }}"></script>
    <script language="javascript" src="https://momentjs.com/downloads/moment.js"></script>
    <script>
        $(document).ready(function() {
            $('input[type="radio"]').click(function() {
                var demovalue = $(this).val();
                $("div.myDiv").hide();
                $("#show" + demovalue).show();
            });
        });

        $(document).ready(function() {
            $('#doctor_speciality_label').click(function() {
                $('#doctor-name-form').hide();
                $('#doctor-speciality-form').show();
            });
            $('#doctor_name_label').click(function() {
                $('#doctor-speciality-form').hide();
                $('#doctor-name-form').show();
            });
        });

        $(document).ready(function() {
            $('#speciality').change(function() {
                var specialityId = $(this).val();
                if (specialityId) {
                    $.ajax({
                        url: "{{ url('/doctorfilter') }}",
                        type: 'GET',
                        data: {
                            specialityId: specialityId
                        },
                        dataType: 'json',
                        success: function(data) {
                            var html = '';
                            if (data.length) {
                                $.each(data, function(index, doctor) {
                                    html += '<div class="card-main">';
                                    html += '<div class="card row">';
                                    html +=
                                        '<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">';
                                    html +=
                                        '<div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">';
                                    html += '<div class="card-body">';
                                    html += '<h5 class="card-title">' + doctor.name +
                                        '</h5>';
                                    html += '<a href="/book_appointment/' + day + '/' +
                                        doctor.id + '/' +
                                        date +
                                        '" class="btn btn-primary">Get Appointment</a>';
                                    html += '</div></div></div></div>';
                                });
                            } else {
                                html = '<h4>No Doctors</h4>';
                            }
                            $('#doctor-list').html(html);
                        }
                    });
                } else {
                    $('#doctor-list').html('<div>No Doctors</div>');
                }
            });
        });

        function searchDoctors() {
            var search = $('#doctor-search').val();
            var date = $('#date_input').val();
            var day = date.split("-")[0];
            $.ajax({
                url: "{{ url('/doctorsearch') }}",
                type: 'GET',
                data: {
                    search: search
                },
                dataType: 'json',
                success: function(data) {
                    var html = '';
                    $.each(data, function(index, doctor) {
                        html += '<div class="card-main">';
                        html += '<div class="card row">';
                        html +=
                            '<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">';
                        html +=
                            '<div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">';
                        html += '<div class="card-body">';
                        html += '<h5 class="card-title">' + doctor.name +
                            '</h5>';
                        html += '<a href="/book_appointment/' + day + '/' + doctor.id + '/' +
                            date + '" class="btn btn-primary">Get Appointment</a>';
                        html += '</div></div></div></div>';

                    });
                    $('#doctor-list').html(html);
                }
            });
        }

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
    </script>

    <script>
        var unavailableDates = [];

        $(function() {
            var selectedMonth = new Date().getMonth() + 1;
            fetchUnavailableDates(selectedMonth);

            function initializeDatePicker() {
                $("#datepicker").datepicker({
                    minDate: +1,
                    numberOfMonths: 1,
                    beforeShowDay: noSunday,
                    onSelect: function(date, obj) {
                        $('#date_input').val(date);
                        $('#appointment-form').show();
                        searchDoctors();
                    }
                });
                $("#datepicker").datepicker("option", "dateFormat", "dd-mm-yy");
            }

            function noSunday(date) {
                var dmy = $.datepicker.formatDate('dd-mm-yy', date);
                var day = date.getDay();
                var isUnavailable = ($.inArray(dmy, unavailableDates) != -1);
                return [
                    (isUnavailable), // selectable
                    (!isUnavailable ? "highlighted" : ""), // css class
                    (isUnavailable ? "Available" : "") // tooltip
                ];
            }

            function fetchUnavailableDates(month) {
                $.ajax({
                    url: "{{ url('unavaliable_dates') }}",
                    type: "GET",
                    data: {
                        month: month
                    },
                    dataType: "json",
                    success: function(response) {
                        unavailableDates = response.dates;
                        initializeDatePicker();
                    },
                    error: function(xhr, status, error) {
                        console.log(xhr.responseText);
                    }
                });
            }
        });
    </script>
@endsection
