@extends('layouts.doctor_template')

@section('navbar')
    @include('doctor.include.nav_bar_new')
@endsection

@section('sidebar')
    @include('doctor.include.sidebar_new')
@endsection

@section('content')
    <div class="container-fluid">
        <div class="staff-list-main-sec">
            <div>
                <img style="height: 300px;" src="{{ asset("articles/$article->image") }}" alt="">
            </div>
            <div>
                <h2>Title : {{ $article->title }}</h2>
                <h3>Article By : Dr {{ $article->doctor_name }}</h3>
                <p>{{ $article->speciality }}</p>
                <p>{{ $article->category_name }}</p>
                <p>{!! $article->description !!}</p>
            </div>
        </div>
    </div>
@endsection
