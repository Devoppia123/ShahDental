@extends('design.template')
@section('title', 'Shah Dental | Article Details')
@section('customCSS')
    <link rel="stylesheet" href="{{ url('public/css/Our-Speciality.css') }}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"> --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        .form-control {
            width: 95%;
        }

        .ask-doc-form label {
            margin-bottom: 5px;
            font-weight: 500;
        }

        .header_content h2 {
            font-size: 28px;
            margin-top: 5px;
            margin-bottom: 0px;
            color: #fff;
            font-weight: 600;
        }
    </style>
@endsection
@section('header-main')
    {{-- @include('design.header-main') --}}
    @include('inc.inner-header-header')

@endsection

@section('content')
    <div class="container" style="padding-top: 50px">
        <div class="article-detail-content">
            {{-- <img style="width:100%;" src="{{ asset("articles/$article->image") }}" alt=""> --}}
            {{-- @dd($article); --}}
            {{-- <img style="width:100%;" src="{{ url("public/articles/$article->image") }}" alt=""> --}}
            <img class="arti-detail-img" src="{{ url("public/articles/$article->image") }}" alt="">
            {{-- <img class="arti-detail-img" src="{{ url("public/articles/$article->image") }}"> --}}
            <h1 class="text-center mt-5">{{ $article->title }}</h1>
            <h5>{{ $article->speciality }}</h5>
            <p>{!! $article->description !!}</p>
        </div>
    </div>
@endsection


@section('footer-main')
    @include('design.footer-main')
@endsection
@section('script')
    
@endsection

