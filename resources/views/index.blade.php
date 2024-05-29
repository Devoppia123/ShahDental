@extends('design.template')
@section('customCSS')
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script> --}}
    <style>
        /* Custom CSS for links */
        .custom-link {
            color: #0056b3;
            /* Blue color */
            text-decoration: none !important;
            /* Remove default underline */
        }

        .custom-link:hover {
            color: #0a488a;
            /* Darker blue on hover */
            text-decoration: underline;
            /* Underline on hover */
        }
    </style>
@endsection


@section('header-main')
    @include('design.header-main')
@endsection

@section('content')

@section('appointment-main')
    @include('design.appointment-main')
@endsection

@section('branches-main')
    @include('design.branches-main')
@endsection

@section('team-main')
    @include('design.team-main', ['doctors' => $doctors])
@endsection

@section('services-main')
    @include('design.services-main', ['specialities' => $specialities])
@endsection

{{-- @section('patient-main')
    @include('design.patient-main')
@endsection --}}

@section('record-main')
    @include('design.record-main')
@endsection

@section('customer-main')
    @include('design.customer-main')
@endsection


@section('article-main')
    @include('design.article-main', ['articles' => $articles])
@endsection
@endsection


@section('footer-main')
@include('design.footer-main')
@endsection

@section('script')
@endsection
