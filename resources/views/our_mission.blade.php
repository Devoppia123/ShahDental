@extends('design.template')

@section('header-main')
    {{-- @include('design.header-main') --}}
    @include('inc.inner-header-header')

@endsection

@section('content')
    <div class="page-heading"><h1>Our Mission</h1></div>
    <div id="our-mission" class="our-mission bg-main">
        <div class="container">
        <div class="reh-cus-box our-mission-cont">
                <p>Our mission for humanity is to gladly impart a family-oriented concern for all of our patients without
                    reservations through a holistic dental care and approach with exceptional dental break through and
                    innovations that exude precision to attain our far reaching goals.
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