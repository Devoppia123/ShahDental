@extends('design.template')
@section('title', 'Shah Dental | All Services')
@section('customCSS')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="{{ asset('css/Our-Speciality.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

    <style>
        .view-more-btn {
            background-color: #9b212a;
            color: #fff;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            display: inline-block;
            font-size: 16px;
            font-weight: bold;
            transition: background-color 0.3s;
        }

        .view-more-btn:hover {
            background-color: #f9f9f9 !important;
            /* color: #0000 !important; */
        }

        .card.text-center.service-image {
            /* border-radius: 18px; */
            border-top-right-radius: 5.3%;
            border-top-left-radius: 5.3%;
        }
        .card.text-center.service-image img {
            
            border-top-right-radius: 5.3%;
            border-top-left-radius: 5.3%;
        }

    </style>
@endsection
@section('header-main')
    {{-- @include('design.header-main') --}}
    @include('inc.inner-header-header')

@endsection
@section('content')
    <main>
        <section class="Our-services">
            <div class="container">
                <div class="row">
                    <div class="health-video-content">
                        <div class="row">
                            {{-- <h2>Our Services</h2> --}}
                            <p>Dr. Shah Faisal & Associates takes pride in introducing its dynamic team of qualified
                                experienced &
                                professionally competent Dental Surgeon supported by well-trained chair side assistants,
                                lab technicians
                                & receptionist.</p>
                            @foreach ($speciality as $sp)
                                <div class="col-lg-3 col-md-4 col-sm-6 col-12 p-2 card-inner-body">
                                    <div class="card text-center service-image">
                                        {{-- <img src="{{ asset('images/services-img_03.png') }}" class="card-img-top" alt="..."> --}}
                                        <img src="{{ url("/public/service_image/$sp->image") }}" alt="">
                                        <div class="card-body">
                                            <h5 class="card-title">
                                                {{ $sp->speciality }}
                                            </h5>
                                            <a href="{{ url("/services_details/$sp->id") }}" class="view-more-btn card-btn"
                                                target="blank"> VIEW MORE
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
@section('footer-main')
    @include('design.footer-main')
@endsection
@section('script')

@endsection
