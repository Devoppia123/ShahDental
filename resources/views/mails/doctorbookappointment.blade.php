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
    @foreach ($details as $show)
        <h1>DR {{ $show->doctor_name }}</h1>
        <p>Patient Name : {{ $show->patient_name }}</p>
        <p>Patient Email : {{ $show->patient_email }}</p>
        <p>Patient Phone : {{ $show->patient_phone }}</p>
        <p>Date : {{ $show->schedule_date }}</p>
        <p>Slot Timing : {{ $show->start_time }} to {{ $show->end_time }}</p>
        <p>{{ $show->mode }}</p>
    @endforeach
    <p>Thank you</p>
</body>

</html>
