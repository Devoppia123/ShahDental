@extends('design.template')
@section('title', 'Shah Dental | View Video')
@section('header-main')
    {{-- @include('design.header-main') --}}
    @include('inc.inner-header-header')

@endsection
@section('customCSS')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="{{ asset('css/Our-Speciality.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ url('public/plyr/plyr.css') }}">

    <style>
        .form-control {
            width: 95%;
        }

        .ask-doc-form label {
            margin-bottom: 5px;
            font-weight: 500;
        }

        .header_content h2 {
            font-size: 28px;
            margin-top: 5px;
            margin-bottom: 0px;
            color: #fff;
            font-weight: 600;
        }
    </style>
@endsection
@section('content')
    <div class="container " style="padding-top: 50px">
        @if ($video->is_compulsory == 1)
            <div>
                <div class="simple_video" data-plyr-provider="youtube" data-plyr-embed-id="{{ $video->link }}"
                    data-plyr-config='{ "id": "{{ $video->id }}" }'>
                </div>
                <h1 class="text-center mt-5">{{ $video->title }}</h1>
                <h5>{{ $video->speciality }}</h5>
                <p>{!! $video->description !!}</p>
            </div>
        @else
            <div>
                <div class="simple_video" data-plyr-provider="youtube" data-plyr-embed-id="{{ $video->link }}"
                    data-plyr-config='{ "id": "{{ $video->id }}" }'>
                </div>
                <h1 class="text-center mt-5">{{ $video->title }}</h1>
                <h5>{{ $video->speciality }}</h5>
                <p>{!! $video->description !!}</p>
            </div>
        @endif
    </div>
@endsection

@section('footer-main')
    @include('design.footer-main')
@endsection

@section('script')
    {{-- <script src="{{ asset('plyr/plyr.min.js') }}"></script> --}}
    <script src="{{ url('public/plyr/plyr.min.js') }}"></script>

    <script>
        const compulsory_video = Plyr.setup('.compulsory_video', {
            invertTime: false,
            controls: ['play', 'current-time', 'mute', 'volume', 'settings', 'fullscreen']
        });

        const simple_video = Plyr.setup('.simple_video', {
            invertTime: false
        });
    </script>
@endsection
