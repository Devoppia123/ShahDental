@extends('layouts.admin_template')
@section('sidebar')
    @include('admin.include.sidebar')
@endsection

@section('navbar')
    @include('admin.include.navbar')
@endsection
@section('content')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>


    <div class="main-cont-wrapper">
        <div class="container-fluid">
            <h1>Add Videos</h1>
            <div class="row">
                <div class="col-md-12">
                    <div class="white-box">
                        <form class="form-horizontal" method="post" action="{{ url('/admin/doadd_videos') }}"
                            enctype="multipart/form-data">
                            @csrf
                            <div>
                                <label>Title :</label>
                                <input class="form-control" type="text" required name="title" class="txt-field"
                                    size="35" maxlength="130" />
                            </div>
                            <div>
                                <label>Link :</label>
                                <input class="form-control" type="text" required name="link" class="txt-field"
                                    size="35" maxlength="130" />
                            </div>
                            <div>
                                <label>Specialities :</label>
                                <select class="custom-select" name="speciality">
                                    <option value="0">Select Your Speciality</option>
                                    @foreach ($speciality as $sp)
                                        <option value="{{ $sp->id }}">{{ $sp->speciality }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div>
                                <label>
                                    <input type="hidden" name="is_compulsory" value="0">
                                    <input type="checkbox" class="compulsory_checkbox">
                                    Is Compulsory </label>
                            </div>
                            <div>
                                <label>Description :</label>
                                <textarea name="description" class="form-control makeMeSummernote" rows="5" cols="30"></textarea>
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
    <script type="text/javascript">
        $('.makeMeSummernote').summernote({
            height: 100,
        });
    </script>
@endsection
