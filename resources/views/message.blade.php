@extends('design.template')

@section('header-main')
    {{-- @include('design.header-main') --}}
    @include('inc.inner-header-header')

@endsection

@section('content')
    <div class="message-con bg-main">
        <div class="page-heading"> <h1>Message</h1></div>
        <div class="container">

            <div class="message-cont reh-cus-box">

                <p>Greetings and welcome to Shah Dental Clinic (Prof. Syed Shah Faisal &amp; Associates). We are proud to
                    serve the people of Karachi since 1998.<br><br>


                    Shah Dental Clinic (Prof. Syed Shah Faisal &amp; Associates) has a history of responsible dental health
                    care conduct. We strongly believe that real success is not just about profits measured in number but
                    also, as importantly, about how those numbers are achieved. Our corporate strategy reflects our
                    commitments to sustainable practice and balancing responsibility alongside to the dental health
                    care.<br><br>

                    A vital aspect and our belief is DCHS (Dental Care, Health and Safety).We implement rigorous and ongoing
                    DCHS trainings and consistently take measures to evaluate DCHS procedures. No element of dental care is
                    greater than that of DCHS for our patients and their families.<br><br>

                    I would like to take this opportunity to pledge that Shah Dental Clinic (Prof. Syed Shah Faisal &amp;
                    Associates) team will endeavor to devote our full efforts to exceed our patient's expectations and full
                    satisfaction.<br><br>

                    Thank you.<br><br>

                    PROF. SYED SHAH FAISAL<br>

                    <span>CEO</span><br>

                    (Prof. Syed Shah Faisal &amp; Associates)
                </p>

            </div>
        </div>
    </div>
@endsection

@section('footer-main')
    @include('design.footer-main')
@endsection

@section('script')

@endsection