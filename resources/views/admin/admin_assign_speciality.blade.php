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
            <form action="{{ url('/admin/doassign_speciality') }}" method="post">
                @csrf
                <div>
                    <div class="row">
                        <input type="hidden" value="{{ $doctor_id }}" name="doctor_id">
                        @foreach ($specialities as $speciality)
                            <div class="col-md-6">
                                <label>{{ $speciality->speciality }}</label>
                                <input type="checkbox" name="speciality[]" value="{{ $speciality->id }}" id=""
                                    @if ($check->contains('speciality_id', $speciality->id)) checked @endif>
                            </div>
                        @endforeach
                    </div>
                    <input type="submit" class="btn btn-primary" value="Submit">
                </div>
            </form>
        </div>
    </div>
@endsection
