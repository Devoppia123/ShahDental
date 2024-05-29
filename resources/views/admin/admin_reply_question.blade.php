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
            <form method="post" action="{{ url("/admin/answer_question/$question->id") }}">
                @csrf
                <div class="form-group">
                    <label></label>
                    <h5>Question By : {{ $question->doctor_name }}</h5>
                    <h4> Question : <span style="font-weight: 400; font-size:15px;">{{ $question->message }}</span></h4>
                    <h4>To Doctor : {{ $question->name }}</h4>
                </div>
                <div class="form-group">
                    <label>Reply : </label>
                    <textarea class="form-control" name="reply"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection
