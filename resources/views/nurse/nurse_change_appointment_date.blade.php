@extends('layouts.staff_template')

@section('sidebar')
    @include('nurse.include.manage_doctor_sidebar')
@endsection

@section('navbar')
    @include('nurse.include.nav_bar_new')
@endsection

@section('content')
    <link type="text/css" href="{{ asset('css/jquery-ui-1.7.3.custom.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/book-appointment.css') }}">

    <div class="main-cont-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                    <div class="inner-pg-cont">
                        <div class="inner-container">
                            <h2 class="main-head">Change <span>Appointment Date</span></h2>
                            <p>PWe will make every effort to contact you within the next 24 hours or the next working
                                day to
                                confirm your request.</p>
                            <p>If this is a medical emergency, please contact our Accident & Emergency service (A&E)
                                direct
                                line at 03-4270 7060 or contact your family physician.</p>
                            @foreach ($details as $show)
                                <h3>Selected Dr. {{ $show->doctor_name }}</h3>
                                <p><b>Patient Name : {{ $show->patient_name }}</b></p>
                                <p><b>Current Date : {{ $show->schedule_date }}</b></p>
                                <p><b>Current Time : {{ $show->start_time . ' - ' . $show->end_time }}</b></p>
                                <p><b>Suggest Date : {{ $show->from_date . ' - ' . $show->to_date }}</b></p>
                                <div class="fielset-app-main" id="msform">
                                    <form action="{{ url("/nurse/change_date/$show->booking_id") }}" method="POST">
                                        @csrf
                                        <div class="fieldset-step1" id="fieldset-step1">
                                            <div class="half_leftcol_app">
                                                <h5>Please Select a Date</h5>
                                                <div id="datepicker" style="float:left;  width:100%;"></div>
                                                <input type="hidden" name="apdate" value="" id="date_input" />
                                                <input type="hidden" name="bookedFrom" value="1" />
                                                <input type="hidden" name="status" value="2" />
                                            </div>
                                        </div>
                                        <div class="p-2 form-group" id="show-slots" style="display: none;">
                                            <label>Available Slots</label>
                                            <div id="appointments-container">
                                            </div>
                                            <button class="btn btn-primary" type="submit">Update</button>
                                        </div>
                                    </form>
                                </div>
                            @endforeach
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
    <script src="{{ asset('js/jquery-1.4.3.min.js') }}"></script>

    <script type="text/javascript" src="{{ asset('js/jquery-ui-1.7.3.custom.min.js') }}"></script>
    <script src="{{ asset('js/jquery.easing.min.js') }}" type="text/javascript"></script>
    <script type="text/javascript" src="{{ asset('js/pscripts.js') }}"></script>
    <script language="javascript" type="text/javascript" src="{{ asset('js/actb.js') }}"></script>
    <script language="javascript" type="text/javascript" src="{{ asset('js/common.js') }}"></script>
    <script language="javascript" src="{{ asset('js/ajax-call2.js') }}"></script>
    <script language="javascript" src="{{ asset('js/CalendarPopup.js') }}"></script>
    <script language="javascript" src="https://momentjs.com/downloads/moment.js"></script>

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
                        $('#show-slots').show();
                        fetchslots(date);
                    }
                });
                $("#datepicker").datepicker("option", "dateFormat", "dd-mm-yy");
            }

            function noSunday(date) {

                var dmy = $.datepicker.formatDate('dd-mm-yy', date);
                var day = date.getDay();
                var isUnavailable = ($.inArray(dmy, unavailableDates) != -1);
                return [
                    (isUnavailable),
                    (!isUnavailable ? "highlighted" : ""),
                    (isUnavailable ? "Available" : "")
                ];
            }

            function fetchslots(date) {
                $.ajax({
                    url: "{{ url('withoutloginappointment') }}/{{ $doctor_id }}",
                    type: "GET",
                    data: {
                        dateas: date
                    },
                    dataType: "json",
                    success: function(response) {
                        var appointmentData = response;
                        var html = "";
                        $.each(appointmentData, function(index, appointment) {
                            html +=
                                '<input type="radio" style="padding: 10px;" name="get_value" id="slot_id' +
                                index + '" value="' + appointment.slot_id + '"> ' +
                                appointment.start_time + ' - ' + appointment.end_time;
                        });
                        $("#appointments-container").html(html);
                    },
                    error: function(xhr, status, error) {
                        console.log(xhr.responseText);
                    }
                });
            }

            function fetchUnavailableDates(month) {

                $.ajax({
                    url: "{{ url('/nurse/nurse_avaliable_dates') }}/{{ $doctor_id }}",
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

    <script src="{{ asset('js/jquery.magnific-popup.min.js') }}"></script>
@endsection
