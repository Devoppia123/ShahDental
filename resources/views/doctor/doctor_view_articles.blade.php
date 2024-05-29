@extends('layouts.doctor_template')

@section('navbar')
    @include('doctor.include.nav_bar_new')
@endsection

@section('sidebar')
    @include('doctor.include.sidebar_new')
@endsection

@section('content')
    <div class="container-fluid">
        <div class="staff-list-main-sec">
            @if ($success = Session::get('success'))
                <div id="alert" class="alert alert-success">{{ $success }}</div>
            @endif
            @php
                $id = Session('user')['id'];
            @endphp
            <div class="card">
                <div class="card-header">
                    Articles
                    <a href="{{ url("/admin/add_articles/$id") }}" class="btn btn-success btn-sm float-right">Add
                        Article</a>
                </div>
                <div class="card-body">
                    <div class="row">
                        @foreach ($article as $item)
                            <div class="col-md-3">
                                <div class="card" style="width: 250px; margin-bottom: 20px;">
                                    <img class="card-img-top" height="165" src="{{ asset("articles/$item->image") }}"
                                        alt="Card image cap">
                                    <div class="card-body">
                                        <h5 class="card-title" data-toggle="tooltip" data-placement="left"
                                            title="{{ $item->title }}">{{ Str::limit($item->title, 20) }}</h5>
                                        <p class="card-text">{!! Str::limit($item->description, 100) !!}</p>
                                        <ul style="padding:0px;">
                                            <li style="list-style: none; color: black">Author : <span
                                                    style="color: #858796">{{ $item->name }}</span></li>
                                        </ul>
                                        <a href="{{ url("/doctor/view_full_article/$item->id") }}"
                                            class="btn btn-primary btn-sm">Read More</a>
                                        <a href="{{ url('doctor/edit_article/' . $item->id . '') }}"
                                            class="btn btn-primary btn-sm">Edit</a>
                                        <a href="{{ url("/doctor/delete_article/$item->id") }}"
                                            class="btn btn-danger btn-sm">Delete</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
