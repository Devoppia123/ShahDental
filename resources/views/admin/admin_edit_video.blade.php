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
            <h1>Update Video</h1>
            <div class="row">
                <div class="col-md-12">
                    <div class="white-box">
                        <form class="form-horizontal" method="post" action="{{ url('/admin/update_video') }}"
                            enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="video_id" value="{{ $edit_video->video_id }}">
                            <div>
                                <label>Title :</label>
                                <input class="form-control" type="text" name="title" value="{{ $edit_video->title }}"
                                    class="txt-field" />
                            </div>
                            <div>
                                <label>Link :</label>
                                <input class="form-control" type="text" name="link" value="{{ $edit_video->link }}"
                                    class="txt-field" />
                            </div>
                            <div>
                                <label>Specialities :</label>
                                <select class="custom-select" name="speciality">
                                    @foreach ($specialities as $sp)
                                        <option value="{{ $sp->id }}"
                                            @if ($edit_video->speciality_id == $sp->id) selected @endif>{{ $sp->speciality }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div>
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
                            <div>
                                <label>Description :</label>
                                <textarea name="description" class="form-control makeMeSummernote" rows="5">{{ $edit_video->description }}</textarea>
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
    <script type="text/javascript">
        $('.makeMeSummernote').summernote({
            height: 100,
        });
    </script>
@endsection
