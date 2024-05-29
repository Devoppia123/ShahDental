@extends('layouts.doctor_template')

@section('navbar')
    @include('doctor.include.nav_bar_new')
@endsection

@section('sidebar')
    @include('doctor.include.sidebar_new')
@endsection

@section('content')
    <link rel="stylesheet" href="{{ asset('plyr/plyr.css') }}">
    <script src="{{ asset('plyr/plyr.min.js') }}"></script>
    <style>
        .main-cont-wrapper {
            overflow: hidden;
        }
    </style>
    <div class="main-cont-wrapper">
        <div class="container-fluid">
            @if ($success = Session::get('success'))
                <div id="alert" class="alert alert-success">{{ $success }}</div>
            @endif
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        @foreach ($videos as $video)
                            @if ($video->is_compulsory == 1)
                                <div class="col-md-3 col-sm-6 col-xs-12">
                                    <div class="card" style="width: 250px; margin-bottom: 20px;">
                                        <div class="compulsory_video" data-plyr-provider="youtube"
                                            data-plyr-embed-id="{{ $video->link }}"
                                            data-plyr-config='{ "id": "{{ $video->id }}" }'>
                                        </div>

                                        <div class="card-body">
                                            <p>{{ $video->speciality }}</p>
                                            <h5 class="card-title" data-toggle="tooltip" data-placement="left"
                                                title="{{ $video->title }}">{{ Str::limit($video->title, 15) }}</h5>
                                            <p class="card-text" data-toggle="tooltip" data-placement="left"
                                                title="{{ $video->description }}">
                                                {{ Str::limit($video->description, 30) }}
                                            </p>
                                            <a href="{{ url('/doctor/edit_video/' . $video->id) }}"
                                                class="btn btn-primary btn-sm">Edit</a>
                                            <a class="btn btn-danger btn-sm"
                                                href="{{ url('/doctor/delete_video/' . $video->id) }}">Delete</a>
                                        </div>
                                    </div>
                                </div>
                            @else
                                <div class="col-md-3 col-sm-6 col-xs-12">
                                    <div class="card" style="width: 250px; margin-bottom: 20px;">
                                        <div class="simple_video" data-plyr-provider="youtube"
                                            data-plyr-embed-id="{{ $video->link }}"
                                            data-plyr-config='{ "id": "{{ $video->id }}" }'>
                                        </div>
                                        <div class="card-body">
                                            <p>{{ $video->speciality }}</p>
                                            <h5 class="card-title" data-toggle="tooltip" data-placement="left"
                                                title="{{ $video->title }}">{{ Str::limit($video->title, 15) }}</h5>
                                            <p class="card-text" data-toggle="tooltip" data-placement="left"
                                                title="{{ $video->description }}">
                                                {{ Str::limit($video->description, 30) }} </p>
                                            <a href="{{ url('/doctor/edit_video/' . $video->id) }}"
                                                class="btn btn-primary btn-sm">Edit</a>
                                            <a class="btn btn-danger btn-sm"
                                                href="{{ url('/doctor/delete_video' . $video->id) }}">Delete</a>

                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js_code')
    <script>
        $(document).ready(function() {

            const compulsory_video = Plyr.setup('.compulsory_video', {
                invertTime: false,
                controls: ['play', 'current-time', 'mute', 'volume', 'settings', 'fullscreen']
            });

            const simple_video = Plyr.setup('.simple_video', {
                invertTime: false
            });
        });
    </script>
@endsection
