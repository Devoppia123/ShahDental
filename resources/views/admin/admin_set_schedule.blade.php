@extends('layouts.admin_template')

@section('sidebar')
    @include('admin.include.sidebar')
@endsection

@section('navbar')
    @include('admin.include.navbar')
@endsection

@section('content')
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="https://resources/demos/style.css">

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
            padding: 8px 10px;
            width: 300px;
            color: #6b6b6b;
            outline: none;
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
            display: flex;
            flex-direction: row-reverse;
            margin: 30px 10px;
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
            <div class="calender-date-picker">
                <form id="date-form" method="get" action="{{ url('/admin/add_schedule_slots') }}">
                    <div class="row">
                        <div class="col-md-4 ">
                            <label for="">Add Doctor</label> <br>
                            <select class="form-control" name="doctor_id">
                                <option value="">Please Select A Doctor</option>
                                @foreach ($doctors as $doctor)
                                    <option value="{{ $doctor->id }}">{{ $doctor->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label for="">From : </label> <br>
                            <input type="text date" autocomplete="off" name="date1" id="datepicker">
                        </div>
                        <div class="col-md-4">
                            <label for="">To : </label> <br>
                            <input type="text date" autocomplete="off" name="date2" id="datepicker2">

                            <div class="schdule-nxt-btn" id="submit">
                                <button class="btn btn-primary">Next</button>
                            </div>
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

            $("#result").val(time_difference);

            $('#date-form').submit();

        });
    </script>
@endsection
