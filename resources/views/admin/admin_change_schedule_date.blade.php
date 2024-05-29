@extends('layouts.admin_template')

@section('sidebar')
    @include('admin.include.sidebar')
@endsection

@section('navbar')
    @include('admin.include.navbar')
@endsection

@section('content')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">

    <div class="main-cont-wrapper">
        <div class="container-fluid">
            <h1>Change Schedule Date</h1>
            <form action="{{ url("/admin/transfer_appointment_to_another_date/$doctor_id") }}" method="POST">
                @csrf
                <div class="mt-3">
                    <div class="row">
                        <div class="row" id="showdate" style="display: none;">
                            <div class="col-md-4">
                                <input type="text" placeholder="Please Select A Date" autocomplete="off"
                                    name="schedule_date" id="datepicker">
                            </div>
                            <div class="col-md-4">
                                <textarea name="reason" required class="form-control" placeholder="Reason For Cancel Appointment"></textarea>
                            </div>
                            <div class="col-md-4">
                                <button class="btn btn-primary btn-sm" type="submit">Transfer Appointment</button>
                            </div>
                        </div>

                        <table class="table" id="slots">
                            <thead>
                                <tr>
                                    <th><input type="checkbox" id="headerCheckbox"></th>
                                    <th>Slots Id</th>
                                    <th>Start Time</th>
                                    <th>End Time</th>
                                    <th>Doctor Name</th>
                                    <th>Booked By</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($slots as $slot)
                                    <tr>
                                        <td>
                                            <input type="checkbox" name="slot_id[]" id="{{ $slot->slot_id }}"
                                                value="{{ $slot->slot_id }}">
                                            <input type="hidden" name="booking_id[]" id="{{ $slot->booking_id }}"
                                                value="{{ $slot->booking_id }}">
                                            <input type="hidden" name="old_schedule_id" value="{{ $slot->id }}">
                                        </td>
                                        <td>{{ $slot->slot_id }}</td>
                                        <td>{{ $slot->slot_start_time }}</td>
                                        <td>{{ $slot->slot_end_time }}</td>
                                        <td>{{ $slot->doctor_name }}</td>
                                        @if ($slot->booking_id == null)
                                            <td>
                                                <p>
                                                    Vacate
                                                </p>
                                            </td>
                                        @else
                                            <td style="font-weight: 800;">
                                                @foreach ($patient as $list)
                                                    @if ($slot->slot_id == $list->slot_id)
                                                        <p>
                                                            {{ $list->patient_name }}
                                                        </p>
                                                    @endif
                                                @endforeach
                                            </td>
                                        @endif
                                    </tr>
                                @endforeach
                                <tr>
                            </tbody>
                        </table>
                    </div>
            </form>
        </div>
    </div>
@endsection


@section('js_code')
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <script>
        $(document).ready(function() {
            $('#headerCheckbox').change(function() {
                var isChecked = $(this).is(':checked');
                $('table#slots td input[type="checkbox"]').prop('checked', isChecked);
                toggleDateInput();
            });

            $('table#slots td input[type="checkbox"]').change(function() {
                var allChecked = true;
                $('table#slots td input[type="checkbox"]').each(function() {
                    if (!$(this).is(':checked')) {
                        allChecked = false;
                        return false;
                    }
                });
                $('#headerCheckbox').prop('checked', allChecked);
                toggleDateInput();
            });

            function toggleDateInput() {
                var anyChecked = $('table#slots td input[type="checkbox"]:checked').length > 0;
                if (anyChecked) {
                    $('#showdate').show();
                } else {
                    $('#showdate').hide();
                }
            }
        });
    </script>
    <script>
        $(function() {
            $("#datepicker").datepicker({
                dateFormat: 'dd-mm-yy',
                minDate: 0,
                beforeShowDay: function(date) {
                    var string = jQuery.datepicker.formatDate('dd-mm-yy', date);
                    var isDateDisabled = (availableDates.indexOf(string) === -1);
                    var isDateOld = date < new Date();
                    return [!isDateDisabled && !isDateOld];
                }
            });

            $.ajax({
                url: '/admin/check_date_availability',
                method: 'GET',
                success: function(response) {
                    var availableDates = response.dates;
                    $("#datepicker").datepicker("option", "beforeShowDay", function(date) {
                        var string = jQuery.datepicker.formatDate('dd-mm-yy', date);
                        var isDateDisabled = (availableDates.indexOf(string) === -1);
                        var isDateOld = date < new Date();
                        return [!isDateDisabled && !isDateOld];
                    });
                },
                error: function(xhr, status, error) {
                    console.log(error);
                }
            });
        });
    </script>
@endsection
