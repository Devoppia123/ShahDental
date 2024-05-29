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
                <a class="btn btn-success" href="{{ url('/admin/add-treatment') }}">Add Treatment</a>
            </div>
            <div class="mt-3">

                <table class="table" id="app_table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Treatments Name</th>
                            <th>Tooth Number</th>
                            <th>Rate</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        @php
                            $ids = 1;
                        @endphp
                        @foreach ($Treatment as $list)
                            <tr>
                                <td>
                                    {{ $ids++ }}
                                </td>
                                <td>
                                    {{ $list->treatments_name }}
                                </td>
                                <td>
                                    {{ $list->tooth_number }}
                                </td>
                                <td>
                                    {{ $list->rate }}
                                </td>
                                <td>
                                    <a class="btn btn-success"
                                        href="{{ url('/admin/edit-treatment') }}/{{ $list->id }}">Edit</a>

                                    <a class="btn btn-danger"
                                        href="{{ url('/admin/deleted-procedure') }}/{{ $list->id }}">Deleted</a>
                                </td>
                            </tr>
                        @endforeach


                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
