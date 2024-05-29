@extends('layouts.patient_new_template')

@section('sidebar')
    @include('patient.include.sidebar_new')
@endsection

@section('navbar')
    @include('patient.include.nav_bar_new')
@endsection

@section('content')
    <div class="main-cont-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="white-box">
                        <form class="form-horizontal" method="post" action="{{ url('/doedit_profile') }}"
                            enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="patient_id" value="{{ $user->id }}" id="">
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Name :</label>
                                    <input class="form-control" type="text" required name="name"
                                        value="{{ $user->name }}" disabled class="txt-field" size="35"
                                        maxlength="130" />
                                </div>

                                <div class="col-md-6">
                                    <label>Phone :</label>
                                    <input type="text" name="phone" required
                                        class="form-control @error('phone') is-invalid @enderror" size="20"
                                        maxlength="20" />
                                    @error('phone')
                                        <span style="color: red;">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row" style="margin-top: 10px;">
                                <div class="col-md-6">
                                    <label>Age :</label>
                                    <input class="form-control txt-field @error('age') is-invalid @enderror" type="text"
                                        required name="age" size="35" maxlength="130" />
                                    @error('age')
                                        <span style="color: red;">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <label>Gender :</label>
                                    <select class="custom-select form-control @error('gender') is-invalid @enderror"
                                        name="gender">
                                        <option value="">Select Your Gender</option>
                                        <option value="0">Female</option>
                                        <option value="1">Male</option>
                                    </select>
                                    @error('gender')
                                        <span style="color: red;">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row" style="margin-top: 10px;">
                                <div class="col-md-6">
                                    <label>City :</label>
                                    <input class="form-control txt-field @error('city') is-invalid @enderror" type="text"
                                        required name="city" size="35" maxlength="130" />
                                    @error('city')
                                        <span style="color: red;">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <label>State :</label>
                                    <input class="form-control txt-field @error('state') is-invalid @enderror"
                                        type="text" required name="state" size="35" maxlength="130" />
                                    @error('state')
                                        <span style="color: red;">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row" style="margin-top: 10px;">
                                <div class="col-md-6">
                                    <label>Date of Birth :</label>
                                    <input class="form-control txt-field @error('dob') is-invalid @enderror" type="date"
                                        required name="dob" size="35" maxlength="130" />
                                    @error('dob')
                                        <span style="color: red;">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <label>Country:</label>
                                    <input class="form-control txt-field @error('country') is-invalid @enderror"
                                        type="text" required name="country" size="35" maxlength="130" />
                                    @error('country')
                                        <span style="color: red;">{{ $message }}</span>
                                    @enderror
                                </div>

                            </div>

                            <div style="margin-top: 10px;">
                                <label>Address:</label>
                                <textarea name="address" class="form-control txt-field @error('address') is-invalid @enderror" rows="4"></textarea>
                                @error('address')
                                    <span style="color: red;">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="" style="margin-top: 10px">
                                <label> Profile Picture :</label>
                                <input type="file" name="profile_image"
                                    class="form-control @error('profile_image') is-invalid @enderror">
                                @error('profile_image')
                                    <span style="color: red;">{{ $message }}</span>
                                @enderror
                            </div>

                            <input class="btn btn-info" style="margin-top: 10px" type="submit" value="Submit">

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
