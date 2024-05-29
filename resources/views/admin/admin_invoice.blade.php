@extends('layouts.admin_template')
@section('sidebar')
    @include('admin.include.sidebar')
@endsection
@section('navbar')
    @include('admin.include.navbar')
@endsection
<script src="https://code.jquery.com/jquery-3.7.0.min.js"
    integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
<style>
    .display_show {
        background: whitesmoke;
        padding: 5px 10px;
        border-radius: 5px;
        box-shadow: 1px 1px 5px 0px;
        cursor: pointer;
    }



    table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    .summary_btn {
        margin: 0px 20px;
        font-size: 1.4rem;
        font-weight: 500;
    }



    /* .append_class tr td{
        width: 18%;
    } */

    td,
    th {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
    }

    tr:nth-child(even) {
        background-color: #dddddd;
    }

    .card_wrapper {
        padding: 16px 8px;
        border: 1px solid #00000033;
        box-shadow: 0px 0px 2px 0px;
        border-radius: 7px;
    }

    .all_lable label {
        font-weight: 700;
        font-family: 'Nunito';
    }
</style>
@section('content')
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.2/css/jquery.dataTables.min.css">
    <script src="//cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
    <div class="main-cont-wrapper">
        <div class="container-fluid">

            <h1>
                Create Invoice
            </h1>
            <form action="{{ route('invoice_post') }}" method="post" onsubmit="return validateForm()">
                @csrf
                <div class="card p-4 mb-5 mt-5">

                    <div class="row">
                        <div class="col-5">
                            <label for="">Patient Name :</label>
                            <input type="text" id="patient_search" name="search" class="form-control"
                                onkeyup="search_patient()" placeholder="Search By Patient Name">
                            <div class="display_data remove_list" id="patient_list">

                            </div>
                            <input type="hidden" name="patient_id" value="" id="patient_id">
                            <input type="hidden" name="patient_name" value="" id="patient_name">

                        </div>
                    </div>
                    <div class="row mt-3 counter1">
                        <div class="col-4 Procedure">
                            <label for="">Procedure Name :</label>
                            <select class="form-control select_option" name="procedure[]" id="treatment_1"
                                onchange="selectOption(1)">
                                <option>Select Option</option>
                                @foreach ($Treatment as $list)
                                    <option value="{{ $list->id }}">
                                        {{ $list->treatments_name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-5 Description">
                            <label for="">Patient Description :</label>
                            <textarea name="description[]" class="form-control" id="description_1" cols="30" placeholder="Description here"
                                rows="1"></textarea>
                            {{-- <input class="form-control" value="" type="text" name="description[]"
                                id="description_1" /> --}}
                        </div>
                        <div class="col-3 Rate">
                            <label for="">Rate :</label>
                            <input class="form-control get_rate" value="" type="number" onkeyup="rate_amount(1)"
                                name="rate[]" id="rate_1" />
                        </div>
                        <div class="col-3 Quantity">
                            <label for="">Quantity :</label>
                            <input class="form-control" value="" type="number" onkeyup="amount_quantity(1)"
                                name="quantity[]" id="quantity_1" />
                            <input type="hidden" name="patient_id" value="" id="patient_id">

                        </div>

                        <div class="col-3 Amount">
                            <label for="">Amount:</label>
                            <input class="form-control" value="" type="text" disabled name="amount[]"
                                id="amount_1" />
                        </div>
                        <div class="col-3 Discount">
                            <label for="">Discount :</label>
                            <input class="form-control" value="" type="number" onkeyup="amount_discount(1)"
                                name="discount[]" id="discount_1" />

                        </div>

                        <div class="col-1 Remove"
                            style=" display: flex; flex-direction: column;  align-items: center; justify-content: end;">
                            <button type="button" onclick="remove_item(1)" class="btn btn-danger">
                                Remove
                            </button>

                        </div>

                    </div>
                    <div class="mt-3 append_area">

                    </div>
                    <div class="mb-5 mt-3">
                        <button type="button" class="btn btn-success" onclick="add_item()">
                            Add Item
                        </button>
                    </div>

                    <div class="col-12 m-auto" style="display: flex;justify-content: end;">
                        <div class="col-8"
                            style="    display: flex;
                    justify-content: end;
                    flex-direction: column;
          
                    align-items: end;">

                            <div>
                                <h6 style="color: black;">
                                    Sub - Total :
                                    <span id="total_amount" style="color: #777e85;">0.00</span>
                                </h6>

                            </div>
                            <div>
                                <h6 style="color: black;">
                                    Grand Total :
                                    <span id="grand_total_remove" style="color: #777e85;">0.00</span>

                                </h6>

                            </div>
                            <div>
                                <button type="submit" class="btn btn-primary">
                                    SAVE & PRINT PAYMENT REC
                                </button>
                            </div>

                        </div>
                    </div>
                </div>

            </form>

        </div>
    </div>

    <script>
        let counter = 2;

        function add_item() {
            var htmlCode = '<div class="mb-3 row counter' + counter + '">' +
                '<div class="col-4 Procedure">' +
                '<label for="">Procedure Name :</label>' +
                '<select class="form-control" name="procedure[]" id="treatment_' + counter + '" onchange=selectOption(' +
                counter + ')>' +
                '<option>Select Option</option>' +
                '@foreach ($Treatment as $list)' +
                '<option value="{{ $list->id }}">{{ $list->treatments_name }}</option>' +
                '@endforeach' +
                '</select>' +
                '</div>' +
                '<div class="col-5 Description">' +
                '<label for="description_' + counter + '">Patient Description :</label>' +
                '<textarea name="description[]" class="form-control" id="description_' + counter +
                '" cols="30" rows="1" placeholder="Description here" ></textarea>' +
                '</div>' +
                '<div class="col-3 Rate">' +
                '<label for="">Rate :</label>' +
                '<input class="form-control" value="" type="number" onkeyup="rate_amount(' + counter +
                ')" name="rate[]" id="rate_' + counter + '" />' +
                '</div>' +
                '<div class="col-3 Quantity">' +
                '<label for="">Quantity :</label>' +
                '<input class="form-control" value="" type="number" name="quantity[]" onkeyup="amount_quantity(' + counter +
                ')" id="quantity_' + counter + '" />' +
                '</div>' +
                '<div class="col-3 Amount">' +
                '<label for="">Amount:</label>' +
                '<input class="form-control" value="" type="number" name="amount[]" disabled id="amount_' + counter +
                '" />' +
                '</div>' +
                '<div class="col-3 Discount">' +
                '<label for="">Discount :</label>' +
                '<input class="form-control" value="" onkeyup="amount_discount(' + counter +
                ')" type="text" name="discount[]" id="discount_' + counter + '" />' +
                '</div>' +
                '<div class="col-1 Remove" style="display: flex; flex-direction: column; align-items: center; justify-content: end;">' +
                '<button class="btn btn-danger" type="button" onclick="remove_item(' + counter + ')">Remove</button>' +
                '</div>' +
                '</div>';



            $(".append_area").append(htmlCode);
            counter++;
        }

        function remove_item(id) {
            var update_treatment = $("#treatment_" + id).val();
            $(".counter" + id).remove();


            $.ajax({
                url: "{{ url('/admin/treatment-record-delelted') }}",
                type: 'get',
                data: {
                    update_treatment: update_treatment,
                    remove: true,
                    remove_id: id,
                },
                dataType: 'json',
                success: function(data) {


                    if (data.deleted) {
                        var total_amount = JSON.stringify(data.total_amount).replace(/"/g, '');
                        $("#total_amount").css('visibility', 'hidden');
                        $("#total_amount_remove").css('visibility', 'visible');
                        $('#total_amount_remove').html(total_amount);


                        $("#grand_total").css('visibility', 'hidden');
                        $("#grand_total_remove").css('visibility', 'visible');
                        $('#grand_total_remove').html(total_amount);
                        // $('#input_remove').val(total_amount);
                    } else {
                        var total_amount = JSON.stringify(data.total_amount).replace(/"/g, '');

                        $("#total_amount").css('visibility', 'visible');
                        $("#total_amount_remove").css('visibility', 'hidden');
                        $('#total_amount_remove').html(total_amount);

                        $("#grand_total").css('visibility', 'visible');
                        $("#grand_total_remove").css('visibility', 'hidden');
                        $('#grand_total_remove').html(total_amount);


                    }



                    // $("#grand_total").css('visibility', 'visible');
                    // $("#grand_total_remove").css('visibility', 'hidden');
                    // $('#grand_total_remove').html(total_amount);

                },
            });
        }



        // Get the Procedure details
        function selectOption(id) {
            var treatment_id = $("#treatment_" + id).val();
            $.ajax({
                url: "{{ url('admin/treatment-record') }}",
                type: 'get',
                data: {
                    treatment_id: treatment_id,
                    id: id,
                },
                dataType: 'json',
                success: function(data) {

                    var rate = JSON.stringify(data.rate).replace(/"/g, '');
                    var description = JSON.stringify(data.treatment_name).replace(/"/g, '');
                    var total_amount = JSON.stringify(data.total_amount).replace(/"/g, '');
                    var amount = JSON.stringify(data.rate).replace(/"/g, '');

                    $('#rate_' + id).val(rate);
                    $("#quantity_" + id).val('1');
                    $('#amount_' + id).val(amount);
                    $('#description_' + id).val(description);


                    $.ajax({
                        url: "{{ url('/admin/total_amount') }}",
                        type: 'get',


                        success: function(data) {
                            $('#total_amount').html(data);
                            $('#grand_total_remove').html(data);

                        },
                    });

                },
            });

        }

        // Search Patient Name
        function search_patient() {
            var searchInput = $('#patient_search').val();
            $.ajax({
                url: '{{ url('admin/search_patient') }}', // Corrected URL generation
                data: {
                    search: searchInput
                },
                success: function(response) {
                    // console.log(response);
                    $("#patient_list").html(response);
                },
                error: function(error) {
                    // console.log(error);
                }
            });
        }

        // Get Patient Details
        function patient_details(patient_id) {
            $(".display_show").hide();
            $.ajax({
                // url: "/patient_details",
                url: '{{ url('admin/patient_details') }}',
                type: "get",
                dataType: "json",
                data: {
                    patient_id: patient_id,
                },
                success: function(response) {
                    var patient_name = JSON.stringify(response.name).replace(/"/g, '');
                    $("#patient_id").val(patient_id);
                    $("#patient_name").val(patient_name);
                    $("#patient_search").val(patient_name);
                }
            });
        }

        function validateForm() {

            let patient = $('#patient_name').val();
            let select_option = $('.select_option').val();
            let display_data = $(".display_data").hasClass('remove_list');

            if (display_data) {
                if (patient.trim() === '') {
                    alert('Please enter Patient Name');
                    return false;
                }
            } else {
                alert('Please enter Patient Name');
                return false;
            }

            if (select_option.trim() === 'select option') {
                alert('Please Select Procedure Name');
                return false;
            }

            return true;
        }

        function rate_amount(id) {

            let get_rate = $("#rate_" + id).val();

            $.ajax({
                url: "{{ url('/admin/rate_amount') }}",
                type: 'get',
                dataType: 'json',
                data: {
                    get_rate: get_rate,
                    treatment_id: id,
                },

                success: function(data) {


                    $('#amount_' + id).val(data);


                    var rate_amount = JSON.stringify(data.rate_amount).replace(/"/g, '');


                    var sum = JSON.stringify(data.sum).replace(/"/g, '');



                    $('#total_amount').html(sum);
                    $('#grand_total_remove').html(sum);


                    $('#amount_' + id).val(rate_amount);
                },
            });
        }

        function amount_quantity(id) {
            let get_quantity = $("#quantity_" + id).val();

            rate_amount();
            let get_patient_id = $("#patient_id").val();

            $.ajax({
                url: "{{ url('/admin/quantity') }}",
                type: 'get',
                dataType: 'json',
                data: {
                    get_quantity: get_quantity,
                    treatment_id: id,
                    patient_id: get_patient_id,
                },

                success: function(data) {


                    $('#amount_' + id).val(data);


                    var rate_amount = JSON.stringify(data.rate_amount).replace(/"/g, '');
                    var sum = JSON.stringify(data.sum).replace(/"/g, '');
                    $('#total_amount').html(sum);
                    $('#grand_total_remove').html(sum);


                    $('#amount_' + id).val(rate_amount);
                },
            });
        }

        function amount_discount(id) {
            let get_discount = $("#discount_" + id).val();

            $.ajax({
                url: "{{ url('/admin/amount_discount') }}",
                type: 'get',
                dataType: 'json',
                data: {
                    get_discount: get_discount,
                    treatment_id: id,
                },

                success: function(data) {


                    var rate_amount = data.rate_amount;
                    var amount = data.amount;
                    var sum = data.sum;
                    // $('#amount_' + id).val(data);

                    // var rate_amount = JSON.stringify(data.rate_amount).replace(/"/g, '');
                    // var amount = JSON.stringify(data.amount).replace(/"/g, '');
                    //  var sum = JSON.stringify(data.sum).replace(/"/g, '');


                    $('#rate_' + id).html(amount);
                    $('#total_amount').html(sum);
                    $('#grand_total_remove').html(sum);
                    $('#amount_' + id).val(rate_amount);
                },
            });
        }
        $(document).ready(function() {

            $.ajax({
                url: "{{ url('/admin/treatment-record-alldeleted') }}",
                type: 'get',
                dataType: 'json',
                data: {},
                success: function(data) {},
            });





        });
    </script>
@endsection
