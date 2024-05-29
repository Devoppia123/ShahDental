@extends('layouts.admin_template')
@section('sidebar')
    @include('admin.include.sidebar')
@endsection
@section('navbar')
    @include('admin.include.navbar')
@endsection



<style>
    .filter_box {
        display: flex;
        flex-direction: column;
        align-items: end;
        justify-content: end;
    }

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


            <div class="mt-4">
                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab"
                            aria-controls="pills-home" aria-selected="true">Pending</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab"
                            aria-controls="pills-profile" aria-selected="false">Stock Issued</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab"
                            aria-controls="pills-contact" aria-selected="false">Return Requests</a>
                    </li>
                </ul>

                <div class="tab-content" id="pills-tabContent">

                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                        <div class="mt-5 mb-5">
                            <a class="btn btn-success" href="{{ url('/admin/add-asset-request') }}">Add Asset Request</a>


                        </div>
                        <form action="{{ url('/admin/asset-request-list-search') }}" method="get">
                            <div class="row mt-5 mb-5">


                                <div class="col-md-3">
                                    <input class="mt-3 form-control" type="type" name="item" id="item"
                                        placeholder="Search Item" />
                                </div>
                                <div class="col-md-3">
                                    <input class="mt-3 form-control" type="date" name="date" id="date" />
                                </div>
                                <div class="col-md-3">
                                    <select class="form-control mt-3 validate_item" name="request_for">
                                        <option>Select requests  for</option>
                                        @foreach ($asset_requests as $item)
                                            <option id="{{ $item->requestfor }}">{{ $item->requestfor }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-1 filter_box">
                                    <input type="submit" class="btn btn-primary" value="filter" name="filter_data">
                                </div>

                            </div>
                        </form>
                        <div class="mt-4">
                            <table class="table mt-5" id="doctor_view_table">
                                <thead>
                                    <tr>
                                        <th>S.no </th>
                                        <th>ITEM NAME </th>
                                        <th>QUANTITY </th>

                                        <th>CURRENT STOCK</th>
                                        <th> REQUEST FOR</th>
                                        <th> LOCATION </th>
                                        <th> DEPARTMENT </th>
                                    </tr>
                                </thead>
                                <tbody class="">
                                    @php
                                        $ids = 1;
                                    @endphp
                                    @foreach ($asset_requests as $list)
                                        <tr>
                                            <td>
                                                {{ $ids++ }}
                                            </td>
                                            <td>
                                                {{ $list->name }}
                                            </td>
                                            <td>
                                                {{ $list->quantity }}
                                            </td>
                                            <td>

                                                @php
                                                    
                                                    echo $list->current_stock == '' ? 'No' : $list->current_stock;
                                                    
                                                @endphp

                                            </td>
                                            <td>
                                                {{ $list->requestfor }}
                                            </td>
                                            <td>
                                                {{ $list->requestfor }}
                                            </td>
                                            <td>
                                                {{ $list->location }}
                                            </td>

                                        </tr>
                                    @endforeach



                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">

                        <div class="mt-4">
                            <table class="table mt-5" id="doctor_view_table">
                                <thead>
                                    <tr>
                                        <th>S.no </th>
                                        <th>ITEM NAME </th>
                                        <th>QUANTITY </th>

                                        <th>CURRENT STOCK</th>
                                        <th> REQUEST FOR</th>
                                        <th> LOCATION </th>
                                        <th> DEPARTMENT </th>
                                    </tr>
                                </thead>
                                <tbody class="">
                                    @php
                                        $ids = 1;
                                    @endphp
                                    @foreach ($asset_requests as $list)
                                        <tr>
                                            <td>
                                                {{ $ids++ }}
                                            </td>
                                            <td>
                                                {{ $list->name }}
                                            </td>
                                            <td>
                                                {{ $list->quantity }}
                                            </td>
                                            <td>

                                                @php
                                                    
                                                    echo $list->current_stock == '' ? 'No' : $list->current_stock;
                                                    
                                                @endphp

                                            </td>
                                            <td>
                                                {{ $list->requestfor }}
                                            </td>
                                            <td>
                                                {{ $list->requestfor }}
                                            </td>
                                            <td>
                                                {{ $list->location }}
                                            </td>

                                        </tr>
                                    @endforeach



                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">...
                    </div>
                </div>
            </div>

        </div>
    @endsection
    @section('js_code')
        <script>
            function date_get() {
                var date = $("#date").val();

                $.ajax({
                    type: "get",
                    url: "/admin/search-item-date",
                    data: {
                        date: date,
                    },

                    success: function(response) {
                        $(".display").html(response);

                    }
                });
            }
        </script>
    @endsection
