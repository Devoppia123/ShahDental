@extends('layouts.admin_template')
@section('sidebar')
    @include('admin.include.sidebar')
@endsection
@section('navbar')
    @include('admin.include.navbar')
@endsection
@section('content')

@section('content')
    <div class="container-fluid">
        <div class="staff-list-main-sec">
            <div>
                <img style="height: 300px;" src="{{ asset("articles/$article->image") }}" alt="">
            </div>
            <div>
                <h2>Title : {{ $article->title }}</h2>
                <p>{{ $article->speciality }}</p>
                <p>{!! $article->description !!}</p>
            </div>
        </div>
    </div>
@endsection
