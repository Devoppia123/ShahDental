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
            <p>{{ $social->twitter }}</p>
            <p>{{ $social->facebook }}</p>
            <p>{{ $social->whatsapp }}</p>
            <p>{{ $social->linkedin }}</p>
        </div>
    </div>
@endsection
