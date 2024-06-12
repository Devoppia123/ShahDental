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
            @if ($card->front_image != null)
                <div class="row" style="margin-top:30px;">
                    <div class="col-md-6">
                        {{-- <img style="width:100%;" src="{{ asset("visiting_card/$card->front_image") }}" alt=""> --}}
                        <img style="width:100%;" src="{{ url("public/visiting_card/$card->front_image") }}" alt="">
                    </div>
                    <div class="col-md-6">
                        {{-- <img style="width:100%;" src="{{ asset("visiting_card/$card->back_image") }}" alt=""> --}}
                        <img style="width:100%;" src="{{ url("public/visiting_card/$card->back_image") }}" alt="">
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection
