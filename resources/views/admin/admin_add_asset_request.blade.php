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
                        <form class="form-horizontal" method="post" action="{{ url('/admin/add_asset_request_post') }}"
                            enctype="multipart/form-data" onsubmit="return Validator()">
                            @csrf
                            <div class="row">
                                <input type="hidden" name="row_check[]" value="1" id="row_check" />
                                <div class="col-md-3">
                                    <label>Items Name :</label>

                                    <select class="form-control mt-3 validate_item" onchange="select_Option(1)"
                                        name="item[]" id="item_1" onchange="selectOption(1)">
                                        <option>select option</option>
                                        @foreach ($invertoryitems as $list)
                                            <option value="{{ $list->id }}">
                                                {{ $list->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <label>QUANTITY :</label>
                                    <input class="mt-3 form-control" type="text" name="quantity[]" id="quantity_1" value="0" />
                                </div>
                                <div class="col-md-2">
                                    <label>CURRENT STOCK :</label>
                                    <input class="mt-3 form-control" type="text" name="current_stock[]"
                                        id="current_stock_1" class="txt-field" size="35" maxlength="130" />
                                </div>
                                <div class="col-md-2">
                                    <label>REQUEST FOR* :</label>
                                    <select class="form-control mt-3 validate_item" name="requestfor[]" id="item_1"
                                        onchange="requestfor(1)">
                                        <option>select option</option>
                                        <option>Employees</option>
                                        <option>Department</option>
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <label>LOCATION :</label>
                                    <input class="mt-3 form-control" type="text" name="location[]" id="location_1"
                                        class="txt-field" size="35" maxlength="130" />
                                </div>


                            </div>
                            <div class="row mt-3">
                                <div class="col-md-3 mt-3">
                                    <label>DEPARTMENT :</label>

                                    <select class="form-control mt-3 validate_item" name="department[]" id="item_1"
                                        onchange="department(1)">
                                        <option>select option</option>
                                        @foreach ($radiologys as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>

                                </div>
                                <div class="col-md-2 mt-3">
                                    <label>ISSUANCE TYPE* :</label>

                                    <select class="form-control mt-3 validate_item" name="issue_type[]" id="issue_type_1"
                                        onchange="issue_type(1)">
                                        <option>select option</option>
                                        <option>Temporary</option>
                                        <option>Perment</option>

                                    </select>
                                </div>
                                <div class="col-md-2 mt-3">
                                    <label>RETURN DATE </label>
                                    <input class="mt-3 form-control" type="date" name="date[]" id="date_1"
                                        class="txt-field" size="35" maxlength="130" />
                                </div>
                                <div class="col-md-2 mt-3">
                                    <label>PURPOSE </label>
                                    <input class="mt-3 form-control" type="text" name="purpose[]" id="purpose_1"
                                        class="txt-field" size="35" maxlength="130" />
                                </div>
                            </div>

                            <div class="display_row">

                            </div>



                            <div class="mt-4">

                                <button type="button" class="btn btn-primary" onclick="add_item()"> + Add Item</button>
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
    <script>
        let counter = 2;

        function add_item() {

            var htmlCode = `
        <div class="counter_${counter}">
            <hr>
            <div class="row mt-5">
            <input type="hidden" name="row_check[]" value="1" id="row_check" />
            <div class="col-md-3">
                <label>Items Name :</label>
                <select class="form-control mt-3 validate_item" onchange="select_Option(1)" name="item[]" id="item_1" onchange="selectOption(1)">
                    <option>select option</option>
                    @foreach ($invertoryitems as $list)
                        <option value="{{ $list->id }}">{{ $list->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-2">
                <label>QUANTITY :</label>
                <input class="mt-3 form-control" type="text" name="quantity" id="quantity_1" value="0" />
            </div>
            <div class="col-md-2">
                <label>CURRENT STOCK :</label>
                <input class="mt-3 form-control" type="text" name="current_stock" id="current_stock_1" class="txt-field" size="35" maxlength="130" />
            </div>
            <div class="col-md-2">
                <label>REQUEST FOR* :</label>
                <select class="form-control mt-3 validate_item" name="requestfor[]" id="item_1" onchange="requestfor(1)">
                    <option>select option</option>
                    <option>Employees</option>
                    <option>Department</option>
                </select>
            </div>
            <div class="col-md-2">
                <label>LOCATION :</label>
                <input class="mt-3 form-control" type="text" name="location[]" id="location_1" class="txt-field" size="35" maxlength="130" />
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-3 mt-3">
                <label>DEPARTMENT :</label>
                <select class="form-control mt-3 validate_item" name="department[]" id="item_1" onchange="department(1)">
                    <option>select option</option>
                    @foreach ($radiologys as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-2 mt-3">
                <label>ISSUANCE TYPE* :</label>
                <select class="form-control mt-3 validate_item" name="issue_type[]" id="issue_type_1" onchange="issue_type(1)">
                    <option>select option</option>
                    <option>Temporary</option>
                    <option>Permanent</option>
                </select>
            </div>
            <div class="col-md-2 mt-3">
                <label>RETURN DATE:</label>
                <input class="mt-3 form-control" type="date" name="date[]" id="date_1" class="txt-field" size="35" maxlength="130" />
            </div>
            <div class="col-md-2 mt-3">
                <label>PURPOSE:</label>
                <input class="mt-3 form-control" type="text" name="purpose[]" id="purpose_1" class="txt-field" size="35" maxlength="130" />
            </div>
            <div class="col-md-1 mt-3" style="display: flex;flex-direction: column;justify-content: end;">
        
                <button class="btn btn-danger" onclick="remove_row(${counter})">Deleted</button>
            </div>
        </div>
        <hr/>
    </div>
        `;

            $(".display_row").append(htmlCode);
            counter++;
        }

        function remove_row(id) {

            $('.counter_' + id).remove();

        }


        // function select_Option(id) {

        //     let get_val = $('#item_' + id).val();
        //     $.ajax({
        //         type: "get",
        //         url: "/admin/search-item-stock_adjustment",
        //         data: {
        //             get_val: get_val,
        //         },
        //         dataType: 'json',
        //         success: function(response) {

        //             var cost = JSON.stringify(response.cost).replace(/"/g, '');

        //             var batch = JSON.stringify(response.batch).replace(/"/g, "");

        //             var table_id = JSON.stringify(response.id).replace(/"/g, "");


        //             var batchOption = `<option value="${table_id}">${batch}</option>`;
        //             // var costOption=`<option value="${table_id}">${cost}</option>`;


        //             $("#batch_" + id).html(batchOption);
        //             $("#cost_price_" + id).val(cost);

        //         }
        //     });

        // }

        // function Validator() {
        //     if ($("#item_1").val() == "select option") {
        //         alert("Please Select Item name");
        //         return false;
        //     }

        //     return true;



        // }
    </script>
@endsection
