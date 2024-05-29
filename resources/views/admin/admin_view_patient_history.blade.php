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
    .patient-profile-dropdown{
        transform: translate3d(276px, 51px, 0px) !important;
    }
.patient-profile-dropdown a{
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
            <div class="row d-flex justify-content-between">



                <div class="col-lg-3">
                    <div style="border-radius: 5px;background: #fffefe;box-shadow: 0px 0px 3px 0px;">
                        <div class="profile-userpic profile-usertitle no-margin">
                            <div class="text-end" style="text-align: end;">
                                <div style="margin: 15px 19px;padding: 10px 0px;" aria-expanded="false" aria-haspopup="true"
                                    class="print-icons-ellipsis text-end" data-toggle="dropdown" type="button">
                                    <i class="fa fa-ellipsis-v"></i>
                                </div>
                                <div aria-labelledby="dLabel" class="patient-profile-dropdown dropdown-menu">
                                    <a href="/admin/patients/13590809/print_mini_slip.pdf" target="_blank">
                                        Print Patient Detail
                                    </a>
                                    <a href="/admin/print-smart-card/13590809.pdf" target="_blank">
                                        Print Patient Registration Card
                                    </a>
                                    <a href="/admin/patients/13590809/print_patient_barcode.pdf" target="_blank">
                                        Print Patient barcode
                                    </a>
                                </div>
                            </div>
                            <div class="text-center">
                                <img class="img-responsive border-box-shadow" style="padding:10px;"
                                    src="https://healthwire.pk/assets/default-patient-468aa00c03f6952f9dc533bc4489dbb8ed0a977107e7022e9eb38b2c9e1dc00a.svg"
                                    width="150" height="150">


                                <div class="profile-usertitle no-margin" style="padding: 1rem 0rem;">
                                    <div class="profile-usertitle-name font-weight-normal word-break"
                                        style="font-weight: 900;">
                                        {{ $user->name }}
                                    </div>
                                    <div class="profile-usertitle-job font-weight-normal font-size">
                             
                                        @if ($patient_profiles->gender==1)
                                        Male
                                        @else
                                        Female

                                        @endif
                                    </div>
                                    <div class="profile-usertitle-job no-margin font-weight-normal font-size">
                                        MR#
                                        DAC-{{$patient_profiles->mrn}}
                                        <br>
                                        HW ID 0100002330
                                        <br>
                                        <i>
                                            +92
                                        </i>
                                     {{$patient_profiles->phone}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-3 child_inform">
                        <div class="tab">
                            <a href="">
                                Edit Profile
                            </a>

                        </div>
                        <div class="tab">
                            <a href="">
                                Add Invoice

                            </a>

                        </div>
                        <div class="tab">
                            <a href="">
                                Add Appointment

                            </a>

                        </div>
                        <div class="tab">
                            <a href="">
                                Patient Family History

                            </a>

                        </div>
                        <div class="tab">
                            <a href="">
                                Add Medical History
                            </a>

                        </div>
                        <div class="tab">
                            <a href="">
                                Medical Certificates
                            </a>

                        </div>
                        <div class="tab">
                            <a href="">
                                Add Health Record
                            </a>

                        </div>
                        <div class="tab">
                            <a href="">
                                Send Message
                            </a>

                        </div>
                    </div>
                </div>

                <div class="col-lg-5">

                    <div class="card">
                        <h5 class="card-header">MEDICAL HISTORY </h5>
                        <div class="card-body">
                            <p class="card-text">No medical history has been added yet.</p>

                        </div>
                    </div>
                    <div class="card mt-3">
                        <h5 class="card-header">APPOINTMENTS HISTORY<span>
                                0 Total</span></h5>
                        <div class="card-body">
                            <p class="card-text">No medical history has been added yet.</p>

                        </div>
                    </div>

                    <div class="card mt-3">
                        <h5 class="card-header">RECENT FILES</h5>
                        <div class="card-body">
                            <p class="card-text">No files found</p>

                        </div>
                    </div>

                    <div class="card mt-3">
                        <h5 class="card-header">PATIENT FAMILY HISTORY
                        </h5>
                        <div class="card-body">
                            <p class="card-text">No patient family history has been added yet.
                            </p>

                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card">
                        <h5 class="card-header">HEALTH RECORDS</h5>
                        <div class="card-body">
                            <p class="card-text">No health record has been added yet.
                            </p>

                        </div>
                    </div>
                    <div class="card mt-3">
                        <h5 class="card-header">LAST INVOICE
                        </h5>
                        <div class="card-body">
                            <p class="card-text">No invoice has been added yet.
                            </p>

                        </div>
                    </div>
                    <div class="card mt-3">
                        <h5 class="card-header">RECENT COMMUNICATIONS

                        </h5>
                        <div class="card-body">
                            <p class="card-text">No Communications found.

                            </p>

                        </div>
                    </div>
                    <div class="card mt-3">
                        <h5 class="card-header">TREATMENT PLAN

                        </h5>
                        <div class="card-body">
                            <p class="card-text">
                                Not Available.
                            </p>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
@section('js_code')
    <script>
        $(document).ready(function() {
            $('#doctor_view_table').DataTable();
        });
    </script>
@endsection
