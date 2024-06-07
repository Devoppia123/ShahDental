@extends('design.template')
@section('title', 'Shah Dental | Service Details')
@section('header-main')
    {{-- @include('design.header-main') --}}
    @include('inc.inner-header-header')

@endsection
@section('customCSS')
    <link rel="stylesheet" href="{{ url('public/plyr/plyr.css') }}">
    <link rel="stylesheet" href="{{ url('public/css/Our-Speciality.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"
        integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="{{ url('public/plyr/plyr.min.js') }}"></script>

    <style>
        /* Doctors else condtions */
        .else-condition {
            font-size: large;
            color: #fff;
        }

        /* Header Max Width */
        .main-section .container {
            /* max-width: 1600px; */
            margin: 0 auto;
        }

        .doc-info-btn {
            text-decoration: none;
            color: #fff;
        }

        .doc-info-btn:hover {
            text-decoration: none;
            color: #fff;
        }

        .doctor-image {
            width: 180px;
            height: 170px;
            border-radius: 100%;
            border: 8px solid #9b212a;
            margin: 5px;
            box-shadow: rgba(34, 33, 33, 0.35) 0px 5px 20px;
        }

        .card-title b {
            font-size: 16px;
            margin-bottom: 10px !important;
            display: inline-block;
            height: 9px;
            margin-top: 15px;
        }


        .btn-appointment {
            padding: 15px 30px;
            font-size: 17px;
            font-family: poppins;
            background-color: #fff;
            color: #9b212a;
            text-decoration: none;
            border-radius: 12px;
        }

        .btn-appointment:hover {
            color: #000;
        }

        .top {
            margin-top: 50px;
        }

        .health-video-content pre a {
            text-decoration: none;
            padding: 0px;
            text-align: left;
            color: #ffffff;
        }

        .btn-appointment.view-more-btn {
            display: block;
            position: absolute;
            left: 50%;
            transform: translateX(-50%);
            top: 450px;
            padding: 15px 50px;
        }

        .bottom-btn {
            margin: 1.6rem 0rem;
            color: #fff;
        }

        .bottom-btn a {
            color: #fff;
            text-decoration: none;
            cursor: pointer;
            font-size: 13px;
            margin: 0px 10px;
        }

        .plyr--video {
            height: 150px;
        }
        .article-image{
            width: 100%;
            border-radius: 2%;
        }
        
    </style>
@endsection

@section('content')
    <main>
        <section class="speciality-name speciality-detail">
            <div class="container">
                <div class="branch-heading">
                    <h2>{{ $speciality->speciality }}</h2>
                </div>

                {{-- add this line to image fetch --}}
                @if ($latest_article != null)
                    <div class="blog-sec-01 text-center">
                        <img class="speciality-detail-img" style="width: 60%" src="{{ url("public/articles/$latest_article->image") }}" alt="">
                    </div>
                @endif
                {{-- <h6>{!! $speciality->description !!}</h6> --}}
                <p>{{Str::limit( $speciality->description,500) }}</p>
            </div>
        </section>

        {{-- Doctors List --}}
        <section class="doctor-section">
            <div class="container">
                <h1 style="color: white;font-weight: 900;">
                    Consultant Doctors</h1>
                @if (!$doctor->isEmpty())
                    <div class="row top" style="margin-bottom: 50px">
                        @foreach ($doctor as $index => $doc)
                            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                                {{-- style="{{ $index == 1 || $index == 2 ? 'margin-top: 50px;' : '' }}"> --}}
                                <div class="text-center">
                                    <img class="card-img-top doctor-image"
                                        src="{{ url("public/profile_image/$doc->profile_image") }}" alt="profile image">
                                    @foreach ($doc->user_role as $user_role)
                                        <h4 class="card-title text-white" style="margin-bottom: 30px;"><b>
                                                {{ $user_role->name }}</b>
                                        </h4>
                                    @endforeach
                                    <a class="btn-appointment" href="{{ url("get_appointment/$doc->doctorID") }}">Get An
                                        Appointment</a>
                                    <div class="bottom-btn">
                                        <a class="doc-info-btn" href="{{ url("doctor_profile/$doc->doctorID") }}">View
                                            Profile </a>|
                                        <a class="doc-info-btn" href="{{ url("ask_doctor/$doc->doctorID") }}">Ask
                                            Doctor</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <div class="row text-center m-auto view-more-btn">
                            <div class="col-sm-12">
                                <a class="btn-appointment text-center" href="{{ url('/find_doctors') }}">VIEW MORE >> </a>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="row top" style="margin-bottom: 50px">
                        <div class="col-sm-12 else-condition">
                            <p>
                                No Consultants Found!
                            </p>
                        </div>
                    </div>

                @endif
            </div>
        </section>

        {{-- Related Articles --}}
        <section class="speciality-blog" style="margin: 150px">
            <div class="container">
                {{-- <h2>{{ $speciality->speciality }}</h2> --}}
                <h2>Articles</h2>
                <div class="container">
                    <div class="row">
                        @if (!$articles->isEmpty())
                            {{-- Latest Article --}}
                            <div class="col-lg-4 col-md-12">
                                <div class="blog-sec-01">
                                    <img class="article-image" src="{{ url("public/articles/$latest_article->image") }}"
                                        alt="">
                                    <h3 class="heading-tab-1">{{ $latest_article->title }}</h3>
                                    <p>{{ Str::limit($latest_article->description, 200) }}</p>
                                    <a class="btn btn-success btn-sm"
                                        href="{{ url("/view_article/$latest_article->id ") }}">View Article</a>
                                </div>

                            </div>
                            {{-- All previous Articles --}}
                            <div class="col-lg-8 col-md-12" style="display: flex; flex-direction: column; align-items: center;">
                                @foreach ($articles as $article)
                                    <div class="col-lg-10">
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <img style="width: 100%"
                                                    src="{{ url("public/articles/$article->image") }}">
                                            </div>
                                            <div class="col-lg-8" style="padding-left: 10px">
                                                <div class="blog-content">
                                                    <h5>{{ $article->title }}</h5>
                                                    <p>
                                                        {{ Str::limit($article->description, 150) }}
                                                        <a
                                                            href="{{ url("/view_article/$article->id ") }}">Read More</a>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <div style="text-align:center;">
                                <h4>No Articles Found!</h4>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </section>
        {{-- Related Videos --}}
        <section class="related-videos">
            <div class="container">
                <div class="row">
                    <div class="col-lg-1"></div>
                    <div class="col-lg-10">
                        <div class="health-video-content">
                            <div class="row">
                                <h2>Related Videos</h2>
                                {{-- @dd($videos) --}}
                                @if (!$videos->isEmpty())
                                    @foreach ($videos as $video)
                                        <div class="col-lg-4 col-md-6 col-sm-6 col-12 p-2 video-inner-frame">
                                            <div class="simple_video" data-plyr-provider="youtube"
                                                data-plyr-embed-id="{{ $video->link }}"
                                                data-plyr-config='{ "id": "{{ $video->id }}" }'></div>
                                            <h5 class="text-white">{{ $video->title }}</h5>
                                            <p>{!! Str::limit($video->description, 30) !!}</p>
                                            <a class="btn btn-primary btn-sm" href="{{ url("/view_video/$video->id") }}">
                                                View Video</a>
                                        </div>
                                    @endforeach
                                @else
                                    <div class="row">
                                        <div class="col-sm-12 text-center">
                                            <h4 class="text-white">No Videos Found</h4>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-1"></div>
                </div>
            </div>
        </section>
    </main>
@endsection

@section('footer-main')
    @include('design.footer-main')
@endsection

@section('script')
    <script>
        const simple_video = Plyr.setup('.simple_video', {
            invertTime: false
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
        integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>
@endsection
