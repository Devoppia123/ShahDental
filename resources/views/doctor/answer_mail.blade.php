<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h1>Reply Your Qurey</h1>
    <h3>From Dr {{ $details->doctor_name }}</h3>
    <p><b>Your Qurey : </b><span>{{ $details->message }}</span></p>
    <p><b>Answer : </b><span>{{ $details->reply }}</span></p>
</body>

</html>
