@extends('layouts.admin_template')
@section('sidebar')
    @include('admin.include.sidebar')
@endsection
@section('navbar')
    @include('admin.include.navbar')
@endsection
@section('content')
    <div class="main-cont-wrapper">
        <div class="container-fluid">
            <h1>Add Languages</h1>
            <div class="row">
                <div class="col-md-12">
                    <div class="white-box">
                        <form class="form-horizontal" method="post" action="{{ url('/admin/do_add_language') }}">
                            @csrf
                            <div>
                                <label>Language :</label>
                                <input class="form-control" required name="language" class="txt-field" size="35"
                                    maxlength="130" />
                            </div>

                            <input class="btn btn-info" style="margin-top: 5px" type="submit" value="Submit">

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
