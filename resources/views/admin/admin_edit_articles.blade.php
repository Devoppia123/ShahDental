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

    <style>
        label {
            display: inline-block;
            margin-bottom: 3px;
        }
    </style>
    <div class="main-cont-wrapper">
        <div class="container-fluid">
            <h1>Edit Article</h1>
            <div class="row">
                <div class="col-md-12">
                    <div class="white-box">
                        <form method="post" action="{{ url('/admin/update_article/') }}" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="article_id" value="{{ $edit_article->article_id }}">
                            <div style="margin-top: 10px">
                                <label>Title :</label>
                                <input class="form-control" type="text" name="title" class="txt-field" size="35"
                                    maxlength="130" value="{{ $edit_article->title }}" />
                            </div>

                            <div style="margin-top: 10px">
                                <label>Specialities :</label>
                                <select class="form-control" name="speciality">
                                    @foreach ($specialities as $sp)
                                        <option value="{{ $sp->id }}"
                                            @if ($edit_article->speciality_id == $sp->id) selected @endif>{{ $sp->speciality }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div style="margin-top: 10px">
                                <label>Description :</label>
                                <textarea name="description" class="form-control makeMeSummernote" rows="5">{{ $edit_article->description }}</textarea>
                            </div>
                            <div style="margin-top: 10px">
                                <label>Image :</label>
                                <input style="height: unset" type="file" name="image" class="form-control" />
                            </div>
                            <input class="btn btn-info" style="margin-top: 10px" type="submit" value="Update">
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
