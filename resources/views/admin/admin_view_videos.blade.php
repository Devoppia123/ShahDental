@extends('layouts.admin_template')

@section('sidebar')
    @include('admin.include.sidebar')
@endsection

@section('navbar')
    @include('admin.include.navbar')
@endsection

@section('content')
    <link rel="stylesheet" href="{{ asset('plyr/plyr.css') }}">
    <script src="{{ asset('plyr/plyr.min.js') }}"></script>

    <div class="container-fluid">
        <div class="staff-list-main-sec">
            @if ($success = Session::get('success'))
                <div id="alert" class="alert alert-success">{{ $success }}</div>
            @endif
            <div class="card">
                <div class="card-header">
                    Videos <span>
                        <a href="{{ url('/admin/add_videos') }}" class="btn btn-success btn-sm float-right">Add
                            Video</a>
                    </span>
                </div>
                <div class="card-body">
                    <div class="row">
                        {{-- {{dd($videos)}} --}}
                        @foreach ($videos as $video)
                            @if ($video->is_compulsory == 1)
                                <div class="col-md-3">
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
                                                {!! Str::limit($video->description, 30) !!}
                                            </p>
                                            <a href="{{ url('/admin/edit_video/' . $video->id) }}"
                                                class="btn btn-primary btn-sm">Edit</a>
                                            <a class="btn btn-danger btn-sm"
                                                href="{{ url('/admin/delete_video/' . $video->id) }}">Delete</a>
                                        </div>

                                    </div>

                                </div>
                            @else
                                <div class="col-md-3">
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
                                            <a href="{{ url('/admin/edit_video/' . $video->id) }}"
                                                class="btn btn-primary btn-sm">Edit</a>
                                            <a class="btn btn-danger btn-sm"
                                                href="{{ url('/admin/delete_video/' . $video->id) }}">Delete</a>
                                        </div>
                                    </div>




                                </div>
                            @endif
                            {{-- modal start --}}
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer')
    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script>
        $(document).on('change', '.compulsary_checkbox', function() {
            if ($(this).is(":checked")) {
                $(this).prev().val(1);
            } else {
                $(this).prev().val(0);
            }
        });


        // video
        if ($('.compulsory_video').length) {
            const compulsory_video = Plyr.setup('.compulsory_video', {
                invertTime: false,
                controls: ['play', 'current-time', 'mute', 'volume', 'settings', 'fullscreen']
            });
        }

        if ($('.simple_video').length) {
            const simple_video = Plyr.setup('.simple_video', {
                invertTime: false
            });
        }


        $(document).ready(function() {
            $('#add_video').on('submit', function(e) {
                e.preventDefault();
                var data = $(this).serialize();
                var url = $(this).attr('action');
                $('.errors').html('');
                $.ajax({
                    type: "post",
                    url: url,
                    data: data,
                    dataType: "json",
                    success: function(response) {
                        if (response == 1) {
                            $('.add_modal').modal('hide');
                            $('#add_video')[0].reset();
                            $('#alert-message').addClass('alert alert-success').text(
                                'Video Add Successfully!');
                            setInterval(() => {
                                location.reload();
                            }, 2000);
                        }
                    },
                    error: function(error) {
                        $('.title-error').text(error.responseJSON.errors.title);
                        $('.link-error').text(error.responseJSON.errors.link);
                        $('.description-error').text(error.responseJSON.errors.description);
                        $('.speciality-error').text(error.responseJSON.errors.speciality);
                    }
                });
            });


            setInterval(() => {
                $('#alert').hide();
            }, 2000);

        });
    </script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('js/sb-admin-2.min.js') }}"></script>

    <!-- Page level plugins -->
    <script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

    <!-- Page level custom scripts -->
    <script src="{{ asset('js/demo/datatables-demo.js') }}"></script>
@endsection
