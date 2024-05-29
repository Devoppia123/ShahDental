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
                        <form class="form-horizontal" method="post" action="{{ url('/admin/add-item-post') }}"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row">

                                <div class="col-md-6">
                                    <label>Item Name :</label>
                                    <input class="form-control" type="text" required name="name" class="txt-field"
                                        size="35" maxlength="130" />
                                </div>


                                <div class="col-md-6">
                                    <label>Barcode :</label>
                                    <input class="form-control" type="text" required name="barcode" class="txt-field"
                                        size="35" maxlength="130" />
                                </div>
                            </div>


                            <div class="row mt-4">

                                <div class="col-md-6">
                                    <label>Manufacturers Name :</label>
                                    <select class="form-control" id="manufacturers">

                                        @foreach ($invertory_manufacturers as $get_med)
                                        <option selected> Select Manufacturers
                                        </option>
                                            <option value="{{ $get_med->id }}">{{ $get_med->name }}
                                            </option>
                                        @endforeach

                                    </select>
                                </div>



                                <div class="col-md-6">
                                    <label>Suppliers :</label>
                                    <select class="form-control" id="manufacturers">

                                        @foreach ($invertory_suppliers as $get_med)
                                        <option selected> Select Suppliers
                                        </option>
                                            <option value="{{ $get_med->id }}">{{ $get_med->name }}
                                            </option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>

                            <div class="row mt-4">

                                <div class="col-md-6">
                                    <label>Unit(e.g strips, boxes)</label>
                                    <input class="form-control" type="text" required name="unit_strips" class="txt-field"
                                        size="35" maxlength="130" />
                                </div>



                                <div class="col-md-6">
                                    <label>Conversion Unit :</label>
                                    <input class="form-control" type="text" required name="conversion_unit"
                                        class="txt-field" size="35" maxlength="130" />
                                </div>
                            </div>
                            <div class="row mt-4">

                                <div class="col-md-6">
                                    <label>Re-ordering level</label>
                                    <input class="form-control" type="text" required name="unit_strips" class="txt-field"
                                        size="35" maxlength="130" />
                                </div>


                                <div class="col-md-6">
                                    <label>Category :</label>
                                    <select class="form-control" id="manufacturers">

                                        @foreach ($category as $get_med)
                                        <option selected> Select Category
                                        </option>
                                            <option value="{{ $get_med->id }}">{{ $get_med->name }}
                                            </option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>
                            <div class="row mt-4">

                                <div class="col-md-6">
                                    <label>Retail Price :</label>
                                    <input class="form-control" type="text" required name="retail_price" class="txt-field"
                                        size="35" maxlength="130" />
                                </div>


                                <div class="col-md-6">
                                    <label>Opening Stock :</label>
                                    <input class="form-control" type="text" required name="opening_stock    " class="txt-field"
                                        size="35" maxlength="130" />
                                </div>
                            </div>
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
