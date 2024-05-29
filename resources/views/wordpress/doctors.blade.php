<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css"
        integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css"
        integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js"
        integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous">
    </script>
</head>

<style>
    .doctor-image {
        height: 170px;
        border-radius: 100%;
        border: 3px solid #fff;
        padding: 10px;
        box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 20px;
    }

    .btn-appointment {
        background-color: #9b212a;
        color: #fff;
        text-decoration: none !important;
        font-size: 14px;
        font-weight: 700;
        padding: 10px 15px;
        border-radius: 5px;
        cursor: pointer;
    }

    a:hover {
        color: #fff;
    }

    .top {
        margin-top: 50px;
    }

    .btn-appointment.view-more-btn {
        display: block;
        position: absolute;
        left: 50%;
        transform: translateX(-50%);
        top: 450px;
        padding: 15px 50px;
    }

    .view-more-btn {
        background-color: #9b212a;
        color: #fff;
        text-decoration: none !important;
        font-size: 14px;
        font-weight: 700;
        border-radius: 5px;
        cursor: pointer;
        padding: 15px 50px;
    }

    .view-more-btn:hover {
        background-color: #9b212a;
        color: #fff;

    }

    .vu-btn {
        display: flex;
        justify-content: center;
    }

    .card-title b {
        font-size: 16px;
        margin-bottom: 10px !important;
        display: inline-block;
        height: 9px;
        margin-top: 15px;
    }

    .bottom-btn {
        margin: 1.6rem 0rem;
    }

    .bottom-btn a {
        color: #000;
        text-decoration: none;
        cursor: pointer;
        font-size: 13px;
        margin: 0px 10px;
    }
</style>

<body>
    <div class="container">
        <div class="text-center">
            <h1 style="font-weight: 700;font-size: 50px;">Meet the Team</h1>
            <p>Dr. Shah Faisal & Associates takes pride in introducing its dynamic team of qualified experienced &
                professionally competent Dental Surgeon supported by well-trained chair side assistants, lab technicians
                & receptionist.</p>
        </div>
        <div class="row top" style="margin-top: 100px">
            @foreach ($doctor as $index => $doc)
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                    <div class="card text-center">
                        <img class="card-img-top doctor-image" src="{{ asset("profile_image/$doc->profile_image") }}"
                            alt="">
                        <div class="card-body">
                            @foreach ($doc->user_role as $user_role)
                                <h4 class="card-title" style="margin-bottom: 30px;"><b>{{ $user_role->name }}</b>
                                </h4>
                            @endforeach
                            <a class="btn-appointment" href="{{ url("get_appointment/$doc->doctorID") }}"
                                target="_blank">Get An
                                Appointment</a>
                            <div class="bottom-btn">
                                <a href="{{ url("doctor_profile/$doc->doctorID") }}" target="_blank">View Profile </a>|
                                <a href="{{ url("ask_doctor/$doc->doctorID") }}" target="_blank">Ask Doctor</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="vu-btn" style="margin: 50px;">
            <a class="view-more-btn" href="{{ url('/find_doctors') }}" target="_blank">VIEW MORE >>
            </a>
        </div>

    </div>
</body>

</html>
