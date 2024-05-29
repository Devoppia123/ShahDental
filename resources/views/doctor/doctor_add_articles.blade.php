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
            <h1>Add Articles</h1>
            <div class="row">
                <div class="col-md-12">
                    <div class="white-box">
                        <form class="form-horizontal" method="post" action="{{ url('/doctor/doadd_articles') }}"
                            enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="article_by" value="{{ $doctor_id }}">
                            <div class="add-vid-services-div">
                                <label>Title :</label>
                                <input class="form-control" type="text" required name="title" class="txt-field"
                                    size="35" maxlength="130" />
                            </div>

                            <div class="add-vid-services-div" style="margin-top: 10px">
                                <label>Specialities :</label>
                                <select class="custom-select form-control" name="speciality">
                                    <option value="">Select Your Speciality</option>
                                    @foreach ($speciality as $sp)
                                        <option value="{{ $sp->id }}">{{ $sp->speciality }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="add-vid-services-div" style="margin-top: 10px">
                                <label>Category :</label>
                                <select class="custom-select form-control" name="category_id">
                                    <option value="0">Select Your Category</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="add-vid-services-div" style="margin-top: 10px">
                                <label>Description :</label>
                                <textarea name="description" class="form-control" rows="5" cols="30"></textarea>
                            </div>
                            <div class="add-vid-services-div" style="margin-top: 10px">
                                <label>Image :</label>
                                <input style="height: unset" type="file" required name="image"
                                    class="txt-field form-control" />
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
    <script src="{{ asset('js/tinymce/tinymce.min.js') }}" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: 'textarea#editor', // Replace this CSS selector to match the placeholder element for TinyMCE
            plugins: 'code table lists',
            toolbar: 'undo redo | formatselect| bold italic | alignleft aligncenter alignright | indent outdent | bullist numlist | code | table'
        });
    </script>
@endsection
