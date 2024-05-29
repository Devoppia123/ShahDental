@extends('layouts.doctor_template')

@section('navbar')
    @include('doctor.include.nav_bar_new')
@endsection

@section('sidebar')
    @include('doctor.include.sidebar_new')
@endsection
@section('content')
    <style>
        .monthly-schedule-head h2 {
            color: #8b91a2;
            font-weight: 400;
            text-transform: capitalize;
            font-size: 36px;
        }

        .monthly-schedule-head span {
            color: #001746;
        }

        .monthly-schedule-head h5 {
            color: #001746;
            font-size: 16px;
            margin-top: 20px;
        }

        .doc-slot {
            display: inline-flex;
        }

        .doc-slot input {
            width: 90px;
            margin-right: 15px;
            border: 1px solid #e5e5e5;
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
            border-radius: 8px;
            padding: 20px;
        }

        .doc-slot-main h6 {
            font-size: 14px;
            border-radius: 30px;
            background-color: #ffb800;
            width: 115px;
            padding: 9px;
            color: #333333;
            margin-bottom: 28px;
            text-align: center;
        }

        .exclude-slot {
            margin-top: 30px;
        }

        .exclude-slot label {
            font-size: 17px;
            font-weight: 600;
            margin-right: 15px;
            color: #262626;
        }

        .exclude-slot input {
            border: 1px solid #d9d9d9 !important;
            margin-right: 5px;
        }

        .exclude-slot a {
            padding: 11px 25px;
            background-color: #0f5ef7;
            border-radius: 5px;
            color: #fff;
            text-decoration: none;
            font-weight: 700;
        }

        .exclude-slot form {
            margin-bottom: 20px;
        }

        .calender-slot-main {
            margin-top: 30px;
        }

        .calender-slot ul {
            display: flex;
            padding: 10px;
            border-radius: 8px;
            border: 1px solid #d9d9d9;
        }

        .calender-slot ul li {
            padding: 2px 33px;
            font-size: 18px;
            color: #001746;
            font-weight: 600;
            border-right: 1px solid #e5e5e5;
            line-height: 1;
        }

        .calender-slot-main h5 {
            font-size: 16px;
            margin-top: 20px;
            margin-bottom: 15px;
        }

        .calender-slot ul li a {
            color: #001746;
        }

        .calender-slot-main-head {
            display: inline-flex;
            align-items: baseline;
            width: 100%;
        }

        .calender-slot-main-head .fa-angle-left {
            padding: 3px 11px;
            background-color: #e6edfc;
            border-radius: 50%;
            margin-right: 10px;
            color: #001847;
            font-size: 24px;
        }

        .calender-slot-main-head .fa-angle-right {
            padding: 3px 11px;
            background-color: #e6edfc;
            border-radius: 50%;
            color: #001847;
            font-size: 24px;

        }

        .doc-slot select {
            width: 90px;
            margin-right: 15px;
            border: 1px solid #d9d9d9;
            border-radius: 5px;
            outline: none;
            padding: 10px;
        }

        .calender-slot-main {
            margin-top: 30px;
        }

        .calender-slot ul {
            display: flex;
            padding: 10px;
            border-radius: 8px;
            border: 1px solid #d9d9d9;
        }

        .calender-slot ul li {
            padding: 2px 33px;
            font-size: 18px;
            color: #001746;
            font-weight: 600;
            border-right: 1px solid #e5e5e5;
            line-height: 1;
        }

        .calender-slot-main h5 {
            font-size: 16px;
            margin-top: 20px;
            margin-bottom: 15px;
        }

        .calender-slot ul li a {
            color: #001746;
        }

        .calender-slot-main-head {
            display: inline-flex;
            align-items: baseline;
            width: 100%;
        }

        .calender-slot-main-head .fa-angle-left {
            padding: 3px 11px;
            background-color: #e6edfc;
            border-radius: 50%;
            margin-right: 10px;
            color: #001847;
            font-size: 24px;
        }

        .calender-slot-main-head .fa-angle-right {
            padding: 3px 11px;
            background-color: #e6edfc;
            border-radius: 50%;
            color: #001847;
            font-size: 24px;

        }

        .doc-slot select {
            width: 130px;
            margin-right: 15px;
            border: 1px solid #d9d9d9;
            border-radius: 5px;
            outline: none;
        }

        .calender-dates h4 {
            font-size: 15px;
            text-align: center;
            margin: -10px;
            font-weight: 600;
            margin-bottom: 5px;
        }

        .calender-inner-btn ul li a {
            font-size: 13px;
            color: #000;
        }

        .calender-inner-btn ul li {
            padding: 0px 12px;

        }

        .calender-inner-btn ul {
            padding: 5px 7px;
            border: none;
            align-items: center;
            background-color: #ffb800;
            border-radius: 0px;
            padding-bottom: 8px;
        }

        .calender-inner-btn .ul-veiw-btn {
            padding: 5px 7px;
            border: none;
            align-items: center;
            padding-bottom: 8px;
            background-color: #0f5ef7;
            border-bottom-left-radius: 5px;
            border-bottom-right-radius: 5px;
        }

        .calender-inner-btn .ul-veiw-btn li a {
            color: #fff;
        }

        .calender-dates ul li {
            border: 1px solid #d9d9d9;
            border-radius: 5px;
            margin-top: 10px;
            margin-right: 5px;
            display: inline-block !important;
            padding-bottom: 15px;
            width: 135px !important;
            text-align: center;
        }

        .calender-dates ul li a {
            font-weight: 600;
            padding: 0 10px;
            color: #282828;
        }

        .calender-dates ul li p {
            background-color: #ffb800;
            padding: 8px 0px;
            margin-bottom: 0px;
        }

        #alert {
            display: none;
        }

        #alert_danger {
            display: none;
        }
    </style>
    <div class="main-cont-wrapper">
        <div class="container-fluid">
            <div class="monthly-schedule-head">
                <h2>Set Timing </h2>
            </div>
            <div class="doc-slot-main">
                <div class="doc-slot">
                    <br>
                    <form method="post" action="{{ url('/doctor/add_set_timing') }}">
                        @csrf
                        <input type="hidden" name="doctor_id" value="{{ $doctor_id }}">
                        <table border="0" cellpadding="4" cellspacing="4">
                            <tr>
                                <td>Monday : From &nbsp;</td>
                                <td>
                                    <select name="monday_from_hours">
                                        @for ($i = 0; $i <= 12; $i++)
                                            <option value=" {{ $i }}"> {{ $i }}</option>
                                        @endfor
                                    </select>
                                    <select name="monday_from_minutes">
                                        @for ($i = 0; $i <= 60; $i++)
                                            <option value=" {{ $i }}"> {{ $i }}</option>
                                        @endfor
                                    </select>
                                    To &nbsp;
                                    <select name="monday_to_hours">
                                        @for ($i = 0; $i <= 12; $i++)
                                            <option value=" {{ $i }}"> {{ $i }}</option>
                                        @endfor
                                    </select>
                                    <select name="monday_to_minutes">
                                        @for ($i = 0; $i <= 60; $i++)
                                            <option value=" {{ $i }}"> {{ $i }}</option>
                                        @endfor
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>Tuesday : From &nbsp;</td>
                                <td>
                                    <select name="tuesday_from_hours">
                                        @for ($i = 0; $i <= 12; $i++)
                                            <option value=" {{ $i }}"> {{ $i }}</option>
                                        @endfor
                                    </select>
                                    <select name="tuesday_from_minutes">
                                        @for ($i = 0; $i <= 60; $i++)
                                            <option value=" {{ $i }}"> {{ $i }}</option>
                                        @endfor
                                    </select>
                                    To &nbsp;
                                    <select name="tuesday_to_hours">
                                        @for ($i = 0; $i <= 12; $i++)
                                            <option value=" {{ $i }}"> {{ $i }}</option>
                                        @endfor
                                    </select>
                                    <select name="tuesday_to_minutes">
                                        @for ($i = 0; $i <= 60; $i++)
                                            <option value=" {{ $i }}"> {{ $i }}</option>
                                        @endfor
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>Wednesday : From &nbsp;</td>
                                <td>
                                    <select name="wednesday_from_hours">
                                        @for ($i = 0; $i <= 12; $i++)
                                            <option value=" {{ $i }}"> {{ $i }}</option>
                                        @endfor
                                    </select>
                                    <select name="wednesday_from_minutes">
                                        @for ($i = 0; $i <= 60; $i++)
                                            <option value=" {{ $i }}"> {{ $i }}</option>
                                        @endfor
                                    </select>
                                    To &nbsp;
                                    <select name="wednesday_to_hours">
                                        @for ($i = 0; $i <= 12; $i++)
                                            <option value=" {{ $i }}"> {{ $i }}</option>
                                        @endfor
                                    </select>
                                    <select name="wednesday_to_minutes">
                                        @for ($i = 0; $i <= 60; $i++)
                                            <option value=" {{ $i }}"> {{ $i }}</option>
                                        @endfor
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>Thursday : From &nbsp;</td>
                                <td>
                                    <select name="thursday_from_hours">
                                        @for ($i = 0; $i <= 12; $i++)
                                            <option value=" {{ $i }}"> {{ $i }}</option>
                                        @endfor
                                    </select>
                                    <select name="thursday_from_minutes">
                                        @for ($i = 0; $i <= 60; $i++)
                                            <option value=" {{ $i }}"> {{ $i }}</option>
                                        @endfor
                                    </select>
                                    To &nbsp;
                                    <select name="thursday_to_hours">
                                        @for ($i = 0; $i <= 12; $i++)
                                            <option value=" {{ $i }}"> {{ $i }}</option>
                                        @endfor
                                    </select>
                                    <select name="thursday_to_minutes">
                                        @for ($i = 0; $i <= 60; $i++)
                                            <option value=" {{ $i }}"> {{ $i }}</option>
                                        @endfor
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>Friday : From &nbsp;</td>
                                <td>
                                    <select name="friday_from_hours">
                                        @for ($i = 0; $i <= 12; $i++)
                                            <option value=" {{ $i }}"> {{ $i }}</option>
                                        @endfor
                                    </select>
                                    <select name="friday_from_minutes">
                                        @for ($i = 0; $i <= 60; $i++)
                                            <option value=" {{ $i }}"> {{ $i }}</option>
                                        @endfor
                                    </select>
                                    To &nbsp;
                                    <select name="friday_to_hours">
                                        @for ($i = 0; $i <= 12; $i++)
                                            <option value=" {{ $i }}"> {{ $i }}</option>
                                        @endfor
                                    </select>
                                    <select name="friday_to_minutes">
                                        @for ($i = 0; $i <= 60; $i++)
                                            <option value=" {{ $i }}"> {{ $i }}</option>
                                        @endfor
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>Saturday : From &nbsp;</td>
                                <td>
                                    <select name="saturday_from_hours">
                                        @for ($i = 0; $i <= 12; $i++)
                                            <option value=" {{ $i }}"> {{ $i }}</option>
                                        @endfor
                                    </select>
                                    <select name="saturday_from_minutes">
                                        @for ($i = 0; $i <= 60; $i++)
                                            <option value=" {{ $i }}"> {{ $i }}</option>
                                        @endfor
                                    </select>
                                    To &nbsp;
                                    <select name="saturday_to_hours">
                                        @for ($i = 0; $i <= 12; $i++)
                                            <option value=" {{ $i }}"> {{ $i }}</option>
                                        @endfor
                                    </select>
                                    <select name="saturday_to_minutes">
                                        @for ($i = 0; $i <= 60; $i++)
                                            <option value=" {{ $i }}"> {{ $i }}</option>
                                        @endfor
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>Sunday : From &nbsp;</td>
                                <td>
                                    <select name="sunday_from_hours">
                                        @for ($i = 0; $i <= 12; $i++)
                                            <option value=" {{ $i }}"> {{ $i }}</option>
                                        @endfor
                                    </select>
                                    <select name="sunday_from_minutes">
                                        @for ($i = 0; $i <= 60; $i++)
                                            <option value=" {{ $i }}"> {{ $i }}</option>
                                        @endfor
                                    </select>
                                    To &nbsp;
                                    <select name="sunday_to_hours">
                                        @for ($i = 0; $i <= 12; $i++)
                                            <option value=" {{ $i }}"> {{ $i }}</option>
                                        @endfor
                                    </select>
                                    <select name="sunday_to_minutes">
                                        @for ($i = 0; $i <= 60; $i++)
                                            <option value=" {{ $i }}"> {{ $i }}</option>
                                        @endfor
                                    </select>
                                </td>
                            </tr>
                        </table>
                        <input type="submit" value="Submit" class="btn">
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
