@extends('layouts.patient_new_template')

@section('sidebar')
    @include('patient.include.sidebar_new')
@endsection

@section('navbar')
    @include('patient.include.nav_bar_new')
@endsection

@section('content')
    <link rel="stylesheet" href="{{ asset('patient/css/discussion.css') }}">
    <div class="main-cont-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-11 col-md-10 col-sm-10 col-9">

                    <div class="compose_message_main msg-borard" style="margin-top: 550px;">

                        <div class="row">

                            <div class="col-lg-12">

                                <div class="compose_message_inr_cont ">

                                    <h2
                                        style="color: #28435b;font-size: 24px;font-family: 'CircularStd-Medium';text-align:center">
                                        Chat With Dr. {{ $doctor_name }}</h2>

                                    <section class="msger" style="margin: 0px 10px;">

                                        <div id="chat_box">
                                            <main class="msger-chat">

                                            </main>
                                        </div>
                                        <form id="chat_form">
                                            <div class="msger-inputarea">
                                                <input type="hidden" name="chat_id" id="chat_id"
                                                    value="{{ $chat_id }}">
                                                <pre id="alert" style="display: none;">Insert Your Qurey</pre>
                                                <input type="text" class="msger-input" name="msg" id="msg"
                                                    placeholder="Enter your message...">&nbsp;
                                                <button type="button" id="submit" class="msger-send-btn">Send</button>
                                            </div>
                                        </form>
                                    </section>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js_code')
    <script>
        $(document).ready(function() {
            setInterval(function() {
                $('.msger-chat').load("{{ url('msg_loader') }}/" + {{ $chat_id }}).fadeIn('slow');
            }, 1000);

            $.ajaxSetup({

                headers: {

                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

                }

            });


            $("#submit").click(function(e) {
                e.preventDefault();

                if ($("#msg").val() == "" || $("#msg").val() == null) {

                    alert('Please enter your query. ');

                    $("#msg").addClass('error');

                    $("#error").addClass('alert alert-danger');

                    $("#error").text('Please put your query...');

                    $("#msg").focus();

                }

                var chat_id = $("#chat_id").val();

                var msg = $("#msg").val();

                $.ajax({

                    type: 'get',

                    url: "{{ url('send_message') }}",

                    data: {
                        chat_id: chat_id,
                        msg: msg,
                    },

                    success: function(response) {
                        $('#msg').val('');
                        console.log(response);
                    },

                    error: function(response) {
                        $('#msg').text(response.responseJSON);
                    }

                });

            });

        });
    </script>
@endsection
