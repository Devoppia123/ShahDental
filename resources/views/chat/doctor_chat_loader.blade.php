<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('patient/css/discussion.css') }}">

</head>

<body>
    @foreach ($chats as $list)
        <div class="chat-item chat-left d-flex justify-content-end" style="position: relative">
            <div class="chat-details user_box bg-primary">
                <div class="avator-icon">
                    <img src="{{ asset('images/avatar.jpg') }}" alt="">
                    <div class="main-inner-chat">
                        <div class="chat-txt">
                            <span>{{ $list->text }} </span>
                        </div>
                        <div class="msg-by-patient" style="">
                            <span>From {{ $list->name }} </span>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    @endforeach

</body>

</html>
