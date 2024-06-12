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
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.2/css/jquery.dataTables.min.css">
    <script src="//cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
    <div class="main-cont-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="white-box">
                        <form class="form-horizontal" method="post" action="{{ url('/admin/add-medication-post') }}"
                            enctype="multipart/form-data">
                            @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Medication Name :</label>
                                        <input class="form-control" value="{{ $medications->name }}" type="text" required
                                            name="name" class="txt-field" size="35" maxlength="130" />
                                    </div>
                                    <input type="hidden" name="id" value="{{ $medications->id }}">
                                </div>
                            <input class="btn mt-3 btn-info" name="medications" style="margin-top: 5px" type="submit"
                                value="Update">

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js_code')
@endsection
