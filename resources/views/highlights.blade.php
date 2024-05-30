@extends('design.template')
@section('title', 'Shah Dental | Highlights')
@section('customCSS')
    <style>
        h1 {
            font-family: 'bill corporate narrow W00medium';
        }
    </style>
@endsection

@section('header-main')
    {{-- @include('design.header-main') --}}
    @include('inc.inner-header-header')

@endsection

@section('content')
    <div class="highlights bg-main">
        <div class="page-heading"><h1>Highlights of Clinics</h1></div>
        <div class="container">

            <div class="highlights-cont reh-cus-box reh-text-left">

                <ul>
                    <li>Timings – 10:00 A.M to 10:00 P.M</li>
                    <li>Days: Monday to Saturday.</li>
                    <li>Treatment strictly by appointment </li>
                    <li>Less waiting period </li>
                    <li>Total dentistry under one roof</li>
                    <li>Quality treatment by experienced hand</li>
                    <li>State of art equipments&amp; infrastructure</li>
                    <li>High standard of hygiene &amp; sterilization</li>
                    <li>Comfortable environment</li>
                    <li>Post operative care &amp; instructions</li>
                    <li>Quick lab service</li>
                    <li>Pleasant &amp; hospitable staff</li>

                </ul>

            </div>
        </div>
    </div>
@endsection

@section('footer-main')
    @include('design.footer-main')
@endsection

@section('script')

@endsection