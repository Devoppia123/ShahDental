@extends('layouts.admin_template')
@section('sidebar')
    @include('admin.include.sidebar')
@endsection
@section('navbar')
    @include('admin.include.navbar')
@endsection
@section('content')
<style>
    /* doc social links */

.so-icon {
  width: 50px !important;
}

.small-box {
  text-align: center;
  padding: 30px 0px;
}
.small-box h4{
  margin-top:38px;
  color: #fff;
}
</style>
    <div class="row doc-view-social-links">
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
                <div class="inner">
                    {{-- <p>{{ $social->twitter }}</p> --}}
                    <a href="{{ $social->twitter }}"><img class="so-icon" src="{{ url('public/img/twitter.png') }}" alt=""></a>
                    <h4>Dr.Rida Sabir</h4>
                </div>
            </div>
    <div class="main-cont-wrapper">
        <div class="container-fluid">
            {{-- <p>{{ $social->twitter }}</p> --}}
            <a href="{{ $social->twitter }}"><img style="width: 100px" src="{{ url('public/img/twitter.png') }}" alt=""></a>
            {{-- <p>{{ $social->facebook }}</p> --}}
            <a href="{{ $social->facebook }}"><img style="width: 100px" src="{{ url('public/img/facebook.png') }}" alt=""></a>
            {{-- <p>{{ $social->whatsapp }}</p> --}}
            <a href="{{ $social->whatsapp }}"><img style="width: 100px" src="{{ url('public/img/whatsapp.png') }}" alt=""></a>
            {{-- <p>{{ $social->linkedin }}</p> --}}
            <a href="{{ $social->linkedin }}"><img style="width: 100px" src="{{ url('public/img/linkedin.png') }}" alt=""></a>
    </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
                <div class="inner">
                    {{-- <p>{{ $social->twitter }}</p> --}}
                    <a href="{{ $social->facebook }}"><img class="so-icon" src="{{ url('public/img/facebook.png') }}" alt=""></a>
                    <h4>Dr.Rida Sabir</h4>
                </div>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
                <div class="inner">
                    {{-- <p>{{ $social->twitter }}</p> --}}
                    <a href="{{ $social->whatsapp }}"><img class="so-icon" src="{{ url('public/img/whatsapp.png') }}" alt=""></a>
                    <h4>Dr.Rida Sabir</h4>
                </div>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
                <div class="inner">
                    {{-- <p>{{ $social->twitter }}</p> --}}
                    <a href="{{ $social->linkedin }}"><img class="so-icon" src="{{ url('public/img/linkedin.png') }}" alt=""></a>
                    <h4>Dr.Rida Sabir</h4>
                </div>
            </div>
        </div>
        <!-- ./col -->
    </div>    
@endsection
