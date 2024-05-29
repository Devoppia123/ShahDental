@extends('layouts.doctor_template')

@section('navbar')
    @include('doctor.include.nav_bar_new')
@endsection

@section('sidebar')
    @include('doctor.include.sidebar_new')
@endsection

@section('content')
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
                        <form class="form-horizontal" method="post" action="{{ url('/doctor/update_article') }}"
                            enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="article_id" value="{{ $edit_article->article_id }}">
                            <input type="hidden" name="article_by" value="{{ $edit_article->article_by }}">
                            <div style="margin-top: 10px">
                                <label>Title :</label>
                                <input class="form-control" type="text" name="title" class="txt-field" size="35"
                                    maxlength="130" value="{{ $edit_article->title }}" />
                            </div>

                            <div style="margin-top: 10px">
                                <label>Specialities :</label>
                                <select class="custom-select" name="speciality">
                                    @foreach ($specialities as $sp)
                                        <option value="{{ $edit_article->speciality_id }}">{{ $sp->speciality }}
                                        </option>
                                        <option value="{{ $sp->id }}">{{ $sp->speciality }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div style="margin-top: 10px">
                                <label>Category :</label>
                                <select class="custom-select" name="category_id">
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}"
                                            {{ $edit_article->category_id == $category->id ? 'selected' : '' }}>
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div style="margin-top: 10px">
                                <label>Description :</label>
                                <textarea name="description" class="form-control" rows="5">{{ $edit_article->description }}</textarea>
                            </div>
                            <div style="margin-top: 10px">
                                <label>Image :</label>
                                <input style="height: unset" type="file" name="image" class="txt-field form-control" />
                            </div>
                            <button class="btn btn-info" style="margin-top: 10px" type="submit">Update</button>
                        </form>
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
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/tinymce/tinymce.min.js') }}" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: 'textarea#editor', // Replace this CSS selector to match the placeholder element for TinyMCE
            plugins: 'code table lists',
            toolbar: 'undo redo | formatselect| bold italic | alignleft aligncenter alignright | indent outdent | bullist numlist | code | table'
        });
    </script>

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
