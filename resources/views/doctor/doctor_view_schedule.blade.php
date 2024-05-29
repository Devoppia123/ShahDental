@extends('layouts.doctor_template')

@section('navbar')
    @include('doctor.include.nav_bar_new')
@endsection

@section('sidebar')
    @include('doctor.include.sidebar_new')
@endsection

@section('content')
    <link rel="stylesheet" href="{{ asset('css/view_schedule.css') }}">
    <div class="main-cont-wrapper">
        <div class="container-fluid">
            @php
                $currentTimeStamp = strtotime("$year-$month-01");
                $monthName = date('F', $currentTimeStamp);
                $numDays = date('t', $currentTimeStamp);
                $counter = 0;
                
                $monthName . ' ' . $year;
                $numDays = date('t', $currentTimeStamp);
                
                $day = '01';
                $date = $year . '-' . $month . '-' . $day;
                
                $date = date('Y-m-d', strtotime($date));
            @endphp

            @if ($message = Session::get('success'))
                <div class="alert alert-success alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{ $message }}</strong>
                </div>
            @endif

            <h1>{{ $monthName }} {{ $year }}</h1>
            @if ($enable_slot->enable_slots == 0)
                <a href="{{ url("/doctor/enable_slot/$doctor_id") }}" class="btn btn-success btn-sm"
                    style="margin-bottom: 5px;">Enable Slots</a>
                <p>Slot is Disable</p>
            @else
                <a href="{{ url("/doctor/disable_slot/$doctor_id") }}" class="btn btn-danger btn-sm"
                    style="margin-bottom: 5px;">Disable Slots</a>
                <p>Slot is Enable</p>
            @endif
            <div class='prv-nxt'>
                <input type='button' class='previous-btn' value=' PREVIOUS '
                    onClick='goLastMonth({{ $month . ',' . $year . ',' . $doctor_id }})'>
                <input type='button' class='next-btn' value=' NEXT '
                    onClick='goNextMonth({{ $month . ',' . $year . ',' . $doctor_id }})'>
            </div>
            <div class="date-slection-flow-dic">
                <div class="calender-slot">
                    <ul>
                        <li> <a style="color: red" href="javascript:void(0);">Sunday</a></li>
                        <li> <a href="javascript:void(0);">Monday</a></li>
                        <li> <a href="javascript:void(0);">Tuesday</a></li>
                        <li> <a href="javascript:void(0);">Wednesday</a></li>
                        <li> <a href="javascript:void(0);">Thursday</a></li>
                        <li> <a href="javascript:void(0);">Friday</a></li>
                        <li style="border-right: none;"> <a style="color: red" href="javascript:void(0);">Saturday</a>
                        </li>
                    </ul>
                </div>
                <div class="calender-dates">
                    <ul>
                        @php
                            $numDays = date('t', $currentTimeStamp);
                        @endphp


                        @for ($i = 1; $i < $numDays + 1; $i++, $counter++)
                            @php
                                $timeStamp = strtotime("$year-$month-$i");
                                
                            @endphp

                            @if ($i == 1)
                                @php
                                    $firstDay = date('w', $timeStamp);
                                @endphp


                                @for ($j = 0; $j < $firstDay; $j++, $counter++)
                                    <li style='border: none;'></li>
                                @endfor
                            @endif


                            @if ($counter % 7 == 0)
                                @php
                                    echo '';
                                @endphp
                            @endif

                            @php
                                $mydate = $year . '-' . $month . '-' . $i;
                                $mydate = date('Y-m-d', strtotime($mydate));
                            @endphp
                            <li>
                                <h5>{{ $i }}</h5>
                                <br>
                                @foreach ($schedule as $item)
                                    @if ($mydate == $item->schedule_date)
                                        </h4>
                                        <h4>{{ date('H:i', strtotime($item->start_time)) }} -
                                            {{ date('H:i A', strtotime($item->end_time)) }}</h4>
                                        <p>
                                            <a
                                                href='{{ url('/doctor/view_slots/' . $item->id . '/' . $month . '/' . $year . '/' . $item->doctor_id) }}'>Veiw</a>
                                            {{-- <a style='border-right: 1px solid #685021;'
                                            href='{{ url('/doctor/view_slots/' . $item->id . '/' . $month . '/' . $year . '/' . $item->doctor_id) }}'>Veiw</a> --}}
                                            {{-- <span><a
                                                href='{{ url('delete_doctor_slot/' . $item->id . '/' . $month . '/' . $year . '/' . $item->doctor_id) }}'>Delete</a></span> --}}
                                        </p>
                                    @endif
                                @endforeach
                        @endfor
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('js_code')
    <script>
        function goLastMonth(month, year, doctor_id, mydate) {

            if (month == 1) {
                --year;
                month = 13;
            }
            month--;

            if (month < 10) {
                month = '0' + month;
            }
            var url = "doctor/view_schedule/" + month + '/' + year + '/' + doctor_id;

            document.location.href = '/' + url;
        }

        function goNextMonth(month, year, doctor_id, mydate) {

            if (month == 12) {
                ++year;
                month = 0;
            }
            month++;

            if (month < 10) {
                month = '0' + month;
            }
            var url = "doctor/view_schedule/" + month + '/' + year + '/' + doctor_id;

            document.location.href = '/' + url;
        }


        function showDays() {
            if (document.getElementById("weekdays").style.display == "none") {
                document.getElementById("weekdays").style.display = "block";

            } else
                document.getElementById("weekdays").style.display = "none";
        }
    </script>
@endsection
