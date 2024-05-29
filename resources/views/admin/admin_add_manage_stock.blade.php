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
            <div class="mb-4">
                <a href="/admin/add-manage-stock" class="btn btn-primary">Add New Stock</a>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="white-box">
                        <form class="form-horizontal" method="post" action="{{ url('/admin/add_stock_adjustment_post') }}"
                            enctype="multipart/form-data" onsubmit="return Validator()">
                            @csrf
                            <div class="row">
                                <div class="col-md-5">
                                    <label>Date:</label>
                                    <input class="mt-3 form-control" type="date" name="date" />
                                </div>

                                <div class="col-md-5">
                                    <label>Supplier:</label>
                                    <input class="mt-3 form-control" type="" name="supplier"
                                        onkeyup="supplier_search()" />
                                </div>

                            </div>

                            <div class="row mt-3">
                                <div class="col-md-5">

                                    <label for="">Department</label>
                                    <select class="form-control select_batch" name="" id="">
                                        <option>select option</option>
                                        @foreach ($radiologys as $list)
                                            <option value="{{$list->id}}">{{$list->name}}</option>
                                        @endforeach


                                    </select>
                                </div>


                            </div>

                            <input class="btn mt-5 btn-info" style="margin-top: 5px" type="submit" value="Submit">

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js_code')
    <script>
        function supplier_search() {
            alert('supplier')
        }
    </script>
@endsection
