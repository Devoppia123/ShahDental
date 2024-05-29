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
        .monthly-schedule-head h2 {
            color: #8b91a2;
            font-weight: 400;
            text-transform: capitalize;
            font-size: 36px;
            margin-bottom: 40px;
        }

        .monthly-schedule-head span {
            color: #001746;
        }

        .doc-slot {
            display: inline-flex;
            margin-bottom: 35px;
            margin-top: 25px;
            margin-left: 25px;
        }

        .doc-slot input {
            width: 130px;
            margin-right: 15px;
            border: 1px solid #d9d9d9;
            border-radius: 5px;
            outline: none;
            padding: 10px;
        }

        .doc-slot label {
            font-size: 15px;
            color: #262626;
            font-weight: 600;
        }

        .doc-slot-main {
            border: 1px solid #e5e5e5;
            border-radius: 5px;
            padding: 0px;
        }

        .doc-slot select {
            width: 130px;
            margin-right: 15px;
            border: 1px solid #d9d9d9;
            border-radius: 5px;
            outline: none;
            padding: 10px;
        }

        .veiw-monthly-schedule {
            display: inline-block;
            margin-left: 50px;
        }

        .veiw-monthly-schedule a {
            padding: 10px 20px;
            background-color: #0f5ef7;
            border-radius: 5px;
            color: #fff;
            font-weight: 700;
            margin-right: 20px;
            display: inline-block;
            margin-bottom: 10px;
        }

        .veiw-monthly-schedule h5 {
            color: #2e2e2e;
            font-size: 14px;
            font-weight: 500;
        }

        .row2 {
            margin-bottom: 20px;
            margin-top: 15px;
        }

        .current-slots-button {
            margin-top: 20px;
        }
    </style>

    <div class="main-cont-wrapper">
        <div class="container-fluid">
            <div class="monthly-schedule-head">
                <h2>Veiw, <span>monthly schedule</span></h2>
            </div>
            <div class="doc-slot-main">
                <div class="veiw-monthly-schedule row2">
                    <a href="{{ url("/nurse/view_current_month_booking/$Month_start/$Month_end/$doctor_id") }}">Current Month
                        Booking
                        Slots</a>
                    <a href="{{ url("/nurse/view_current_week_booking/$weekStartDate/$weekEndDate/$doctor_id") }}">Current
                        Week
                        Booking Only</a>
                    <a href="{{ url("/nurse/view_current_day_booking/$current_date/$doctor_id") }}">Today Booking Only</a>
                </div>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- datepicker start -->
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="https://resources/demos/style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <script>
        var startDate;
        var endDate;

        $(function() {
            $("#datepicker").datepicker({
                dateFormat: 'yy-mm-dd'
            });
        });
        $(function() {
            $("#datepicker2").datepicker({
                dateFormat: 'yy-mm-dd'
            });
        })
        $('#datepicker').change(function() {
            startDate = $(this).datepicker('getDate');
            $('#datepicker2').datepicker('option', 'minDate', startDate);
        });

        $('#datepicker2').change(function() {
            endDate = $(this).datepicker('getDate');
            $('#datepicker').datepicker('option', 'maxDate', endDate);
        });
    </script>
@endsection


@section('js_code')
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
@endsection
