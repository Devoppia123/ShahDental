@extends('layouts.staff_template')

@section('sidebar')
    @include('nurse.include.manage_doctor_sidebar')
@endsection

@section('navbar')
    @include('nurse.include.nav_bar_new')
@endsection

@section('content')
    <link rel="stylesheet" href="{{ asset('css/schedule.css') }}">

    <div class="main-cont-wrapper">
        <div class="container-fluid">
            <div class="monthly-schedule-head">
                <h2>set monthly schedule, <span>schedule</span></h2>
                @php
                    $data['doctor_id'];
                    $year_link = date('Y', strtotime($data['date1']));
                    $month_link = date('m', strtotime($data['date1']));
                    $year = date('Y', strtotime($data['date1']));
                    $month = date('F', strtotime($data['date1']));
                @endphp
                <h5>{{ $month }} {{ $year }}</h5>
                @if (Session::has('message'))
                    <div class="alert alert-success">
                        <div id="alert" class="alert alert-success alert-block">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong>{{ Session::get('message') }}</strong>
                        </div>
                    </div>
                    @php
                        Session::forget();
                    @endphp
                @endif
            </div>
            <div class="doc-slot-main">
                <h6>Doctor</h6>
                <div class="doc-slot">
                    <br>
                    <form action="{{ url('/nurse/doadd_schedule_slots') }}" method="POST">
                        @csrf
                        <input type="hidden" name="doctor_id" value="{{ $data['doctor_id'] }}" id="">
                        <input type="hidden" name="date1" value="{{ $data['date1'] }}" id="">
                        <input type="hidden" name="date2" value="{{ $data['date2'] }}" id="">
                        <br>
                        <label for="from">From :</label>
                        <select name="from_hours" id="from">
                            <option value="0">0</option>
                            @for ($i = 1; $i <= 24; $i++)
                                <option value=" {{ $i }}"> {{ $i }}</option>
                            @endfor
                        </select>
                        <select name="from_minutes" id="from">
                            <option value="0">0</option>
                            @for ($i = 5; $i <= 60; $i += 5)
                                <option value="{{ $i }}">{{ $i }}</option>
                            @endfor
                        </select>
                        <label for="from">To :</label>
                        <select name="to_hours" id="from">
                            <option value="0">0</option>
                            @for ($i = 1; $i <= 24; $i++)
                                <option value=" {{ $i }}"> {{ $i }}</option>
                            @endfor
                        </select>
                        <select name="to_minutes" id="from">
                            <option value="0">0</option>
                            @for ($i = 5; $i <= 60; $i += 5)
                                <option value="{{ $i }}">{{ $i }}</option>
                            @endfor
                        </select>
                        <label for="from">Slot Time :</label>
                        <input type="text" value="20" name="slot_duration" id="from">
                        <label for="from"> min</label>
                </div>

                <div class="exclude-slot">
                    <label for="form" style="font-weight: 700;">Exclude Days: </label>
                    <input type="checkbox" id="mon" name="exclude_days[]" value="1">
                    <label for="mon">Monday</label>
                    <input type="checkbox" id="tues" name="exclude_days[]" value="2">
                    <label for="tues">Tuesday</label>
                    <input type="checkbox" id="wed" name="exclude_days[]" value="3">
                    <label for="wed">Wednesday</label>
                    <input type="checkbox" id="thurs" name="exclude_days[]" value="4">
                    <label for="thurs">Thursday</label>
                    <input type="checkbox" id="fri" name="exclude_days[]" value="5">
                    <label for="fri">Friday</label>
                    <input type="checkbox" id="sat" name="exclude_days[]" value="6">
                    <label for="sat">Saturday</label>
                    <input type="checkbox" id="sun" name="exclude_days[]" value="0">
                    <label for="sun">Sunday</label>
                    <button type="submit">
                        Add Slots
                    </button>
                </div>

                </form>
            </div>
        </div>
    </div>
@endsection

@section('js_code')
    <script src='{{ asset('calender.js') }}'></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                headerToolbar: {
                    left: 'prev,next',
                    center: 'title',
                },
                // initialDate: '2020-09-12',
                // navLinks: true, // can click day/week names to navigate views
                // editable: true,
                // dayMaxEvents: true, // allow "more" link when too many events
                events: [

                ]
            });
            calendar.render();
        });
    </script>
@endsection
