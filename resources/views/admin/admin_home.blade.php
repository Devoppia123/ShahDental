@extends('layouts.admin_template')

@section('sidebar')
    @include('admin.include.sidebar')
@endsection

@section('navbar')
    @include('admin.include.navbar')
@endsection

@section('content')
    <style>
        .colorr {
            text-align: center;
            color: #fff;
            border-radius: 3px;
        }

        .appointment-total {
            margin-bottom: 0px !important;
        }
    </style>
    
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <div class="row">
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Doctors</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ count($doctor) }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-calendar fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Earnings (Annual) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Nurse</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ count($nurse) }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tasks Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Allied Health</div>
                                <div class="row no-gutters align-items-center">
                                    <div class="col-auto">
                                        <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                                            {{ count($allied_health) }}
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="progress progress-sm mr-2">
                                            <div class="progress-bar bg-info" role="progressbar" style="width: 50%"
                                                aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Non Clinical Staff
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ count($non_clinical) }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-comments fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Registered Patient
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ count($patient) }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-calendar fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Earnings (Annual) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Specialities
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ count($speciality) }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tasks Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Total Health Care Topics
                                </div>
                                <div class="row no-gutters align-items-center">
                                    <div class="col-auto">
                                        <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                                            {{ count($allied_health) }}
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="progress progress-sm mr-2">
                                            <div class="progress-bar bg-info" role="progressbar" style="width: 50%"
                                                aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">MONTHLY APPOINTMENTS
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ count($non_clinical) }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-comments fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-4">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">REFERALS</h6>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-10">
                                <p>DisApproved Referals</p>
                            </div>
                            <div class="col-lg-2">
                                <p class="colorr" style="background-color:#006DF0;">0</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-10">
                                <p>Deleted Referals</p>
                            </div>
                            <div class="col-lg-2">
                                <p class="colorr" style="background-color:#933EC5;">0</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-10">
                                <p>Pending Referals</p>
                            </div>
                            <div class="col-lg-2">
                                <p class="colorr" style="background-color:#65b12d;">0</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-10">
                                <p>Approved Referals</p>
                            </div>
                            <div class="col-lg-2">
                                <p class="colorr" style="background-color:#D80027;">0</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-10">
                                <p>Total Referals</p>
                            </div>
                            <div class="col-lg-2">
                                <p class="colorr" style="background-color:#f0ad4e;">0</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-10">
                                <p>Registered GP</p>
                            </div>
                            <div class="col-lg-2">
                                <p class="colorr" style="background-color:#9675ce;">0</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-10">
                                <p>GP Pending Approval</p>
                            </div>
                            <div class="col-lg-2">
                                <p class="colorr" style="background-color:#9675ce;">0</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-10">
                                <p>GP DisApproved</p>
                            </div>
                            <div class="col-lg-2">
                                <p class="colorr" style="background-color:#9675ce;">0</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">APPOINTMENT STATS</h6>
                    </div>
                    <div class="card-body">
                        <div>
                            <p style="margin-bottom: 0px">9</p>
                            <div class="row">
                                <div class="col-lg-10">
                                    <p class="appointment-total">Total Appointments</p>
                                </div>
                                <div class="col-lg-2">
                                    <p class="appointment-total">0</p>
                                </div>
                                <div class="col">
                                    <div class="progress progress-sm mr-2">
                                        <div class="progress-bar bg-info" role="progressbar" style="width: 50%"
                                            aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div style="margin-top: 15px">
                            <p style="margin-bottom: 0px">9</p>
                            <div class="row">
                                <div class="col-lg-10">
                                    <p class="appointment-total">Pending Appointments</p>
                                </div>
                                <div class="col-lg-2">
                                    <p class="appointment-total">0</p>
                                </div>
                                <div class="col">
                                    <div class="progress progress-sm mr-2">
                                        <div class="progress-bar bg-info" role="progressbar" style="width: 50%"
                                            aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div style="margin-top: 15px">
                            <p style="margin-bottom: 0px">9</p>
                            <div class="row">
                                <div class="col-lg-10">
                                    <p class="appointment-total">Approved Appointments</p>
                                </div>
                                <div class="col-lg-2">
                                    <p class="appointment-total">0</p>
                                </div>
                                <div class="col">
                                    <div class="progress progress-sm mr-2">
                                        <div class="progress-bar bg-info" role="progressbar" style="width: 50%"
                                            aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div style="margin-top: 15px">
                            <p style="margin-bottom: 0px">9</p>
                            <div class="row">
                                <div class="col-lg-10">
                                    <p class="appointment-total">Approved Appointments</p>
                                </div>
                                <div class="col-lg-2">
                                    <p class="appointment-total">0</p>
                                </div>
                                <div class="col">
                                    <div class="progress progress-sm mr-2">
                                        <div class="progress-bar bg-info" role="progressbar" style="width: 50%"
                                            aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div style="margin-top: 15px">
                            <p style="margin-bottom: 0px">9</p>
                            <div class="row">
                                <div class="col-lg-10">
                                    <p class="appointment-total">Approved Appointments</p>
                                </div>
                                <div class="col-lg-2">
                                    <p class="appointment-total">0</p>
                                </div>
                                <div class="col">
                                    <div class="progress progress-sm mr-2">
                                        <div class="progress-bar bg-info" role="progressbar" style="width: 50%"
                                            aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <div>
                            <div class="row">
                                <div class="col-lg-10">
                                    <p class="appointment-total">Total QUERIES</p>
                                </div>
                                <div class="col-lg-2">
                                    <p class="appointment-total">781</p>
                                </div>
                                <div class="col">
                                    <div class="progress progress-sm mr-2">
                                        <div class="progress-bar bg-info" role="progressbar" style="width: 50%"
                                            aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card shadow mb-4">
                    <div class="card-body">
                        <div>
                            <div class="row">
                                <div class="col-lg-10">
                                    <p class="appointment-total">Monthly QUERIES</p>
                                </div>
                                <div class="col-lg-2">
                                    <p class="appointment-total">0</p>
                                </div>
                                <div class="col">
                                    <div class="progress progress-sm mr-2">
                                        <div class="progress-bar bg-info" role="progressbar" style="width: 50%"
                                            aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card shadow mb-4">
                    <div class="card-body">
                        <div>
                            <div class="row">
                                <div class="col-lg-10">
                                    <p class="appointment-total">Weekly QUERIES</p>
                                </div>
                                <div class="col-lg-2">
                                    <p class="appointment-total">0</p>
                                </div>
                                <div class="col">
                                    <div class="progress progress-sm mr-2">
                                        <div class="progress-bar bg-info" role="progressbar" style="width: 50%"
                                            aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card shadow mb-4">
                    <div class="card-body">
                        <div>
                            <div class="row">
                                <div class="col-lg-10">
                                    <p class="appointment-total">WEEKLY APPOINTMENTS</p>
                                </div>
                                <div class="col-lg-2">
                                    <p class="appointment-total">0</p>
                                </div>
                                <div class="col">
                                    <div class="progress progress-sm mr-2">
                                        <div class="progress-bar bg-info" role="progressbar" style="width: 50%"
                                            aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
