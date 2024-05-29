@extends('layouts.admin_template')
@section('sidebar')
    @include('admin.include.sidebar')
@endsection
@section('navbar')
    @include('admin.include.navbar')
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
                        <form class="form-horizontal" method="post" action="{{ url('/admin/doadd_doctor') }}"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Name :</label>
                                    <input class="form-control" type="text" name="name" size="35"
                                        maxlength="130" />
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label>Email :</label>
                                    <input class="form-control" type="email" name="email" size="35"
                                        maxlength="130" />
                                    @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Password :</label>
                                    <input class="form-control" type="password" name="password" size="35"
                                        maxlength="130" />
                                    @error('password')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label>Gender :</label>
                                    <select class="custom-select" name="gender">
                                        <option value="">Select Your Gender</option>
                                        <option value="0">Female</option>
                                        <option value="1">Male</option>
                                    </select>
                                    @error('gender')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Specialities :</label>
                                    <div class="specialities-css row">
                                        @foreach ($specialities as $speciality)
                                            <div class="col-md-6">
                                                <label>{{ $speciality->speciality }}</label>
                                                <input type="checkbox" name="speciality_id[]" value="{{ $speciality->id }}">
                                            </div>
                                        @endforeach
                                    </div>
                                    @error('speciality_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label>Languages :</label>
                                    <div class="specialities-css row">
                                        @foreach ($languages as $lang)
                                            <div class="col-md-6">
                                                <label>{{ $lang->language }}</label>
                                                <input type="checkbox" name="language_id[]" value="{{ $lang->id }}">
                                            </div>
                                        @endforeach
                                    </div>
                                    @error('language_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Phone 1:</label>
                                    <input type="text" name="phone1" class="form-control" size="20"
                                        maxlength="20" />
                                    @error('phone1')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    Ext: <input type="text" name="ext1" style="width:70px;" class="form-control"
                                        size="5" maxlength="5" />
                                    @error('ext1')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label>Phone 2:</label>
                                    <input type="text" name="phone2" class="form-control" size="20"
                                        maxlength="20" />
                                    @error('phone2')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    Ext: <input type="text" name="ext2" style="width:70px;" class="form-control"
                                        size="5" maxlength="5" />
                                    @error('ext2')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div>
                                <label>Education :</label>
                                <input type="text" name="education" class="form-control" size="35"
                                    maxlength="130" />
                                @error('education')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div>
                                <label>Address:</label>
                                <textarea name="address" class="form-control d-block"></textarea>
                                @error('address')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div>
                                <label>Biographical Sketch:</label>
                                <textarea name="bio" class=" form-control d-block" rows="4" cols="30"></textarea>
                                @error('bio')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div>
                                <label>Education & Fellowship:</label>
                                <textarea name="edu" class=" form-control d-block" rows="4" cols="30"></textarea>
                                @error('edu')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div>
                                <label>Speciality Interests:</label>
                                <textarea name="sp" class=" form-control d-block" rows="4" cols="30"></textarea>
                                @error('sp')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div>
                                <label>Research & Publications:</label>
                                <textarea name="rp" class=" form-control d-block" rows="4" cols="30"></textarea>
                                @error('rp')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div>
                                <label>Professional Memberships:</label>
                                <textarea name="pm" class=" form-control d-block" rows="4" cols="30"></textarea>
                            </div>
                            @if ($errors->has('pm'))
                                <span class="text-danger">{{ $errors->first('pm') }}</span>
                            @endif
                            <div class="form-group">
                                <label>Profile Picture</label>
                                <input type="file" name="profile_image" class="form-control d-block">
                                @error('profile_image')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <input class="btn btn-info" style="margin-top: 5px" type="submit" value="Submit">
                        </form>
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
