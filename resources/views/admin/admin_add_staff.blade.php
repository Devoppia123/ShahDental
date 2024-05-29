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
            <h1>Add Staff</h1>
            <div class="row">
                <div class="col-md-12">
                    <div class="white-box">
                        <form class="form-horizontal" method="post" action="{{ url('/admin/doadd_staff') }}">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div>
                                        <label>Name :</label>
                                        <input class="form-control" type="text" required name="name" class="txt-field"
                                            size="35" maxlength="130" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div>
                                        <label>Email :</label>
                                        <input class="form-control" type="email" required name="email" class="txt-field"
                                            size="35" maxlength="130" />
                                    </div>
                                </div>
                            </div>
                            <div style="margin-top:10px">
                                <label>Roles :</label>
                                <div class="specialities-css">
                                    <select class="custom-select" name="role_type">
                                        <option value="0">Select Roles</option>
                                        @foreach ($roles as $role)
                                            @if ($role->roles !== 'Administrator' && $role->roles !== 'Doctor')
                                                <option value="{{ $role->id }}">{{ $role->roles }}</option>
                                            @endif
                                        @endforeach

                                    </select>
                                </div>
                            </div>

                            <div style="margin-top:10px">
                                <label>Password :</label>
                                <input type="password" class="form-control" name="password" id="">
                            </div>

                            <input class="btn btn-info" style="margin-top: 10px" type="submit" value="Submit">

                        </form>
                    </div>
                </div>
            </div>
        </div>
        <style>
            label {
                margin-bottom: 4px;
            }
        </style>
    </div>
@endsection
