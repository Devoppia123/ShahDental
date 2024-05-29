<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <p>Appointment Cancellation Email</p>
    @foreach ($details as $show)
        <p>Your appointment at {{ $show->schedule_date }} time {{ $show->start_time . ' - ' . $show->end_time }} has
            been cancelled
            successfully</p>
    @endforeach
    <p>Thank you</p>
</body>

</html>
