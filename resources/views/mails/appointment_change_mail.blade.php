<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    @foreach ($details as $list)
        <div class="Cardiology">
            <h2 style="font-weight: 700;">Doctor {{ $list->doctor_name }}</h2>
        </div>
        <div>
            <p>Patient Name : {{ $list->patient_name }}</p>
            <p>Patient Email : {{ $list->patient_email }}</p>
            <p>Patient Phone : {{ $list->patient_phone }}</p>
            <p>New Date : {{ $list->schedule_date }}</p>
            <p>Change Appointment Reason : {{ $list->reason }}</p>
            <p>Slot Timing : {{ $list->start_time }} to {{ $list->end_time }}</p>
            <p>{{ $list->mode }}</p>
        </div>
    @endforeach
</body>

</html>
