@extends('layouts.staff_template')

@section('sidebar')
    @include('nurse.include.manage_doctor_sidebar')
@endsection

@section('navbar')
    @include('nurse.include.nav_bar_new')
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
            margin-right: 60px;
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
            width: 65.5%;
            display: flex;
            flex-direction: row-reverse;
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
    </style>

    <div class="main-cont-wrapper">
        <div class="container-fluid">
            <div class="set-monthly-heading">
                <h2>set dr {{ $doctor->name }} monthly, <span>schedule</span> </h2>
            </div>
            <span id="nulldate" class="text-danger" style="font-weight: bold;"></span>
            <div class="calender-date-picker">
                <form id="date-form" method="get" action="{{ url('/nurse/add_schedule_slots') }}">
                    <input type="hidden" name="doctor_id" value="{{ $doctor_id }}" id="">
                    <p>From : <br><input type="text date" autocomplete="off" name="date1" id="datepicker"></p>
                    <p>To : <br><input type="text date" autocomplete="off" name="date2" id="datepicker2"></p>
                </form>
            </div>
            <div class="schdule-nxt-btn" id="submit">
                <pre>Next</pre>
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
