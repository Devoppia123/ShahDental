@extends('layouts.admin_template')
@section('sidebar')
    @include('admin.include.sidebar')
@endsection
@section('navbar')
    @include('admin.include.navbar')
@endsection


@section('content')
    <div class="main-cont-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">
                    <select class="form-control mt-3 validate_item" name="doctor" id="doctor" onchange="search_doctor()">
                        <option>Select Doctor</option>
                        @foreach ($doctors as $doctor)
                            <option value="{{ $doctor->id }}">{{ $doctor->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3">
                    <select class="form-control mt-3 validate_item" name="procedure" id="procedure"
                        onchange="search_prodecure()">
                        <option value="">Select Procedure</option>
                        @foreach ($procedures as $procedure)
                            <option value="{{ $procedure->id }}">{{ $procedure->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="mt-5">
                <div class="total_appointment row">
                    <div class="card col-md-4" style="width: 18rem;">
                        <div class="card-body"
                            style="
                        display: flex;
                        flex-direction:column;
                        align-items: center;
                        justify-content: center;
                        padding: 3rem 0rem;">
                            <h5 style="color: #584747;
                            font-weight: 500;" class="card-title">
                                Total Appointments</h5>

                            <h5 style="color: #584747;
                         font-weight: 500;"
                                class="card-title appointment_no">0</h5>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function search_doctor() {
            var doctor_id = $("#doctor").val();
            var procedure_id = $("#procedure").val();
            if (doctor_id == "" && procedure_id == "") {
                $.ajax({
                    type: "get",
                    url: "/admin/doctor_appointment_procedure_search",
                    data: {
                        procedure_id: procedure_id,
                        doctor_id: doctor_id
                    },
                    success: function(response) {
                        $(".appointment_no").html(response);
                    }
                });
            } else {
                $.ajax({
                    type: "get",
                    url: "/admin/doctor_appointment_search",
                    data: {
                        doctor_id: doctor_id,
                    },
                    success: function(response) {
                        $(".appointment_no").html(response);
                    }
                });
            }
        }

        function search_prodecure() {
            var doctor_id = $("#doctor").val();
            var procedure_id = $("#procedure").val();
            if (doctor_id == "" && procedure_id == "") {
                $.ajax({
                    type: "get",
                    url: "/admin/doctor_appointment_procedure_search",
                    data: {
                        procedure_id: procedure_id,
                        doctor_id: doctor_id
                    },
                    success: function(response) {
                        $(".appointment_no").html(response);
                    }
                });
            } else {
                $.ajax({
                    type: "get",
                    url: "/admin/doctor_procedure_search",
                    data: {
                        procedure_id: procedure_id,
                    },
                    success: function(response) {
                        $(".appointment_no").html(response);
                    }
                });
            }
        }
    </script>
@endsection
