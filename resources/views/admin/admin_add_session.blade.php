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
            <h1>Add Branch</h1>
            <div class="row">
                <div class="col-md-12">
                    <div class="white-box">
                        <form class="form-horizontal" method="post" action="{{ url('/admin/doadd_session') }}">
                            @csrf
                            <div style="margin-top: 10px">
                                <label>Session :</label>
                                <input class="form-control" type="text" required name="session_name" class="txt-field"
                                    size="35" maxlength="130" />

                            </div>
                            <div class="row">
                                <div class="col-md-6" style="margin-top: 10px">
                                    <label>Session Start Time :</label>
                                    <input type="time" class="form-control" name="start_time" id="">
                                </div>

                                <div class="col-md-6" style="margin-top: 10px">
                                    <label>Session End Time :</label>
                                    <input type="time" class="form-control" name="end_time" id="">
                                </div>
                            </div>

                            <input class="btn btn-info" style="margin-top: 10px" type="submit" value="Add">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
