<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <p>Appointment Confirmation Email</p>

    @if ($check_email == 1)
        @foreach ($details as $list)
            <div class="Cardiology">
                <h2 style="font-weight: 700;">Doctor {{ $list->doctor_name }}</h2>
            </div>
            <div>
                <p>Patient Name : {{ $list->patient_name }}</p>
                <p>Patient Email : {{ $list->patient_email }}</p>
                <p>Patient Phone : {{ $list->patient_phone }}</p>
                <p>Date : {{ $list->schedule_date }}</p>
                <p>Slot Timing : {{ $list->start_time }} to {{ $list->end_time }}</p>
                <p>{{ $list->mode }}</p>
            </div>
            <a href="{{ url("/appointment_mail/$list->booking_id") }}" class="btn btn-primary" id="inst-btn">Confirm
                Appointment</a>
        @endforeach
    @else
        @foreach ($details as $show)
            <h1>DR {{ $show->doctor_name }}</h1>
            <p>Patient Name : {{ $show->patient_name }}</p>
            <p>Patient Email : {{ $show->patient_email }}</p>
            <p>Patient Phone : {{ $show->patient_phone }}</p>
            <p>Date : {{ $show->appointment_date }}</p>
            <p>Session : {{ $show->session_name . ' ( ' . $show->start_time . ' - ' . $show->end_time . ' ) ' }}
            </p>
            <p>{{ $show->mode }}</p>
        @endforeach
    @endif

    <p>Thank you</p>
</body>

</html>
