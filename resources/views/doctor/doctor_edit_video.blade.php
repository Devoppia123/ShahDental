@extends('layouts.doctor_template')

@section('navbar')
    @include('doctor.include.nav_bar_new')
@endsection

@section('sidebar')
    @include('doctor.include.sidebar_new')
@endsection

@section('content')
    <div class="main-cont-wrapper">
        <div class="container-fluid">
            <h1>Update Video</h1>
            <div class="row">
                <div class="col-md-12">
                    <div class="white-box">
                        <form class="form-horizontal" method="post" action="{{ url('/doctor/update_video') }}"
                            enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="video_id" value="{{ $edit_video->video_id }}">
                            <input type="hidden" name="video_by" value="{{ $edit_video->video_by }}">
                            <div class="add-vid-services-div">
                                <label>Title :</label>
                                <input class="form-control" type="text" name="title" value="{{ $edit_video->title }}"
                                    class="txt-field" />
                            </div>
                            <div class="add-vid-services-div">
                                <label>Link :</label>
                                <input class="form-control" type="text" name="link" value="{{ $edit_video->link }}"
                                    class="txt-field" />
                            </div>
                            <div class="add-vid-services-div">
                                <label>Specialities :</label>
                                <select class="custom-select form-control" name="speciality">
                                    @foreach ($specialities as $sp)
                                        <option value="{{ $edit_video->speciality_id }}">{{ $sp->speciality }}</option>
                                        <option value="{{ $sp->id }}">{{ $sp->speciality }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="add-vid-services-div">
                                <label>
                                    @if ($edit_video->is_compulsory == 1)
                                        <input type="hidden" name="is_compulsory" value="{{ $edit_video->is_compulsory }}">
                                        <input type="checkbox" checked class="compulsory_checkbox">
                                    @else
                                        <input type="hidden" name="is_compulsory" value="0">
                                        <input type="checkbox" class="compulsory_checkbox">
                                    @endif
                                    Is Compulsory
                                </label>
                            </div>
                            <div class="add-vid-services-div">
                                <label>Description :</label>
                                <textarea name="description" class="form-control" rows="5">{{ $edit_video->description }}</textarea>
                            </div>
                            <button class="btn btn-info" style="margin-top: 20px" type="submit">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js_code')
    <script>
        $(document).on('change', '.compulsory_checkbox', function() {
            if ($(this).is(":checked")) {
                $(this).prev().val(1);
            } else {
                $(this).prev().val(0);
            }
        });
    </script>
@endsection
