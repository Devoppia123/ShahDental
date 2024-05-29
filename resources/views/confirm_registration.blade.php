<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <p>Registration Confirmation Email</p>
    <p>Patient Name : {{ $details->name }}</p>

    <p>Login Email : {{ $details->email }}</p>
    <p>Login Password : {{ Session::get('password') }}</p>

    <a href="https://getphr.com/">Click Here: <span>https://getphr.com/</span></a>
</body>

</html>
