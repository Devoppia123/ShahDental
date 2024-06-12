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
            <h1>Patients Report</h1>
            <button type="button" class="btn btn-primary mt-3 mb-5" onclick="exportExcel()">Export to XLS</button>
            <table class="table2excel table">
                <thead>
                    <tr>
                        <th>MRN</th>
                        <th>Name</th>
                        <th>Gender</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($patients as $patient)
                        <tr>
                            <td>{{ $patient->mrn }}</td>
                            <td>{{ $patient->patient_name }}</td>
                            <td>{{ $patient->patient_email }}</td>
                            <td><a href="{{ url("/admin/view_patient_detail/$patient->patient_id") }}" class="btn btn-info">
                                    View Details
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <button style="display: none;" type="button" class="btn btn-primary exportToExcel">Export to XLS</button>
            {{ $patients->links() }}
        </div>
    </div>
@endsection
@section('js_code')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    {{-- <script src="{{ asset('js/jquery.table2excel.js') }}"></script> --}}
    <script src="{{ url('public/js/jquery.table2excel.js') }}"></script>
    <script>
        function exportExcel() {
            $(".exportToExcel").click();
        }
        $(document).ready(function() {
            $(function() {
                $(".exportToExcel").click(function(e) {
                    var table = $(this).prev('.table2excel');
                    if (table && table.length) {
                        var preserveColors = (table.hasClass('table2excel_with_colors') ? true :
                            false);
                        $(table).table2excel({
                            exclude: ".noExl",
                            name: "Excel Document Name",
                            filename: "myFileName" + new Date().toISOString().replace(
                                    /[\-\:\.]/g, "") +
                                ".xls",
                            fileext: ".xls",
                            exclude_img: true,
                            exclude_links: true,
                            exclude_inputs: true,
                            preserveColors: preserveColors
                        });
                    }
                });

            });
        });
    </script>
@endsection
