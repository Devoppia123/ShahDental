@extends('layouts.doctor_template')

@section('navbar')
    @include('doctor.include.nav_bar_new')
@endsection

@section('sidebar')
    @include('doctor.include.sidebar_new')
@endsection

@section('content')
    <!-- datepicker start -->
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="https://resources/demos/style.css">
    <!-- datepicker end -->
    <style>
        .set-monthly-heading h2 {
            color: #8b91a2;
            font-weight: 400;
            text-transform: capitalize;
            font-size: 36px;
        }

        .set-monthly-heading h2 span {
            color: #001746;
        }


        .calender-date-picker form {
            display: inline-flex;
            margin-top: 40px;
        }

        .calender-date-picker form p {
            font-size: 17px;
            font-weight: 700;
            color: #001242;
        }

        .calender-date-picker input {
            font-size: 14px;
            border: 1px solid #d9d9d9;
            border-radius: 5px;
            padding: 5px 10px;
            width: 300px;
            color: #6b6b6b;
            outline: none;
            margin-top: 10px;
            font-weight: 500;
        }

        .calender-date-picker label {
            color: #001242;
            display: grid;
            margin-bottom: -15px;
        }



        .recently-schedule h3 {
            margin-top: 15px;
            margin-bottom: 15px;
            color: #2e2e2e;
            font-weight: 600;
            font-size: 19px;
        }

        select#recent-schedule {
            font-size: 14px;
            width: 665px;
            border-radius: 5px;
            outline: none;
            padding: 7px 10px;
            color: #6b6b6b;
            background-color: #f4f7ff;
        }

        .schdule-nxt-btn {
            width: 70px;
            margin-left: 17px;
            border: none;
            background-color: #0f5ef7;
            color: #fff;
            border-radius: 3px;
            padding: 5px;
        }

        .schdule-nxt-btn pre {
            padding: 5PX 25px;
            BACKGROUND-COLOR: #0f5ef7;
            margin-top: 40px;
            text-decoration: none;
            color: #fff;
            border-radius: 5px;
            font-weight: 500;
        }

        @media and screen (max-width:768px) {

            .schdule-nxt-btn {
                width: 79.5%;
                display: flex;
                flex-direction: row-reverse;
            }
        }
    </style>

    <div class="main-cont-wrapper">
        <div class="container-fluid">
            <div class="set-monthly-heading">
                <h2>set monthly <span>schedule</span> </h2>
            </div>
            {{-- <span id="nulldate" class="text-danger" style="font-weight: bold;"></span> --}}
            <div class="calender-date-picker">
                <form id="date-form" method="get" action="{{ url('/doctor/set_doctor_schedule') }}">
                    <input type="hidden" name="doctor_id" value="{{ Session('user')['id'] }}" id="">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <p>From : <br><input type="text date" autocomplete="off" name="date1" id="datepicker"></p>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <p>To : <br><input type="text 
                            date" autocomplete="off"
                                    name="date2" id="datepicker2"></p>
                        </div>
                        <span id="nulldate" class="text-danger" style="font-weight: bold;"></span>
                        {{-- <button type="submit" class="schdule-nxt-btn col-lg-12" id="submit">Next</button> --}}
                        <div class="col-md-4">
                            <button type="submit" class="schdule-nxt-btn col-lg-12" id="submit">Next</button>
                        </div>
                    </div>


                </form>
            </div>

        </div>
    </div>
@endsection

@section('js_code')
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <script>
        var startDate;
        var endDate;
        $(function() {
            $("#datepicker").datepicker({
                dateFormat: "yy-mm-dd",
                changeMonth: true,
                changeYear: true,
            });
        });

        $(function() {
            $("#datepicker2").datepicker({
                dateFormat: "yy-mm-dd",
                changeMonth: true,
                changeYear: true,
            });
        });

        $('#datepicker').change(function() {
            startDate = $(this).datepicker('getDate');
            $('#datepicker2').datepicker('option', 'minDate', startDate);
        });

        $('#datepicker2').change(function() {
            endDate = $(this).datepicker('getDate');
            $('#datepicker').datepicker('option', 'maxDate', endDate);
        });

        $(document).on('click', '#submit', function() {


            var fromdate = $("#datepicker").val();
            var todate = $("#datepicker2").val();

            if ((fromdate == "") || (todate == "")) {
                $("#nulldate").html("Please enter two dates");
                return false
            }

            var dt1 = new Date(fromdate);
            var dt2 = new Date(todate);

            var time_difference = dt2.getDate() - dt1.getDate() + 1;
            // var result = time_difference / (1000 * 60 * 60 * 24);

            //var output = result;
            $("#result").val(time_difference);

            $('#date-form').submit();

        });
    </script>
@endsection
