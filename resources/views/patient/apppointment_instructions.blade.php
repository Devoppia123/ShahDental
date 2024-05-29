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
            <div class="row">
                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                    <div class="Cardiology">
                        <h2 style="font-weight: 700;">Instructions</h2>
                    </div>
                    <div>
                        <p>
                            Write down your symptoms: Before your appointment, make a list of any symptoms
                            you're experiencing, how long you've had them, and anything that seems to trigger or
                            alleviate them.
                        </p>
                        <p>
                            List your medications: Make a list of all the medications you're currently taking,
                            including over-the-counter drugs, vitamins, and supplements. Also, include the
                            dosage and frequency of each medication.
                        </p>

                        <p>
                            Bring your medical records: If you're seeing a new doctor, bring copies of any
                            relevant medical records, including past test results, x-rays, and treatment plans.
                        </p>

                        <p>
                            Bring your medical records: If you're seeing a new doctor, bring copies of any
                            relevant medical records, including past test results, x-rays, and treatment plans.
                        </p>

                        <p>
                            Prepare questions: Write down any questions you have for your doctor, so you don't
                            forget to ask them during your appointment. This could be anything from how to
                            manage a chronic condition to clarifying information about a new medication.
                        </p>

                        <p>
                            Arrive early: Give yourself plenty of time to get to your appointment, so you don't
                            feel rushed or stressed. If you're a new patient, arrive early to fill out any
                            necessary paperwork.
                        </p>

                        <p>
                            Wear comfortable clothing: Wear loose, comfortable clothing that's easy to remove,
                            in case your doctor needs to examine you.
                        </p>

                        <p>
                            Be honest: Be honest and open with your doctor about your symptoms, lifestyle, and
                            medical history. This will help them make an accurate diagnosis and develop an
                            effective treatment plan.
                        </p>
                        @foreach ($show_details_slots as $list)
                            @if ($list->session == null)
                                <div class="Cardiology">
                                    <h2 style="font-weight: 700;">Doctor {{ $list->doctor_name }}</h2>
                                </div>
                                <div>
                                    <p>Patient Name : {{ $list->patient_name }}</p>
                                    <p>Date : {{ $list->schedule_date }}</p>
                                    <p>Slot Timing : {{ $list->start_time }} to {{ $list->end_time }}</p>
                                    <p>{{ $list->mode }}</p>
                                </div>
                                <a href="{{ url("/appointment-mail/$list->booking_id") }}" class="btn btn-primary"
                                    id="inst-btn">Confirm Appointment</a>
                            @endif
                        @endforeach

                        @foreach ($show_details as $show)
                            @if ($show->slot_id == null)
                                <div class="Cardiology">
                                    <h2 style="font-weight: 700;">Doctor {{ $show->doctor_name }}</h2>
                                </div>
                                <p>Patient Name : {{ $show->patient_name }}</p>
                                <p>Session : {{ $show->session_name }} ({{ $show->start_time }} - {{ $show->end_time }})
                                </p>
                                <p>Appointment Date : {{ $show->appointment_date }}</p>
                                <a href="{{ url("/appointment-mail/$show->booking_id") }}" class="btn btn-primary"
                                    id="inst-btn">Confirm Appointment</a>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    @endsection
