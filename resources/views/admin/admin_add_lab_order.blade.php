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
                        <form class="form-horizontal" method="post" action="{{ url('/admin/add-lab-order-post') }}"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Lab Order Name :</label>
                                    <input class="form-control" type="text" required name="name" class="txt-field"
                                        size="35" maxlength="130" />
                                </div>
                           
                            </div>

                            {{-- <div class="row mt-3">
                                <div class="col-md-6">
                                    <label>DATE :</label>
                                    <input class="form-control" type="date" required name="date" class="txt-field"
                                        size="35" maxlength="130" />
                                </div>
                                <div class="col-md-6">
                                    <label>RATE :</label>
                                    <input class="form-control" type="text" required name="rate" class="txt-field" />
                                </div>
                            </div> --}}
                            

                            <input class="btn mt-3 btn-info" style="margin-top: 5px" type="submit" value="Submit">

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js_code')
@endsection
