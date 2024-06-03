@extends('layouts.doctor_template')

@section('navbar')
    @include('doctor.include.nav_bar_new')
@endsection

@section('sidebar')
    @include('doctor.include.sidebar_new')
@endsection

@section('content')
    <div class="main-cont-wrapper">
        <div class="container-fluid">
            @if ($card != null)
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
            @else
                <div style="margin: 20px;">
                    <form method="post" action="{{ url('/doctor/doadd_visiting_card') }}" enctype="multipart/form-data">
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
            @endif

        </div>
    </div>
@endsection
