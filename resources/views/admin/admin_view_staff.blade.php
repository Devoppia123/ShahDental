@extends('layouts.admin_template')
@section('sidebar')
    @include('admin.include.sidebar')
@endsection
@section('navbar')
    @include('admin.include.navbar')
@endsection
@section('content')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.3/css/jquery.dataTables.min.css">
    <script src="https://cdn.datatables.net/1.13.3/js/jquery.dataTables.min.js"></script>
    <style>
        .badge-info {
            border-radius: 4px;
            color: white;
            font-weight: 400;
            background: #5bc0de;
            padding: 0.25px 6.4px;
            font-size: 12px;
        }

        .badge-secondary {
            border-radius: 4px;
            color: white;
            font-weight: 400;
            background: #777;
            padding: 0.25px 6.4px;
            font-size: 12px;
        }

        .badge-warning {
            border-radius: 4px;
            color: white;
            font-weight: 400;
            background: #f0ad4e;
            padding: 0.25px 6.4px;
            font-size: 12px;
        }

        .badge-success {
            border-radius: 4px;
            color: white;
            font-weight: 400;
            background: #5cb85c;
            padding: 0.25px 6.4px;
            font-size: 12px;
        }

        .badge-danger {
            border-radius: 4px;
            color: white;
            font-weight: 400;
            background: #d9534f;
            padding: 0.25px 6.4px;
            font-size: 12px;
        }

        #alert {
            display: none;
        }
    </style>

    <div class="container-fluid">

        <h1 class="h3 mb-2 text-gray-800">View Users</h1>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab">Doctors</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#tabs-2" role="tab"> Nurses</a>
                    </li>
                    {{-- <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#tabs-3" role="tab">Allied Health</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#tabs-4" role="tab">Non Clinical</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#tabs-5" role="tab">Mini Admin </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#tabs-6" role="tab">Clinical Assistants </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#tabs-7" role="tab">GPs </a>
                    </li> --}}
                </ul>
            </div>


            <div class="tab-content">
                <div class="tab-pane active" id="tabs-1" role="tabpanel">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered app_table" id="doctor_table" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th class="txt-10-normal"><b>User Name</b></th>
                                        <th class="txt-10-normal"><b>User Type</b></th>
                                        <th class="txt-10-normal"><b>Email</b></th>
                                        <th class="txt-10-normal"><b>Action</b></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($doctor as $doc)
                                        <tr>
                                            <td>{{ $doc->name }}</td>
                                            @if ($doc->role_type == 3)
                                                <td>Doctor</td>
                                            @endif
                                            <td>{{ $doc->email }}</td>
                                            <td>
                                                <a href="{{ url("/admin/assign_rights/$doc->id/$doc->role_type") }}"
                                                    class="btn btn-info">
                                                    Assign Rights
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="tab-pane" id="tabs-2" role="tabpanel">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable_Nurse" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th class="txt-10-normal"><b>User Name</b></th>
                                        <th class="txt-10-normal"><b>User Type</b></th>
                                        <th class="txt-10-normal"><b>Email</b></th>
                                        <th class="txt-10-normal"><b>Action</b></th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($nurse as $nur)
                                        <tr>
                                            <td>{{ $nur->name }}</td>
                                            @if ($nur->role_type == 4)
                                                <td>Nurse</td>
                                            @endif
                                            <td>{{ $nur->email }}</td>
                                            <td>
                                                <a href="{{ url("/admin/assign_doctor_to_nurse/$nur->id") }}"
                                                    class="btn btn-primary">Assign Doctor</a>

                                                <a href="{{ url("/admin/assign_rights/$nur->id/$nur->role_type") }}"
                                                    class="btn btn-info">
                                                    Assign Rights
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                {{-- <div class="tab-pane" id="tabs-3" role="tabpanel">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable_Allied_Health" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th class="txt-10-normal"><b>User Name</b></th>
                                        <th class="txt-10-normal"><b>User Type</b></th>
                                        <th class="txt-10-normal"><b>Email</b></th>
                                        <th class="txt-10-normal"><b>Action</b></th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($allied_health as $allied)
                                        <tr>
                                            <td>{{ $allied->name }}</td>
                                            @if ($allied->role_type == 5)
                                                <td>Nurse</td>
                                            @endif
                                            <td>{{ $allied->email }}</td>
                                            <td>Axion</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="tab-pane" id="tabs-4" role="tabpanel">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable_Non_Clinical" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th class="txt-10-normal"><b>User Name</b></th>
                                        <th class="txt-10-normal"><b>User Type</b></th>

                                        <th class="txt-10-normal"><b>Email</b></th>
                                        <th class="txt-10-normal"><b>Action</b></th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($non_clinical as $clinic)
                                        <tr>
                                            <td>{{ $clinic->name }}</td>
                                            @if ($clinic->role_type == 6)
                                                <td>Nurse</td>
                                            @endif
                                            <td>{{ $clinic->email }}</td>
                                            <td>Axion</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="tab-pane" id="tabs-5" role="tabpanel">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable_Mini_Administrator" width="100%"
                                cellspacing="0">
                                <thead>
                                    <tr>
                                        <th class="txt-10-normal"><b>User Name</b></th>
                                        <th class="txt-10-normal"><b>User Type</b></th>

                                        <th class="txt-10-normal"><b>Email</b></th>
                                        <th class="txt-10-normal"><b>Action</b></th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($miniadmin as $mini)
                                        <tr>
                                            <td>{{ $mini->name }}</td>
                                            @if ($mini->role_type == 2)
                                                <td>Nurse</td>
                                            @endif
                                            <td>{{ $mini->email }}</td>
                                            <td>Axion</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="tab-pane" id="tabs-6" role="tabpanel">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable_Clinical_Assistant" width="100%"
                                cellspacing="0">
                                <thead>
                                    <tr>
                                        <th class="txt-10-normal"><b>User Name</b></th>
                                        <th class="txt-10-normal"><b>User Type</b></th>

                                        <th class="txt-10-normal"><b>Email</b></th>
                                        <th class="txt-10-normal"><b>Action</b></th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($clinical_assistant as $assistant)
                                        <tr>
                                            <td>{{ $assistant->name }}</td>
                                            @if ($assistant->role_type == 9)
                                                <td>Nurse</td>
                                            @endif
                                            <td>{{ $assistant->email }}</td>
                                            <td>Axion</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="tab-pane" id="tabs-7" role="tabpanel">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable_GP" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th class="txt-10-normal"><b>User Name</b></th>
                                        <th class="txt-10-normal"><b>User Type</b></th>

                                        <th class="txt-10-normal"><b>Email</b></th>
                                        <th class="txt-10-normal"><b>Action</b></th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($gp as $g)
                                        <tr>
                                            <td>{{ $g->name }}</td>
                                            @if ($g->role_type == 7)
                                                <td>Nurse</td>
                                            @endif
                                            <td>{{ $g->email }}</td>
                                            <td>Axion</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div> --}}

            </div>
        </div>
    </div>
@endsection

@section('js_code')
    <script>
        $(document).ready(function() {
            let table = new DataTable('#doctor_table');
        });
    </script>
@endsection
