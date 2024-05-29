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

            <div class="mt-5 mb-5">
                <a class="btn btn-success" href="{{ url('/admin/add-stock-adjustment') }}">Add Stock Adjustment</a>
            </div>

            <div class="mt-3">
                <h4>
                    Inventory Stock Adjustments
                </h4>
                <div class="mt-3 col-md-3">
                    <label>Date</label>
                    <input class="mt-3 form-control" type="date" id="date" onchange="date_get()" name="" />
                </div>


                <table class="table mt-5" id="doctor_view_table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Item Name </th>
                
                            <th>Cost </th>
                        </tr>
                    </thead>
                    <tbody class="display">






                    </tbody>
                </table>


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
