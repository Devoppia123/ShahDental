@extends('layouts.staff_template')

@section('sidebar')
    @include('nurse.include.manage_doctor_sidebar')
@endsection

@section('navbar')
    @include('nurse.include.nav_bar_new')
@endsection

@section('content')
    <link rel="stylesheet" href="{{ asset('css/view-booking.css') }}">

    <div class="main-cont-wrapper">
        <div class="container-fluid">

            <div id="alert">
                <span id="text"></span>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
            </div>

            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 veiw-booking-lsit-head">
                <h2>View Monthly,<span> Bookings</span></h2>
            </div>

            <div class="icon-top-right" style="float: right;"><i class="fa fa-chevron-left"></i><span>Back</span></div>
            <table id="app_table" class="display reading-tble " style="width:100%">

                <thead>
                    <tr style="border-bottom: 4px solid #c5ceda;">
                        <th style="width: 8%;">Slot ID</th>
                        <th style="width: 8%;">Date</th>
                        <th class="text-center">Day</th>
                        <th class="text-center" style="width: 10%;">Slot Timings</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">Patient Name</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($data as $list)
                        <tr>
                            <td class="text-center">{{ $list->slot_id }}</td>
                            <td class="text-center">{{ $list->schedule_date }}</td>
                            <td class="text-center">{{ date('D', strtotime($list->schedule_date)) }}</td>
                            <td class="text-center">
                                <details>
                                    <p>
                                        <b>Start Time:</b> {{ $list->start_time }}<br>
                                        <b>End Time:</b> {{ $list->end_time }}<br>
                                    </p>
                                </details>
                            </td>
                            <td class="text-center">
                                @if ($list->booking_id != null)
                                    BOOKED
                                @else
                                    VACANT
                                @endif
                            </td>
                            <td class="text-center">
                                @if ($list->booking_id != null)
                                    @foreach ($patient as $pat)
                                        @if ($pat->booking_id == $list->booking_id && $pat->status == 1)
                                            <details>
                                                <p>
                                                    <b> Name: </b>{{ $pat->patient_name }} <br>
                                                    <b> Phone: </b>{{ $pat->patient_phone }} <br>
                                                    <b> Email: </b>{{ $pat->patient_email }}
                                                </p>
                                            </details>
                                        @endif
                                    @endforeach
                                @else
                                    VACANT
                                @endif
                            </td>
                            <td class="text-center">
                                <ul>
                                    @if ($list->booking_id != null)
                                        BOOKED
                                    @else
                                        <li class="btn-li">
                                            <a class="btn btn-warning btn-sm" href="#">Vacate</a>
                                            {{-- <a class="btn btn-warning btn-sm"
                                                href="{{ url("/nurse/book_appointment/$list->slot_id") }}">Vacate</a> --}}
                                        </li>
                                    @endif
                                </ul>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection


@section('js_code')
@endsection
