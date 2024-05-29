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
            <h1>Add Service</h1>
            <div class="row">
                <div class="col-md-12">
                    <div class="white-box">
                        <form class="form-horizontal" method="post" action="{{ url('/admin/doadd_service') }}"
                            enctype="multipart/form-data">
                            @csrf
                            <div>
                                <label>Service :</label>
                                <input class="form-control" type="name" required name="name" class="txt-field"
                                    size="35" maxlength="130" />
                            </div>

                            <div>
                                <label>Description :</label>
                                <textarea name="desc" class="form-control makeMeSummernote" rows="5" cols="30"></textarea>
                            </div>

                            <div>
                                <label>Image :</label>
                                <input style="height: unset" type="file" required name="service_image"
                                    class="form-control" />
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
    <script type="text/javascript">
        $('.makeMeSummernote').summernote({
            height: 100,
        });
    </script>
@endsection
