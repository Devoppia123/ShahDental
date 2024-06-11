<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    @foreach ($details as $item)
        <h3>Doctor Name: {{ $item->doctor_name ?? 'N/A' }}</h3>
        @if (isset($item->patient_name))
            <h5>{{ $item->patient_name }}</h5>
        @else
            <h5>N/A</h5>
        @endif
        <p>Appointment Query: {{ $item->appointment_reason }}</p>
        <p>Reply From Doctor: {{ $item->reply }}</p>
    @endforeach
</body>

</html>

