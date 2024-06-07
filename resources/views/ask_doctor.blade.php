@extends('design.template')
@section('title', 'Shah Dental |Ask Doctor')
@section('header-main')
    {{-- @include('design.header-main') --}}
    @include('inc.inner-header-header')

@endsection
@section('customCSS')

    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"> --}}
    {{-- <link rel="stylesheet" href="{{ asset('css/Our-Speciality.css') }}"> --}}
    {{-- <link rel="stylesheet" href="{{ url('public/css/Our-Speciality.css') }}"> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" />

    <style>
        /* Header Max Width */
        .main-section .container {
            max-width: 1600px;
            margin: 0 auto;
        }

        .nav-link {
            display: block;
            /* padding: .5rem 1rem; */
            color: #0d6efd;
            text-decoration: none;
            transition: color .15s ease-in-out, background-color .15s ease-in-out, border-color .15s ease-in-out;
        }

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


@section('content')
<div class="ask_doctor">
    <div class="container" style="padding-top: 50px">
        <h2 class="text-center">Ask Doctor</h2>
        {{-- <form class="ask-doc-form" method="POST" action="{{ url('/submit_question') }}"> --}}
        <form id="ask-doc-form" class="ask-doc-form" method="POST" action="{{ url('/submit_question') }}">
            @csrf
            @method('POST')
            <input type="hidden" name="doctor_id" value="{{ $doctor->id }}">
            <div class="row gy-3">
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="form-group">
                        <label>Full Name :</label>
                        <input type="text" name="full_name" class="form-control" placeholder="Enter full name">
                        <span class="text-danger error-text full_name_error"></span>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="form-group">
                        <label>Phone :</label>
                        <input type="text" name="phone" class="form-control" placeholder="Enter Phone">
                        <span class="text-danger error-text phone_error"></span>
                    </div>
                </div>
            </div>
            <div class="row gy-3">
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="form-group">
                        <label>Email :</label>
                        <input type="text" name="email" class="form-control" placeholder="Enter Email">
                        <span class="text-danger error-text email_error"></span>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="form-group">
                        <fieldset>
                            <label>Subject :</label> <br>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="subject" id="subjectFeedback"
                                    value="feedback">
                                <label class="form-check-label" for="subjectFeedback">Feedback</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="subject" id="subjectInquiry"
                                    value="inquiry">
                                <label class="form-check-label" for="subjectInquiry">Inquiry</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="subject" id="subjectGeneral"
                                    value="general">
                                <label class="form-check-label" for="subjectGeneral">General</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="subject" id="subjectComplaint"
                                    value="complaint">
                                <label class="form-check-label" for="subjectComplaint">Complaint</label>
                            </div>
                        </fieldset>
                        <span class="text-danger error-text subject_error"></span>
                    </div>
                </div>
            </div>
            <div class="row gy-3">
                <div class="col-lg-12">
                    <div class="form-group">
                        <label>Message :</label>
                        <textarea style="width: 98%;" name="message" placeholder="Ask your question" class="form-control" rows="4"></textarea>
                        <span class="text-danger error-text message_error"></span>
                    </div>
                </div>
            </div>
            <div class="my-3">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>

        </form>
    </div>
</div>    
@endsection

@section('footer-main')
    @include('design.footer-main')
@endsection

@section('script')
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script> --}}

    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>/ --}}
    <script>
        $(document).ready(function() {
            $('#ask-doc-form').on('submit', function(e) {
                e.preventDefault();

                var form = $(this);
                var actionUrl = form.attr('action');
                var formData = form.serialize();

                $.ajax({
                    url: actionUrl,
                    method: 'POST',
                    data: formData,
                    dataType: 'json',
                    success: function(response) {
                        if (response.success) {
                            alert(response.success);
                            form.trigger("reset");
                            window.location.href = "/Shah_Dental";
                        }
                    },
                    error: function(response) {
                        if (response.status === 422) {
                            var errors = response.responseJSON.errors;
                            $('.error-text').html('');
                            $.each(errors, function(key, value) {
                                $('.' + key + '_error').html(value[0]);
                            });
                        }
                    }
                });
            });
        });
    </script>
@endsection
