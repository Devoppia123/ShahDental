@extends('layouts.patient_new_template')

@section('sidebar')
    @include('patient.include.sidebar_new')
@endsection

@section('navbar')
    @include('patient.include.nav_bar_new')
@endsection

@section('content')
    <link type="text/css" href="{{ asset('css/jquery-ui-1.7.3.custom.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/book-appointment.css') }}">

    <div class="main-cont-wrapper">
        <div class="container-fluid">
            <h3>Ask Question To Dr {{ $doctor->name }}</h3>
            <div style="padding-top: 20px">
                <form class="ask-doc-form" method="post" action="{{ url('/submit_question') }}">
                    @csrf
                    <input type="hidden" name="doctor_id" value="{{ $doctor->id }}">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Name :</label>
                                <input type="text" name="name" class="form-control" placeholder="Enter Name">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Phone :</label>
                                <input type="text" name="phone" class="form-control" placeholder="Enter Phone">
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="form-group">
                        <label>Email :</label>
                        <input style="width:98%" type="text" name="email" class="form-control"
                            placeholder="Enter Email">
                    </div>
                    <br>
                    <div class="form-group">
                        <h5>Subject :</h5>
                        <input type="radio" name="subject" value="feedback">
                        <label>Feedback</label>&nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="radio" name="subject" value="inquiry">
                        <label>Inquiry</label>&nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="radio" name="subject" value="general">
                        <label>General</label>&nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="radio" name="subject" value="complaint">
                        <label>Complaint</label>&nbsp;&nbsp;&nbsp;&nbsp;
                    </div>
                    <br>
                    <div class="form-group">
                        <label>Message :</label>
                        <textarea style="width: 98%;" name="message" placeholder="Ask your question" class="form-control" rows="4"></textarea>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    @endsection
