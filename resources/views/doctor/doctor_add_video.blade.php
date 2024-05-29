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
            <h1>Add Videos</h1>
            <div class="row">
                <div class="col-md-12">
                    <div class="white-box">
                        <form class="form-horizontal" method="post" action="{{ url('/doctor/doadd_videos') }}"
                            enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="video_by" value="{{ $doctor_id }}">
                            <div class="add-vid-services-div">
                                <label>Title :</label>
                                <input class="form-control" type="text" required name="title" class="txt-field"
                                    size="35" maxlength="130" />
                            </div>
                            <div class="add-vid-services-div">
                                <label>Link :</label>
                                <input class="form-control" type="text" required name="link" class="txt-field"
                                    size="35" maxlength="130" />
                            </div>
                            <div class="add-vid-services-div">
                                <label>Specialities :</label>
                                <select class="custom-select form-control" name="speciality">
                                    <option value="0">Select Your Speciality</option>
                                    @foreach ($speciality as $sp)
                                        <option value="{{ $sp->id }}">{{ $sp->speciality }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="add-vid-services-div">
                                <label>
                                    <input type="hidden" name="is_compulsory" value="0">
                                    <input type="checkbox" class="compulsory_checkbox">
                                    Is Compulsory </label>
                            </div>
                            <div class="add-vid-services-div">
                                <label>Description :</label>
                                <textarea name="description" class="form-control" rows="5" cols="30"></textarea>
                            </div>
                            <input class="btn btn-info" style="margin-top: 5px" type="submit" value="Submit">
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
