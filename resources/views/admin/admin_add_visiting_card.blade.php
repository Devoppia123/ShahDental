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
            <div style="margin: 20px;">
                <form method="post" action="{{ url('/admin/doadd_visiting_card') }}" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="doctor_id" value="{{ $doctor_id }}">
                    <div class="form-group">
                        <label> Select Visiting Card Front Picture</label>
                        <input type="file" name="front_image" class="form-control">
                    </div>
                    <div class="form-group">
                        <label> Select Visiting Card Back Picture</label>
                        <input type="file" name="back_image" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-primary">Add Card</button>
                </form>
            </div>
        </div>
    </div>
@endsection
