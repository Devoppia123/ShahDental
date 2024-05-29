@extends('layouts.admin_template')
@section('sidebar')
    @include('admin.include.sidebar')
@endsection
@section('navbar')
    @include('admin.include.navbar')
@endsection



<style>
    .child_inform {
        border-radius: 5px;
        background: #fffefe;
        box-shadow: 0px 0px 3px 0px;
    }

    .patient-profile-dropdown {
        transform: translate3d(276px, 51px, 0px) !important;
    }

    .patient-profile-dropdown a {
        display: inherit;
        color: black;
        padding: 5px 16px;
    }

    .child_inform .tab {
        padding: 14px 33px;
        border-bottom: 1px solid;
    }
</style>
@section('content')
    <div class="main-cont-wrapper">
        <div class="container-fluid">
            <div class="mt-5 mb-5">
                <a class="btn btn-success" href="{{ url('/admin/add-sub-lab-order') }}">Add Sub Lab Order</a>
            </div>
            <div class="mt-3">


                <table class="table" id="app_table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Lab order </th>
                            <th style="
                            text-align: center;">Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        @php
                            $ids = 1;
                        @endphp


                        @foreach ($laborders as $list)
                            <tr>
                                <td>
                                    {{ $ids++ }}
                                </td>
                                <td>
                                    {{ $list->name }}
                                </td>

                                <td style="
                                text-align: center;">
                                    <a class="btn btn-success"
                                        href="{{ url('/admin/edit-lab-order') }}/{{ $list->id }}">Edit</a>

                                    <a class="btn btn-danger"
                                        href="{{ url('/admin/deleted-lab-order') }}/{{ $list->id }}">Deleted</a>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
