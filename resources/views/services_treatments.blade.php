@extends('design.template')
@section('title', 'Shah Dental | Service Treamtment')
@section('header-main')
    {{-- @include('design.header-main') --}}
    @include('inc.inner-header-header')

@endsection

@section('content')
    <div class="container">
        <div class="page-heading"> <h1>Services Treatments</h1></div>
        <div class="what-we-do-cont reh-cus-box reh-text-left">


            <h4>Services Offered</h4>

            <ul>
                <li>Root Canal Treatment</li>
                <li>Fluoride Treatment</li>
                <li>Space Maintainer</li>
                <li>Fissure Sealants on newly-erupted teeth</li>
                <li>Restoration and buildups</li>
                <li>Crown, Veneers &amp; Bridge Prosthesis</li>
                <li>Complete Partial Denture</li>
                <li>Dental Implants</li>
                <li>Braces</li>
                <li>Invisible braces</li>
                <li>Invisalign</li>
                <li>Tooth Whitening</li>

            </ul>

        </div>
    </div>
@endsection

@section('footer-main')
    @include('design.footer-main')
@endsection
