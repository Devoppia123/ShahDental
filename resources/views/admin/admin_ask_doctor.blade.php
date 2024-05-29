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
            <form method="post" action="{{ url('/admin/submit_question') }}">
                @csrf
                <input type="hidden" name="doctor_id" value="{{ $doctor_id }}">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control" placeholder="Enter Name">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Phone</label>
                            <input type="text" name="phone" class="form-control" placeholder="Enter Phone">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="text" name="email" class="form-control" placeholder="Enter Email">
                </div>
                <div class="form-group">
                    <h5>Subject</h5>
                    <input type="radio" name="subject" value="feedback">
                    <label>Feedback</label>&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="radio" name="subject" value="inquiry">
                    <label>Inquiry</label>&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="radio" name="subject" value="general">
                    <label>General</label>&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="radio" name="subject" value="complaint">
                    <label>Complaint</label>&nbsp;&nbsp;&nbsp;&nbsp;
                </div>
                <div class="form-group">
                    <label>Message</label>
                    <textarea name="message" placeholder="Ask your question" class="form-control" rows="4"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection
