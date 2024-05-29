@extends('layouts.doctor_template')

@section('navbar')
    @include('doctor.include.nav_bar_new')
@endsection

@section('sidebar')
    @include('doctor.include.sidebar_new')
@endsection

@section('content')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>

    <style>
        .specialities-css {
            height: 100px;
            overflow: auto;
            background-color: #ffffff;
            border: 1px solid #d0d0d0;
            border-radius: 6px;
            padding: 10px;
            margin: 10px 0px;
        }
    </style>
    <div class="main-cont-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="white-box">
                        @foreach ($doctors as $doctor)
                            <form class="form-horizontal" method="post"
                                action="{{ url("/doctor/doedit_profile/$doctor->doctorID") }}" enctype="multipart/form-data">
                                @csrf
                                @foreach ($doctor->user_role as $user)
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>Name :</label>
                                            <input class="form-control" type="text" required value="{{ $user->name }}"
                                                name="name" class="txt-field" size="35" maxlength="130" />
                                        </div>

                                        <div class="col-md-6">
                                            <label>Email :</label>
                                            <input class="form-control" type="email" required value="{{ $user->email }}"
                                                name="email" class="txt-field" size="35" maxlength="130" />
                                        </div>
                                    </div>
                                @endforeach
                                <div>
                                    <label>Gender :</label>
                                    <select class="custom-select form-control" name="gender">
                                        @if ($doctor->gender == 1)
                                            <option value="1">Male</option>
                                        @else
                                            <option value="0">Female</option>
                                        @endif
                                        <option value="0">Female</option>
                                        <option value="1">Male</option>
                                    </select>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Specialities :</label>
                                        <div class="specialities-css row">
                                            @foreach ($specialities as $sp)
                                                <label>{{ $sp->speciality }}</label>
                                                <input type="checkbox" name="speciality_id[]" value="{{ $sp->id }}"
                                                    {{ $doctor->doctor_specaility->contains('speciality_id', $sp->id) ? 'checked' : '' }}>
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label>Languages :</label>
                                        <div class="specialities-css row">
                                            @foreach ($doctor->doctor_language->unique('language_id') as $chec_lang)
                                                @foreach ($languages as $lang)
                                                    @if ($chec_lang->language_id == $lang->id)
                                                        <div class="col-md-6">
                                                            <label>{{ $lang->language }}</label>
                                                            <input type="checkbox" name="language_id[]"
                                                                value="{{ $lang->id }}" checked>
                                                        </div>
                                                    @endif
                                                @endforeach
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Phone 1:</label>
                                        <input type="text" name="phone1" value="{{ $doctor->phone1 }}" required
                                            class="form-control" size="20" maxlength="20" /> Ext : <input
                                            type="text" value="{{ $doctor->ext1 }}" name="ext1" style="width:70px;"
                                            class="form-control" size="5" maxlength="5" />
                                    </div>

                                    <div class="col-md-6">
                                        <label>Phone 2:</label>
                                        <input type="text" name="phone2" value="{{ $doctor->phone2 }}"
                                            class="form-control" size="20" maxlength="20" />
                                        Ext : <input type="text" name="ext2" value="{{ $doctor->ext2 }}"
                                            style="width:70px;" class="form-control" size="5" maxlength="5" />
                                    </div>
                                </div>
                                <div>
                                    <label>Education :</label>
                                    <input type="text" name="education" class="form-control"
                                        value="{{ $doctor->education }}" class="txt-field" size="35"
                                        maxlength="130" />
                                </div>
                                <div>
                                    <label>Address:</label>
                                    <textarea name="address" class="makeMeSummernote form-control" class="txt-field" rows="4">{{ $doctor->address }}</textarea>
                                </div>

                                <div>
                                    <label>Biographical Sketch:</label>
                                    <textarea name="bio" class="makeMeSummernote form-control" rows="4" cols="30">{{ $doctor->biographical_sketch }}</textarea>
                                </div>

                                <div>
                                    <label>Education &amp; Fellowship:</label>
                                    <textarea name="edu" class="makeMeSummernote form-control" rows="4" cols="30">{{ $doctor->education_fellowship }}</textarea>
                                </div>

                                <div>
                                    <label>Speciality Interests:</label>
                                    <textarea name="sp" class="makeMeSummernote form-control" rows="4" cols="30">{{ $doctor->speciality_interests }}</textarea>
                                </div>

                                <div>
                                    <label>Research &amp; Publications:</label>
                                    <textarea name="rp" class="makeMeSummernote form-control" rows="4" cols="30">{{ $doctor->research_publications }}</textarea>
                                </div>

                                <div>
                                    <label>Professional Memberships:</label>
                                    <textarea name="pm" class="makeMeSummernote form-control" rows="4" cols="30">{{ $doctor->professional_memberships }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label> Profile Picture</label>
                                    <input type="file" name="profile_image" class="form-control">
                                </div>

                                <input class="btn btn-info" style="margin-top: 5px" type="submit" value="Submit">

                            </form>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $('.makeMeSummernote').summernote({
            height: 100,
        });
    </script>
@endsection

