<!doctype html>
<html lang="en">

<head>
    <title>Our Specialties</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/Our-Services.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
</head>

<body>
    <main>
        <section class="Our-services">
            <div class="container">
                <div class="row">
                    <div class="health-video-content">
                        <div class="row">
                            <h2>Our Services</h2>
                            <p>Dr. Shah Faisal & Associates takes pride in introducing its dynamic team of qualified
                                experienced &
                                professionally competent Dental Surgeon supported by well-trained chair side assistants,
                                lab technicians
                                & receptionist.</p>
                            @foreach ($speciality as $sp)
                                <div class="col-lg-3 col-md-4 col-sm-6 col-12 p-2 card-inner-body">
                                    <div class="card text-center">
                                        <img src="{{ asset("service_image/$sp->image") }}" class="card-img-top"
                                            alt="...">
                                        <div class="card-body">
                                            <h5 class="card-title">
                                                {{ $sp->speciality }}
                                            </h5>
                                            <a href="{{ url("/services_details/$sp->id") }}" class="card-btn"
                                                target="blank">VIEW
                                                MORE</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            <div
                                class="veiw-all-btn
                                                col-lg-12 text-center">
                                <a href="{{ url('all_services') }}" target="blank">VIEW MORE</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </section>



    </main>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
        integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>
</body>

</html>
