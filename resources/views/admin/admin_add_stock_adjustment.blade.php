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
                        <form class="form-horizontal" method="post" action="{{ url('/admin/add_stock_adjustment_post') }}"
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
                                    <label>Batch :</label>
                                    <select class="mt-3 form-control select_batch" name="batch[]" id="batch_1">
                                        <option>select option</option>

                                    </select>
                                </div>


                                <div class="col-md-2">
                                    <label>Cost Price :</label>
                                    <input class="mt-3 form-control" type="text" name="cost_price" id="cost_price_1"
                                        class="txt-field" size="35" maxlength="130" />
                                </div>



                                <div class="col-md-2">
                                    <label>Adjustment:</label>
                                    <input class="mt-3 form-control" type="text" name="adjustment" class="txt-field"
                                        size="35" maxlength="130" />
                                </div>


                                <div class="col-md-2">
                                    <label>Reason For Adjustment:</label>
                                    <input class="mt-3 form-control" type="text" name="adjustment_reason"
                                        class="txt-field" size="35" maxlength="130" />
                                </div>


                                <div class="col-md-1"
                                    style="display: flex;
                                flex-direction: column;
                                justify-content: end;">

                                    {{-- <button onclick="remove_row(1)" type="button" class="btn btn-danger">Deleted</button> --}}
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
    <div class="row mt-4 counter_${counter}">
      <div class="col-md-3">
        <input type="hidden" value="${counter}" name="row_check[]" />
       
        <select class="form-control mt-3 " onchange="select_Option(${counter})" name="item[]" id="item_${counter}" onchange="selectOption(${counter})">
          <option>select option</option>
          @foreach ($invertoryitems as $list)
            <option value="{{ $list->id }}">{{ $list->name }}</option>
          @endforeach
        </select>
      </div>
      <div class="col-md-2">
        <select class="mt-3 form-control select_batch" name="batch[]" id="batch_${counter}">
          <option>select option</option>
          <option value="1">Batch 1</option>
          <option value="2">Batch 2</option>
        </select>
      </div>
      <div class="col-md-2">
        <input class="mt-3 form-control" type="text"  name="cost_price" id="cost_price_${counter}" class="txt-field" size="35" maxlength="130" />
      </div>
      <div class="col-md-2">
        <input class="mt-3 form-control" type="text"  name="adjustment" class="txt-field" size="35" maxlength="130" />
      </div>
      <div class="col-md-2">
        <input class="mt-3 form-control" type="text"  name="adjustment_reason" class="txt-field" size="35" maxlength="130" />
      </div>
      <div class="col-md-1" style="display: flex; flex-direction: column; justify-content: end;">
        <button onclick="remove_row(${counter})" type="button" class="btn btn-danger">Deleted</button>
      </div>
    </div>`;

            $(".display_row").append(htmlCode);
            counter++;
        }

        function remove_row(id) {

            $('.counter_' + id).remove();

        }


        function select_Option(id) {

            let get_val = $('#item_' + id).val();
            $.ajax({
                type: "get",
                url: "/admin/search-item-stock_adjustment",
                data: {
                    get_val: get_val,
                },
                dataType: 'json',
                success: function(response) {

                    var cost = JSON.stringify(response.cost).replace(/"/g, '');

                    var batch = JSON.stringify(response.batch).replace(/"/g, "");

                    var table_id = JSON.stringify(response.id).replace(/"/g, "");


                    var batchOption = `<option value="${table_id}">${batch}</option>`;
                    // var costOption=`<option value="${table_id}">${cost}</option>`;


                    $("#batch_" + id).html(batchOption);
                    $("#cost_price_" + id).val(cost);

                }
            });

        }

        function Validator() {
            if ($("#item_1").val()=="select option") {
                alert("Please Select Item name");
                return false;
            }

            return true;



        }
    </script>
@endsection
