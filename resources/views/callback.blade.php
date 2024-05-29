@extends('design.template')
@section('title', 'Shah Dental | Call Back')
@section('customCSS')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
    <link rel="stylesheet" href="{{ asset('css/Our-Speciality.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('') }}"> --}}
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

        .main-section .container {
            max-width: 1600px !important;
            margin: 0 auto;
        }
    </style>

@endsection
@section('header-main')
    {{-- @include('design.header-main') --}}
    @include('inc.inner-header-header')

@endsection


@section('content')
    <div class="page-heading">
        <h1>Call Back</h1>
    </div>
    <div class="container" style="padding-top: 50px">
        <form action="{{ url('docontactus') }}" method="post" id="callback-form">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <label for="name">Name:</label>
                    <input type="text" name="name" id="name" placeholder="Enter your name" class="form-control">
                    <p class="invalid-feedback" id="error-name"></p>
                </div>
                <div class="col-md-6">
                    <label for="phone">Phone:</label>
                    <input type="text" name="phone" id="phone" class="form-control"
                        placeholder="Enter your number">
                    <p class="invalid-feedback" id="error-phone"></p>
                </div>
            </div>
            <div class="row" style="padding-top: 20px">
                <div class="col-md-6">
                    <label for="email">Email:</label>
                    <input type="text" name="email" id="email" class="form-control" placeholder="Enter your email">
                    <p class="invalid-feedback" id="error-email"></p>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        {{-- <h5>Subject :</h5>
                        <input type="radio" name="subject" value="feedback" class="form-check-input" id="subject-feedback">
                        <label for="subject-feedback">Feedback</label>&nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="radio" name="subject" value="inquiry" class="form-check-input" id="subject-inquiry">
                        <label for="subject-inquiry">Inquiry</label>&nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="radio" name="subject" value="general" class="form-check-input" id="subject-general">
                        <label for="subject-general">General</label>&nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="radio" name="subject" value="complaint" class="form-check-input" id="subject-complaint">
                        <label for="subject-complaint">Complaint</label>&nbsp;&nbsp;&nbsp;&nbsp; --}}
                        <label for="subject">Subject</label>
                        <input type="text" class="form-control" placeholder="Enter your subject" id="subject"
                            name="subject">
                        <p class="invalid-feedback" id="error-subject"></p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-8">
                    <label for="message">Message:</label>
                    <textarea name="message" id="message" cols="30" rows="10" class="form-control"></textarea>
                    <p class="invalid-feedback" id="error-message"></p>
                </div>
            </div>
            <br><br>
            <div class="row">
                <div class="col-6">
                    <button class="btn btn-primary" type="submit">Submit</button>
                </div>
            </div>
        </form>
    </div>
@endsection

@section('footer-main')
    @include('design.footer-main')
@endsection
@section('script')

    <script>
        $(document).ready(function() {
            $("#callback-form").submit(function(event) {
                event.preventDefault();
                var element = $(this);

                $("button[type=submit]").prop('disabled', true);

                $.ajax({
                    url: '{{ url('/post_callback') }}',
                    type: 'post',
                    data: element.serialize(),
                    dataType: 'json',
                    success: function(response) {
                        $("button[type=submit]").prop('disabled', false);

                        // Clear previous errors
                        $(".invalid-feedback").html("");
                        $(".form-control").removeClass("is-invalid");

                        if (response["status"] == true) {
                            // window.location.href = "{{ url('callback') }}";
                            alert('Form Submitted Successfully!');
                            window.location.href = "{{ url('/') }}";
                        } else if (response.success) {
                            alert('Form Submitted Successfully!');
                            window.location.href = "{{ url('/') }}";
                        } else {
                            var errors = response['errors'];
                            if (errors['name']) {
                                $("#name").addClass('is-invalid');
                                $("#error-name").html(errors['name'][0]);
                            }
                            if (errors['phone']) {
                                $("#phone").addClass('is-invalid');
                                $("#error-phone").html(errors['phone'][0]);
                            }
                            if (errors['email']) {
                                $("#email").addClass('is-invalid');
                                $("#error-email").html(errors['email'][0]);
                            }
                            if (errors['subject']) {
                                $("input[name='subject']").addClass('is-invalid');
                                $("#error-subject").html(errors['subject'][0]);
                            }
                            if (errors['message']) {
                                $("#message").addClass('is-invalid');
                                $("#error-message").html(errors['message'][0]);
                            }
                        }
                    },
                    error: function(jqXHR, exception) {
                        console.log("Something Went Wrong");
                        $("button[type=submit]").prop('disabled', false);
                    }
                });
            });
        });
    </script>
@endsection
