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
            <h1>Assign Roles to {{ $user->name }}</h1>
            <form action="{{ url('/admin/doassign_roles') }}" method="post">
                @csrf
                <input type="hidden" name="user_id" value="{{ $user->id }}" id="">
                <div class="row">
                    @foreach ($roles as $role)
                        <div class="col-md-4">
                            <label>{{ $role->roles }}</label>
                            <input type="radio" name="roles" value="{{ $role->id }}" id="">
                        </div>
                    @endforeach
                </div>
                <input type="submit" class="btn btn-info" value="Submit">
            </form>
        </div>
    </div>
@endsection
