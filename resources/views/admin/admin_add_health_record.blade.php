@extends('layouts.admin_template')
@section('sidebar')
    @include('admin.include.sidebar')
@endsection
@section('navbar')
    @include('admin.include.navbar')
@endsection
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
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
            <div class="card p-4 mb-5 mt-5">
                <div class="row">

                    <div class="col-3">
                        <input class="form-control" value="{{ $patient->name }}" disabled type="text" name=""
                            id="" />
                    </div>
                    <div class="col-3">

                        <input class="form-control" type="date" value="{{ $currentDate = date('Y-m-d') }}" name=""
                            id="" />
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col-lg-9">
                    <div class="card p-4">
                        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home"
                                    role="tab" aria-controls="pills-home" aria-selected="true">Treatment</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile"
                                    role="tab" aria-controls="pills-profile" aria-selected="false">Medication</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact"
                                    role="tab" aria-controls="pills-contact" aria-selected="false">
                                    Lab order</a>
                            </li>


                            <li class="nav-item">

                                <a class="nav-link" id="pills-radiology-tab" data-toggle="pill" href="#pills-radiology"
                                    role="tab" aria-controls="pills-radiology" aria-selected="false">
                                    Radiology order</a>
                            </li>


                            <li class="nav-item">

                                <a class="nav-link" id="pills-investigation-tab" data-toggle="pill"
                                    href="#pills-investigation" role="tab" aria-controls="pills-investigation"
                                    aria-selected="false">
                                    Investigation</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                                aria-labelledby="pills-home-tab">

                                <div class="mt-5">
                                    <div class="form-group all_lable">
                                        <label for="exampleFormControlTextarea1">
                                            Complaint
                                        </label>
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                    </div>
                                    <div class="form-group all_lable">
                                        <label for="exampleFormControlTextarea1">
                                            Examination
                                        </label>
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                    </div>
                                    <div class="form-group all_lable">
                                        <label for="exampleFormControlTextarea1">
                                            Diagnosis
                                        </label>
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                    </div>
                                    <div class="form-group all_lable">
                                        <label for="exampleFormControlTextarea1">
                                            Clinical Notes
                                        </label>
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                    </div>
                                    <div class="form-group all_lable">
                                        <label for="exampleFormControlTextarea1">
                                            Advice
                                        </label>
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                    </div>
                                    <div class="form-group all_lable">
                                        <label for="exampleFormControlTextarea1">
                                            Investigation
                                        </label>
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                    </div>
                                    <div class="form-group all_lable">
                                        <label for="exampleFormControlTextarea1">
                                            Notes
                                        </label>
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                    </div>
                                </div>

                                <div class="mt-4">
                                    <h5
                                        style="    font-weight: 700;
                                    font-family: 'Nunito';
                                    color: #655353d9;">
                                        Provisional Treatment Plan

                                    </h5>


                                    <div class="mt-4">

                                        <table>
                                            <thead>
                                                <tr>
                                                    <th>DESCRIPTION</th>
                                                    <th>TOOTH NUMBER</th>
                                                    <th>DATE </th>
                                                    <th>Rate </th>
                                                    <th>TOTAL AMOUNT </th>
                                                    <th>DISCOUNT</th>
                                                </tr>
                                            </thead>
                                            <tbody class="display_data">
                                                <tr>
                                                    <td>
                                                        <select class="form-control" id="treatment_id_1" data-id="1">
                                                            <option>select option</option>
                                                            @foreach ($Treatment as $list)
                                                                <option value="{{ $list->id }}">
                                                                    {{ $list->treatments_name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <input class="form-control" type="text" required
                                                            name="treatment_name" id="tooth_number" class="txt-field" />
                                                    </td>
                                                    <td>
                                                        <input type="date" value="{{ $currentDate = date('Y-m-d') }}">
                                                    </td>


                                                    <td>
                                                        <input class="form-control" type="text" required
                                                            name="rate" id="rate" class="txt-field" />
                                                    </td>

                                                    <td>


                                                        <input class="form-control" type="text" required
                                                            name="rate" id="" class="txt-field" />

                                                    </td>

                                                    <td>


                                                        <input class="form-control" type="text" required
                                                            name="rate" id="" class="txt-field" />

                                                    </td>

                                                </tr>
                                            </tbody>

                                        </table>

                                        <button type="button" class="mt-3 btn btn-success table_append">
                                            + Item
                                        </button>
                                        {{-- <button type="button" class="mt-3 btn btn-danger table_remove">
                                            - Remove
                                        </button> --}}
                                        <button type="button" class="mt-3 btn btn-danger remove_row" disabled>
                                            - Remove
                                        </button>
                                    </div>

                                    <div class="mt-5">
                                        <h3>
                                            Procedure

                                        </h3>
                                        <div class="col-lg-6">

                                            <div class="display_procedures">

                                            </div>
                                            <button type="button" class="mt-3 btn btn-success procedure_append">
                                                + Procedure
                                            </button>
                                        </div>

                                    </div>


                                    <div class="mt-5 row">
                                        <div class="col-4">

                                            <label for="">Improvement</label>
                                            <select class="form-control">
                                                <option value="">Select Improvement</option>
                                                <option value="0">0%</option>
                                                <option value="10">10%</option>
                                                <option value="20">20%</option>
                                                <option value="30">30%</option>
                                                <option value="40">40%</option>
                                                <option value="50">50%</option>
                                                <option value="60">60%</option>
                                                <option value="70">70%</option>
                                                <option value="80">80%</option>
                                                <option value="90">90%</option>
                                                <option value="100">100%</option>
                                            </select>
                                        </div>

                                        <div class="col-6">
                                            <label for="">Recommended Follow-up Appointment Date
                                            </label>

                                            <input type="date" class="form-control">


                                        </div>


                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="pills-profile" role="tabpanel"
                                aria-labelledby="pills-profile-tab">

                                <div class="mt-4">

                                    <table>
                                        <thead>
                                            <tr>
                                                <th rowspan="2">Name </th>
                                                <th>Duration</th>
                                                <th>Dosage </th>
                                                <th>Route </th>
                                                <th>Frequency</th>
                                                <th>Instruction
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody class="medication_display">

                                            <tr>

                                                <td style="width: 12%;">
                                                    <select class="form-control" id="treatment_id_1" data-id="1">

                                                        @foreach ($medications as $get_med)
                                                            <option value="{{ $get_med->id }}">{{ $get_med->name }}
                                                            </option>
                                                        @endforeach

                                                    </select>
                                                </td>

                                                <td>
                                                    <input class="form-control" type="text" required
                                                        name="treatment_name" id="tooth_number" class="txt-field" />
                                                    <br>
                                                    <select class="form-control" id="treatment_id_1" data-id="1">
                                                        <option value="">Select</option>
                                                        <option value="day(s)">Day(s)</option>
                                                        <option value="week(s)">Week(s)</option>
                                                        <option value="month(s)">Month(s)</option>
                                                        <option value="Continuously">Continuously</option>
                                                        <option value="When Required">When Required</option>
                                                        <option value="STAT">STAT</option>
                                                        <option value="PRN">PRN</option>

                                                    </select>
                                                </td>
                                                <td>
                                                    <input class="form-control" type="text" required
                                                        name="treatment_name" id="tooth_number" class="txt-field" />
                                                    <br>
                                                    <select class="form-control" id="treatment_id_1" data-id="1">
                                                        <option>select option</option>
                                                        <option value="Capsule(s)">Capsule(s)</option>
                                                        <option value="Tablet(s)">Tablet(s)</option>
                                                        <option value="ml">ml</option>
                                                        <option value="IU">IU</option>
                                                        <option value="Drop">Drop</option>
                                                        <option value="Tablespoon">Tablespoon</option>
                                                        <option value="Teaspoon">Teaspoon</option>
                                                        <option value="Unit(s)">Unit(s)</option>
                                                        <option value="Puff(s)">Puff(s)</option>
                                                        <option value="Injection">Injection</option>
                                                        <option value="Dose Step">Dose Step</option>
                                                        <option value="Sachet">Sachet</option>

                                                        <option value="ml/h">ml/h</option>
                                                        <option value="Units/kg">Units/kg</option>





                                                    </select>
                                                </td>

                                                <td>
                                                    <select class="form-control" id="treatment_id_1" data-id="1">
                                                        <option>Select</option>
                                                        <option value="oral">Oral</option>
                                                        <option value="intramuscular">Intramuscular</option>
                                                        <option value="nasal">Nasal</option>
                                                        <option value="intravenous">Intravenous</option>
                                                        <option value="topical">Topical</option>
                                                        <option value="intraosseous">Intraosseous</option>
                                                        <option value="intrathecal">Intrathecal</option>
                                                        <option value="intraperitoneal">Intraperitoneal</option>
                                                        <option value="intradermal">Intradermal</option>
                                                        <option value="nasogastric">Nasogastric</option>
                                                        <option value="sublingual">Sublingual</option>
                                                        <option value="per_rectum">Per Rectum</option>
                                                        <option value="subcutaneous">Subcutaneous</option>
                                                        <option value="per_vaginal">Per Vaginal</option>
                                                        <option value="inhalation">Inhalation</option>
                                                        <option value="intraocular">Intraocular</option>
                                                    </select>
                                                </td>

                                                <td style="width: 17%;">
                                                    <select class="form-control" id="treatment_id_1" data-id="1">
                                                        <option>select option</option>

                                                        <option value="51">Only Once</option>
                                                        <option value="52">Once a day</option>
                                                        <option value="53">Twice a day</option>
                                                        <option value="54">Thrice a day</option>
                                                        <option value="55">Four times a day</option>
                                                        <option value="56">Before Bed</option>
                                                        <option value="57">Every hour</option>
                                                        <option value="58">Every 2 hours</option>
                                                        <option value="59">Every 3 hours</option>
                                                        <option value="60">Every 4 hours</option>
                                                        <option value="61">Every 6 hours</option>
                                                        <option value="62">Every 8 hours</option>
                                                        <option value="63">Every 12 hours</option>
                                                        <option value="64">Every Other day</option>
                                                        <option value="65">Every 3 Days</option>
                                                        <option value="66">Once a week</option>
                                                        <option value="67">Twice a week</option>
                                                        <option value="68">Thrice a week</option>
                                                        <option value="69">Every 10 Days</option>
                                                        <option value="70">Every 15 Days</option>
                                                        <option value="71">Once a Month</option>
                                                        <option value="72">Once 3 Months</option>
                                                        <option value="73">Once a Year</option>
                                                        <option value="74">Every Morning</option>
                                                        <option value="75">Every Evening</option>
                                                        <option value="76">Every Night</option>
                                                        <option value="77">If needed</option>
                                                        <option value="78">Before Breakfast</option>
                                                        <option value="79">Continuously</option>
                                                        <option value="80">Before Lunch</option>
                                                        <option value="81">After Lunch</option>
                                                        <option value="82">Before Meal</option>
                                                        <option value="83">After Meal</option>
                                                        <option value="84">Before Dinner</option>
                                                        <option value="85">After Dinner</option>
                                                        <option value="86">As Advised</option>
                                                        <option value="87">Twice a month</option>
                                                        <option value="88">After Breakfast</option>
                                                        <option value="89">Before Breakfast and Lunch</option>
                                                        <option value="90">Before Lunch and Dinner</option>
                                                        <option value="91">Before breakfast and dinner</option>
                                                        <option value="92">After Breakfast and Lunch</option>
                                                        <option value="93">After Lunch and Dinner</option>
                                                        <option value="94">After breakfast and dinner</option>
                                                        <option value="95">Before Breakfast, Lunch &amp; Dinner
                                                        </option>
                                                        <option value="96">After Breakfast, Lunch &amp; Dinner</option>
                                                        <option value="492">at noon</option>
                                                        <option value="493">noon and evening</option>
                                                        <option value="494">morning, evening, night</option>
                                                        <option value="495">Morning and noon</option>
                                                        <option value="496">at 6 am, 10 am, 2pm, 6 pm, 10 pm</option>
                                                        <option value="497">Thrice a day for 21 days, then only at night
                                                            for next 2 months</option>
                                                        <option value="498">Twice a day for 21 days, then only at night
                                                            for next 2 months</option>
                                                        <option value="499">Twice a day for 21 days, then onwards for
                                                            next two months take 1 capsule by skipping 1 day
                                                        </option>
                                                        <option value="500">Twice a week after dialysis</option>
                                                        <option value="501">Thrice a week after dialysis</option>
                                                        <option value="502">After dialysis in double lumen</option>
                                                        <option value="503">At the start of dialysis</option>
                                                        <option value="504">During dialysis</option>
                                                        <option value="505">Before dialysis</option>
                                                        <option value="506">First injection now, then after 1 month ,
                                                            next at 2 months end, 3rd injection at 6 months
                                                            end</option>
                                                        <option value="507">Once in a year</option>
                                                        <option value="508">One injection now, next after a month
                                                        </option>
                                                        <option value="509">One injection now, one after a month, next
                                                            after 6 months.</option>

                                                    </select>
                                                </td>

                                                <td>
                                                    <select class="form-control" id="treatment_id_1" data-id="1">


                                                        <option value="">Select</option>
                                                        <option value="select_intake">Select Intake</option>
                                                        <option value="oral">Oral</option>
                                                        <option value="intramuscular">Intramuscular</option>
                                                        <option value="nasal">Nasal</option>
                                                        <option value="intravenous">Intravenous</option>
                                                        <option value="topical">Topical</option>
                                                        <option value="intraosseous">Intraosseous</option>
                                                        <option value="intrathecal">Intrathecal</option>
                                                        <option value="intraperitoneal">Intraperitoneal</option>
                                                        <option value="intradermal">Intradermal</option>
                                                        <option value="nasogastric">Nasogastric</option>
                                                        <option value="sublingual">Sublingual</option>
                                                        <option value="per_rectum">Per Rectum</option>
                                                        <option value="subcutaneous">Subcutaneous</option>
                                                        <option value="per_vaginal">Per Vaginal</option>
                                                        <option value="inhalation">Inhalation</option>
                                                        <option value="intraocular">Intraocular</option>

                                                    </select>
                                                </td>

                                            </tr>

                                        </tbody>

                                    </table>
                                    <button type="button" class="mt-3 btn btn-success medication_append">
                                        + Drug
                                    </button>
                                    {{-- <button type="button" class="mt-3 btn btn-danger table_remove">
                                        - Remove
                                    </button> --}}
                                    <button type="button" class="mt-3 btn btn-danger medication_remove" disabled>
                                        - Remove
                                    </button>


                                </div>

                                <div class="mt-5">
                                    <div class="col-12 mb-4">
                                        <div>
                                            <label>Medication Notes :</label>
                                            <textarea name="description" class="form-control makeMeSummernote" rows="5"></textarea>
                                        </div>
                                    </div>
                                    <div class="row d-flex">


                                        <div class="col-3">

                                            <label for="">Improvement</label>
                                            <select class="form-control">
                                                <option value="">Select Improvement</option>
                                                <option value="0">0%</option>
                                                <option value="10">10%</option>
                                                <option value="20">20%</option>
                                                <option value="30">30%</option>
                                                <option value="40">40%</option>
                                                <option value="50">50%</option>
                                                <option value="60">60%</option>
                                                <option value="70">70%</option>
                                                <option value="80">80%</option>
                                                <option value="90">90%</option>
                                                <option value="100">100%</option>
                                            </select>
                                        </div>

                                        <div class="col-5">
                                            <label for="">Recommended Follow-up Appointment Date
                                            </label>

                                            <input type="date" class="form-control">


                                        </div>

                                        <div class="col-2" style="display: flex;align-items: end">

                                            <input class="form-control btn btn-primary" type="submit" required
                                                name="rate" id="" value="Print Save" />
                                        </div>

                                        <div class="col-2" style="display: flex;align-items: end">


                                            <input class="form-control btn btn-primary" type="submit" required
                                                name="rate" id="" value="Submit" />
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="pills-contact" role="tabpanel"
                                aria-labelledby="pills-contact-tab">
                                <div class="mt-3 row">
                                    <div class="col-6">

                                        <select class="form-control" name="laborder_id" id="laborder"
                                            onchange="laborder()">
                                            <option>select option</option>
                                            @foreach ($laborders as $list)
                                                <option value="{{ $list->id }}">
                                                    {{ $list->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-6">

                                        <select class="form-control" multiple id="sublaborders" name="sublaborders">

                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="pills-radiology" role="tabpanel"
                                aria-labelledby="pills-radiology-tab">

                                <div class="row mt-4">

                                    <div class="col-6">
                                        <select class="form-control" id="">
                                            @foreach ($radiologys as $list_radio)
                                                <option value="{{ $list_radio->id }}">
                                                    {{ $list_radio->name }}
                                                </option>
                                            @endforeach



                                        </select>
                                    </div>
                                    <div class="col-4">
                                        <select class="form-control" id="">
                                            <option value="">Select Priority</option>
                                            <option value="Regular">Regular</option>
                                            <option value="Prior">Prior</option>

                                        </select>
                                    </div>

                                </div>

                                <div class="mt-5">

                                    <div class="row d-flex">


                                        <div class="col-3">

                                            <label for="">Improvement</label>
                                            <select class="form-control">
                                                <option value="">Select Improvement</option>
                                                <option value="0">0%</option>
                                                <option value="10">10%</option>
                                                <option value="20">20%</option>
                                                <option value="30">30%</option>
                                                <option value="40">40%</option>
                                                <option value="50">50%</option>
                                                <option value="60">60%</option>
                                                <option value="70">70%</option>
                                                <option value="80">80%</option>
                                                <option value="90">90%</option>
                                                <option value="100">100%</option>
                                            </select>
                                        </div>

                                        <div class="col-5">
                                            <label for="">Recommended Follow-up Appointment Date
                                            </label>


                                            <input type="date" value="{{ $currentDate = date('Y-m-d') }}"
                                                class="form-control">


                                        </div>

                                        <div class="col-2" style="display: flex;align-items: end">

                                            <input class="form-control btn btn-primary" type="submit" required
                                                name="rate" id="" value="Print Save" />
                                        </div>

                                        <div class="col-2" style="display: flex;align-items: end">


                                            <input class="form-control btn btn-primary" type="submit" required
                                                name="rate" id="" value="Submit" />
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="pills-investigation" role="tabpanel"
                                aria-labelledby="pills-investigation-tab">
                                <div class="mt-4">

                                    <table>
                                        <thead>
                                            <tr>
                                                <th rowspan="2">Type </th>
                                                <th>Result</th>
                                                <th>Previous Result
                                                </th>
                                                <th>Comment </th>

                                            </tr>
                                        </thead>
                                        <tbody class="investigation_display">

                                            <tr>

                                                <td style="width: 12%;">
                                                    <select class="form-control" id="treatment_id_1" data-id="1">

                                                        @foreach ($medications as $get_med)
                                                            <option value="{{ $get_med->id }}">{{ $get_med->name }}
                                                            </option>
                                                        @endforeach

                                                    </select>
                                                </td>

                                                <td>
                                                    <input class="form-control" type="text" required
                                                        name="treatment_name" id="tooth_number" class="txt-field" />

                                                </td>
                                                <td>
                                                    <input class="form-control" type="text" required
                                                        name="treatment_name" id="tooth_number" class="txt-field" />

                                                </td>

                                                <td>
                                                    <div>
                                                        <label>Medication Notes :</label>
                                                        <textarea name="description" class="form-control"></textarea>
                                                    </div>
                                                </td>


                                            </tr>

                                        </tbody>

                                    </table>
                                    <button type="button" class="mt-3 btn btn-success investigation_append">
                                        + Drug
                                    </button>
                                    {{-- <button type="button" class="mt-3 btn btn-danger table_remove">
                                        - Remove
                                    </button> --}}
                                    <button type="button" class="mt-3 btn btn-danger investigation_remove" disabled>
                                        - Remove
                                    </button>


                                </div>

                                <div class="mt-5">

                                    <div class="row d-flex">


                                        <div class="col-3">

                                            <label for="">Improvement</label>
                                            <select class="form-control">
                                                <option value="">Select Improvement</option>
                                                <option value="0">0%</option>
                                                <option value="10">10%</option>
                                                <option value="20">20%</option>
                                                <option value="30">30%</option>
                                                <option value="40">40%</option>
                                                <option value="50">50%</option>
                                                <option value="60">60%</option>
                                                <option value="70">70%</option>
                                                <option value="80">80%</option>
                                                <option value="90">90%</option>
                                                <option value="100">100%</option>
                                            </select>
                                        </div>

                                        <div class="col-5">
                                            <label for="">Recommended Follow-up Appointment Date
                                            </label>

                                            <input type="date" class="form-control">


                                        </div>

                                        <div class="col-2" style="display: flex;align-items: end">

                                            <input class="form-control btn btn-primary" type="submit" required
                                                name="rate" id="" value="Print Save" />
                                        </div>

                                        <div class="col-2" style="display: flex;align-items: end">


                                            <input class="form-control btn btn-primary" type="submit" required
                                                name="rate" id="" value="Submit" />
                                        </div>

                                    </div>
                                </div>
                            </div>



                        </div>
                    </div>
                </div>


                <div class="col-lg-3">
                    <div class="card">
                        <div class="summary">
                            <p>

                            <h4 class="summary_btn" type="button" data-toggle="collapse" data-target="#collapseExample"
                                aria-expanded="false" aria-controls="collapseExample">
                                Summary
                            </h4>

                            </p>
                            <div class="collapse" id="collapseExample">
                                <div class="card card-body">
                                    <a href="javascript:void(0)" class="pb-2">Treatment</a>

                                    <a href="javascript:void(0)" class="pb-2">Medication</a>
                                    <a href="javascript:void(0)" class="pb-2">Lab order</a>
                                    <a href="javascript:void(0)" class="pb-2">Radiology order</a>
                                    <a href="javascript:void(0)" class="pb-2">Investigation</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>

            <br>
            <br>
            <br>
            <br>
            <br>

        </div>
    </div>
@endsection
@section('js_code')
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<script>
    $(document).ready(function() {

        var number = 2;
        var target = 1;
        $('.table_append').click(function() {

            var html =
                '<tr class="remove' + number + '"><td style="width: 152px;"><select data-no="' +
                number +
                '" class="form-control counter_' + number + '" id="treatment_id_' +
                number +
                '"><option>select option</option>@foreach ($Treatment as $list) <option value="{{ $list->id }}">{{ $list->treatments_name }}</option> @endforeach</select></td><td style="width: 144px;"><input class="form-control" type="text" required name="treatment_name" id="tooth_number' +
                number +
                '" class="txt-field" /></td><td><input type="date" value=""/></td><td style="width: 120px;"><input class="form-control" type="text" required name="rate" id="rate' +
                number +
                '" class="txt-field" /></td><td><input class="form-control" type="text" required name="rate" id="" class="txt-field" /></td><td><input class="form-control" type="text" required name="rate" id="" class="txt-field" /></td></tr>';

            if (number >= 2) {
                $(".remove_row").removeAttr('disabled');

            }

            $('.display_data').append(html);


            $('#treatment_id_' + number).on('change', function() {

                var treatment_id = this.value;
                var no = $(this).data('no');
                $.ajax({
                    url: "{{ url('admin/treatment-record') }}",
                    type: 'get',
                    data: {
                        treatment_id: treatment_id
                    },
                    dataType: 'json',
                    success: function(data) {
                        //alert(JSON.stringify(data.rate));

                        $('#rate' + no).val(JSON.stringify(data.rate).replace(/"/g,
                            ''));
                        $('#tooth_number' + no).val(JSON.stringify(data
                            .tooth_number).replace(/"/g, ''));

                    },
                });
            });

            ++number;
            ++target;
        });


        $(".remove_row").click(function() {
            if (target == 2) {
                $(".remove_row").attr("disabled", true);

            }

            $(".remove" + target).remove();
            --number;
            --target;

        });



        $('#treatment_id_1').on('change', function() {
            console.log('number');
            var treatment_id = this.value;
            $.ajax({
                url: "{{ url('admin/treatment-record') }}",
                type: 'get',
                data: {
                    treatment_id: treatment_id
                },
                dataType: 'json',
                success: function(data) {

                    $('#tooth_number').val(JSON.stringify(data.tooth_number).replace(/"/g,
                        ''));
                    $('#rate').val(JSON.stringify(data.rate).replace(/"/g, ''));



                },
            });

        });

    });

    $(document).ready(function() {

        var counter = 1;

        $('.procedure_append').click(function() {
            var procedure =
                '<span id="counter_' + counter +
                '"><div class="row"><div class="col-lg-6"><select onchange="procedureValue(' + counter +
                ')" id="procedureValue" class="form-control mt-3"><option>select option</option> @foreach ($procedures as $list)<option value="{{ $list->id }}">{{ $list->name }}</option>@endforeach</select></div><div class="col-lg-6 procedure_tooth_wrapper' +
                counter +
                '">Tooth Number    <input class="form-control" type="text" required name="procedure_tooth_number" id="procedure_tooth_number" class="txt-field" /></div></div><button type="button" class="mt-3 btn btn-sm btn-danger" id="procedure_deleted" onclick="myFunction(' +
                counter + ')">deleted row</button></span>';

            $('.display_procedures').append(procedure);
            $('.procedure_tooth_wrapper' + counter).css('display', 'none');
            counter++;
        });

    });

    function myFunction(id) {
        alert(id);
        //  $('.procedure_tooth_wrapper1').css('display','block');
        // alert(id);
        $('#counter_' + id).remove();
    }

    function procedureValue(id) {
        $('.procedure_tooth_wrapper' + id).css('display', 'block');
    }




    $(document).ready(function() {
        $(".summary_btn").click(function() {
            var summary = $(".summary #collapseExample").attr('show');

        });



        var medication_counter = 1;

        $(".medication_append").click(function() {

            var html = '<tr class="medication_' + medication_counter++ + '">' +
                '<td style="width: 12%;">' +
                '<select class="form-control" id="treatment_id_1" data-id="1">' +
                '@foreach ($medications as $get_med)' +
                '<option value="{{ $get_med->id }}">{{ $get_med->name }}</option>' +
                '@endforeach' +
                '</select>' +
                '</td>' +
                '<td>' +
                '<input class="form-control" type="text" required name="treatment_name" id="tooth_number" class="txt-field" />' +
                '<br>' +
                '<select class="form-control" id="treatment_id_1" data-id="1">' +
                '<option value="">Select</option>' +
                '<option value="day(s)">Day(s)</option>' +
                '<option value="week(s)">Week(s)</option>' +
                '<option value="month(s)">Month(s)</option>' +
                '<option value="Continuously">Continuously</option>' +
                '<option value="When Required">When Required</option>' +
                '<option value="STAT">STAT</option>' +
                '<option value="PRN">PRN</option>' +
                '</select>' +
                '</td>' +
                '<td>' +
                '<input class="form-control" type="text" required name="treatment_name" id="tooth_number" class="txt-field" />' +
                '<br>' +
                '<select class="form-control" id="treatment_id_1" data-id="1">' +
                '<option>select option</option>' +
                '<option value="Capsule(s)">Capsule(s)</option>' +
                '<option value="Tablet(s)">Tablet(s)</option>' +
                '<option value="ml">ml</option>' +
                '<option value="IU">IU</option>' +
                '<option value="Drop">Drop</option>' +
                '<option value="Tablespoon">Tablespoon</option>' +
                '<option value="Teaspoon">Teaspoon</option>' +
                '<option value="Unit(s)">Unit(s)</option>' +
                '<option value="Puff(s)">Puff(s)</option>' +
                '<option value="Injection">Injection</option>' +
                '<option value="Dose Step">Dose Step</option>' +
                '<option value="Sachet">Sachet</option>' +
                '<option value="ml/h">ml/h</option>' +
                '<option value="Units/kg">Units/kg</option>' +
                '</select>' +
                '</td>' +
                '<td>' +
                '<select class="form-control" id="treatment_id_1" data-id="1">' +
                '<option>Select</option>' +
                '<option value="oral">Oral</option>' +
                '<option value="intramuscular">Intramuscular</option>' +
                '<option value="nasal">Nasal</option>' +
                '<option value="intravenous">Intravenous</option>' +
                '<option value="topical">Topical</option>' +
                '<option value="intraosseous">Intraosseous</option>' +
                '<option value="intrathecal">Intrathecal</option>' +
                '<option value="intraperitoneal">Intraperitoneal</option>' +
                '<option value="intradermal">Intradermal</option>' +
                '<option value="nasogastric">Nasogastric</option>' +
                '<option value="sublingual">Sublingual</option>' +
                '<option value="per_rectum">Per Rectum</option>' +
                '<option value="subcutaneous">Subcutaneous</option>' +
                '<option value="per_vaginal">Per Vaginal</option>' +
                '<option value="inhalation">Inhalation</option>' +
                '<option value="intraocular">Intraocular</option>' +
                '</select>' +
                '</td>' +
                '<td style="width: 17%;">' +
                '<select class="form-control" id="treatment_id_1" data-id="1">' +
                '<option>select option</option>' +
                '<option value="51">Only Once</option>' +
                '<option value="52">Once a day</option>' +
                '<option value="53">Twice a day</option>' +
                '<option value="54">Thrice a day</option>' +
                '<option value="55">Four times a day</option>' +
                '<option value="56">Before Bed</option>' +
                '<option value="57">Every hour</option>' +
                '<option value="58">Every 2 hours</option>' +
                '<option value="59">Every 3 hours</option>' +
                '<option value="60">Every 4 hours</option>' +
                '<option value="61">Every 6 hours</option>' +
                '<option value="62">Every 8 hours</option>' +
                '<option value="63">Every 12 hours</option>' +
                '<option value="64">Every Other day</option>' +
                '<option value="65">Every 3 Days</option>' +
                '<option value="66">Once a week</option>' +
                '<option value="67">Twice a week</option>' +
                '<option value="68">Thrice a week</option>' +
                '<option value="69">Every 10 Days</option>' +
                '<option value="70">Every 15 Days</option>' +
                '<option value="71">Once a Month</option>' +
                '<option value="72">Once 3 Months</option>' +
                '<option value="73">Once a Year</option>' +
                '<option value="74">Every Morning</option>' +
                '<option value="75">Every Evening</option>' +
                '<option value="76">Every Night</option>' +
                '<option value="77">If needed</option>' +
                '<option value="78">Before Breakfast</option>' +
                '<option value="79">Continuously</option>' +
                '<option value="80">Before Lunch</option>' +
                '<option value="81">After Lunch</option>' +
                '<option value="82">Before Meal</option>' +
                '<option value="83">After Meal</option>' +
                '<option value="84">Before Dinner</option>' +
                '<option value="85">After Dinner</option>' +
                '<option value="86">As Advised</option>' +
                '<option value="87">Twice a month</option>' +
                '<option value="88">After Breakfast</option>' +
                '<option value="89">Before Breakfast and Lunch</option>' +
                '<option value="90">Before Lunch and Dinner</option>' +
                '<option value="91">Before breakfast and dinner</option>' +
                '<option value="92">After Breakfast and Lunch</option>' +
                '<option value="93">After Lunch and Dinner</option>' +
                '<option value="94">After breakfast and dinner</option>' +
                '<option value="95">Before Breakfast, Lunch &amp; Dinner</option>' +
                '<option value="96">After Breakfast, Lunch &amp; Dinner</option>' +
                '<option value="492">at noon</option>' +
                '<option value="493">noon and evening</option>' +
                '<option value="494">morning, evening, night</option>' +
                '<option value="495">Morning and noon</option>' +
                '<option value="496">at 6 am, 10 am, 2pm, 6 pm, 10 pm</option>' +
                '<option value="497">Thrice a day for 21 days, then only at night for next 2 months</option>' +
                '<option value="498">Twice a day for 21 days, then only at night for next 2 months</option>' +
                '<option value="499">Twice a day for 21 days, then onwards for next two months take 1 capsule by skipping 1 day</option>' +
                '<option value="500">Twice a week after dialysis</option>' +
                '<option value="501">Thrice a week after dialysis</option>' +
                '<option value="502">After dialysis in double lumen</option>' +
                '<option value="503">At the start of dialysis</option>' +
                '<option value="504">During dialysis</option>' +
                '<option value="505">Before dialysis</option>' +
                '<option value="506">First injection now, then after 1 month , next at 2 months end, 3rd injection at 6 months end</option>' +
                '<option value="507">Once in a year</option>' +
                '<option value="508">One injection now, next after a month</option>' +
                '<option value="509">One injection now, one after a month, next after 6 months.</option>' +
                '</select>' +
                '</td>' +
                '<td>' +
                '<select class="form-control" id="treatment_id_1" data-id="1">' +
                '<option value="">Select</option>' +
                '<option value="select_intake">Select Intake</option>' +
                '<option value="oral">Oral</option>' +
                '<option value="intramuscular">Intramuscular</option>' +
                '<option value="nasal">Nasal</option>' +
                '<option value="intravenous">Intravenous</option>' +
                '<option value="topical">Topical</option>' +
                '<option value="intraosseous">Intraosseous</option>' +
                '<option value="intrathecal">Intrathecal</option>' +
                '<option value="intraperitoneal">Intraperitoneal</option>' +
                '<option value="intradermal">Intradermal</option>' +
                '<option value="nasogastric">Nasogastric</option>' +
                '<option value="sublingual">Sublingual</option>' +
                '<option value="per_rectum">Per Rectum</option>' +
                '<option value="subcutaneous">Subcutaneous</option>' +
                '<option value="per_vaginal">Per Vaginal</option>' +
                '<option value="inhalation">Inhalation</option>' +
                '<option value="intraocular">Intraocular</option>' +
                '</select>' +
                '</td>' +

                '</tr>';


            $('.medication_display').append(html);
            if (medication_counter >= 2) {
                $(".medication_remove").removeAttr('disabled');

            }
        });




        $(".medication_remove").click(function() {
            if (medication_counter == 2) {
                $(this).attr("disabled", true);

            }
            $('.medication_' + --medication_counter).remove();


        });


        var investigation = 1;
        $(".investigation_append").click(function() {
            // Example code to append the HTML content using jQuery
            var dynamicRowHtml = '<tr class="investigation_row' + investigation + '">' +
                '<td style="width: 12%;">' +
                '<select class="form-control" id="treatment_id_1" data-id="1">' +
                '@foreach ($medications as $get_med)' +
                '<option value="{{ $get_med->id }}">{{ $get_med->name }}</option>' +
                '@endforeach' +
                '</select>' +
                '</td>' +
                '<td>' +
                '<input class="form-control" type="text" required name="treatment_name" id="tooth_number" class="txt-field" />' +
                '</td>' +
                '<td>' +
                '<input class="form-control" type="text" required name="treatment_name" id="tooth_number" class="txt-field" />' +
                '</td>' +
                '<td>' +
                '<div>' +
                '<label>Medication Notes:</label>' +
                '<textarea name="description" class="form-control"></textarea>' +
                '</div>' +
                '</td>' +
                '</tr>';

            $('.investigation_display').append(dynamicRowHtml);
            if (investigation == 1) {
                $(".investigation_remove").removeAttr('disabled');

            }
            alert(investigation);
            investigation++;


        });
        $(".investigation_remove").click(function() {
            if (investigation == 2) {
                $(this).attr("disabled", true);

            }
            $('.investigation_row' + --investigation).remove();


        });


    });

    function laborder() {

        let laborder = $("#laborder").val();

        $.ajax({
            url: "{{ url('admin/laborder-search') }}",
            type: 'get',
            data: {
                laborder: laborder
            },

            success: function(data) {

                $('#sublaborders').html(data);


            },
        });
    }
</script>
