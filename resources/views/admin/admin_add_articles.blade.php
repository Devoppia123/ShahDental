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
            <h1>Add Articles</h1>
            <div class="row">
                <div class="col-md-12">
                    <div class="white-box">
                        <form method="post" action="{{ url('/admin/doadd_articles') }}" enctype="multipart/form-data">
                            @csrf
                            <div style="margin-top: 10px">
                                <label>Title :</label>
                                <input class="form-control" type="text" required name="title" class="txt-field"
                                    size="35" maxlength="130" />
                            </div>
                            <div style="margin-top: 10px">
                                <label>Specialities :</label>
                                <select class="form-control" name="speciality">
                                    <option value="0">Select Your Speciality</option>
                                    @foreach ($speciality as $sp)
                                        <option value="{{ $sp->id }}">{{ $sp->speciality }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div style="margin-top: 10px">
                                <label>Description :</label>
                                <textarea name="description" class="form-control makeMeSummernote" rows="5"></textarea>
                            </div>
                            <div style="margin-top: 10px">
                                <label>Image :</label>
                                <input style="height: unset" type="file" required name="image" class="form-control" />
                            </div>
                            <input class="btn btn-info" style="margin-top: 10px" type="submit" value="Submit">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js_code')
    <script type="text/javascript">
        $('.makeMeSummernote').summernote({
            height: 100,
        });
    </script>
@endsection
