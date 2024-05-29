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
            <h1>Add Rights</h1>
            <div class="row">
                <div class="col-md-12">
                    <div class="white-box">
                        <form class="form-horizontal" method="post" action="{{ url('/admin/doadd_rights') }}">
                            @csrf
                            <div>
                                <label>Rights :</label>
                                <input class="form-control" required name="rights" placeholder="Rights">
                            </div>

                            <div>
                                <select class="form-control mt-3" name="role_id" id="">
                                    <option value="">Select Role</option>
                                    @foreach ($roles as $list)
                                        <option value="{{ $list->id }}">{{ $list->roles }}</option>
                                    @endforeach
                                    <option value="all">In all roles</option>
                                </select>
                            </div>

                            <input class="btn btn-info mt-3" type="submit" value="Submit">

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
