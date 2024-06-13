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
            <h1>Edit Branch</h1>
            <div class="row">
                <div class="col-md-12">
                    <div class="white-box">
                        <form class="form-horizontal" method="post" action="{{ url("/admin/update_branch/$ebranch->id") }}">
                        {{-- <form class="form-horizontal" method="post" action="{{ route('branch.update/'$ebranch->id) }}"> --}}
                            @csrf
                            <div style="margin-top: 10px">
                                <label>Branch Name :</label>
                                <input class="form-control" type="text" value="{{ $ebranch->branch_name }}" name="branch_name" class="txt-field"
                                    size="35" maxlength="130" />
                            </div>
                            <input class="btn btn-info" style="margin-top: 10px" type="submit" value="Update Branch">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
