@extends('layouts.staff_template')

@section('sidebar')
    @include('nurse.include.manage_doctor_sidebar')
@endsection

@section('navbar')
    @include('nurse.include.nav_bar_new')
@endsection

@section('content')
    <div class="main-cont-wrapper">
        <div class="container-fluid">
            <h1>Reply Question</h1>
            <form method="post" action="{{ url("/nurse/doreply_question/$question->id") }}">
                @csrf
                <div class="form-group">
                    <label></label>
                    <h5>Question By : {{ $question->name }}</h5>
                    <h4> Question : <span style="font-weight: 400; font-size:15px;">{{ $question->message }}</span>
                    </h4>
                    <h4>To Doctor : {{ $question->doctor_name }}</h4>
                </div>
                {{-- <input type="" value="{{ $question->doctor_id }}"> --}}
                <div class="form-group">
                    <label>Reply : </label>
                    <textarea name="reply"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection
