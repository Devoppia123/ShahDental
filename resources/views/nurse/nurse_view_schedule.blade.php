@extends('layouts.staff_template')

@section('sidebar')
    @include('nurse.include.manage_doctor_sidebar')
@endsection

@section('navbar')
    @include('nurse.include.nav_bar_new')
@endsection

@section('content')
    <link rel="stylesheet" href="{{ asset('css/view_schedule.css') }}">
<style>
    .view_schedule-inner-over-flw{
        overflow: auto;

    }
    .view_schedule-inner-over-flw::-webkit-scrollbar{
        display: none;
    }
</style>
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

            {{-- message show --}}
            @if ($message = Session::get('success'))
                <div class="alert alert-success alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{ $message }}</strong>
                </div>
            @endif
            {{-- message show --}}



            <h1>{{ $monthName }} {{ $year }}</h1>
            <div class='prv-nxt'>
                <input type='button' class='previous-btn' value=' PREVIOUS '
                    onClick='goLastMonth({{ $month . ',' . $year . ',' . $doctor_id }})'>
                <input type='button' class='next-btn' value=' NEXT '
                    onClick='goNextMonth({{ $month . ',' . $year . ',' . $doctor_id }})'>
            </div>
            <div class="view_schedule-inner-over-flw">
                <div class="calender-slot">
                    <ul>
                        <li> <a style="color: red" href="javascript:void(0);">Sunday</a></li>
                        <li> <a href="javascript:void(0);">Monday</a></li>
                        <li> <a href="javascript:void(0);">Tuesday</a></li>
                        <li> <a href="javascript:void(0);">Wednesday</a></li>
                        <li> <a href="javascript:void(0);">Thursday</a></li>
                        <li> <a href="javascript:void(0);">Friday</a></li>
                        <li style="border-right: none;"> <a style="color: red" href="javascript:void(0);">Saturday</a></li>
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
                                                href='{{ url('/nurse/view_slots/' . $item->id . '/' . $month . '/' . $year . '/' . $item->doctor_id) }}'>Veiw</a>
                                            {{-- <a style='border-right: 1px solid #685021;'
                                            href='{{ url('/nurse/view_slots/' . $item->id . '/' . $month . '/' . $year . '/' . $item->doctor_id) }}'>Veiw</a> --}}
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
            var url = "nurse/view_schedule/" + month + '/' + year + '/' + doctor_id;

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
            var url = "nurse/view_schedule/" + month + '/' + year + '/' + doctor_id;

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
