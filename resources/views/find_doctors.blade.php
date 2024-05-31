@extends('design.template')
@section('title', 'Shah Dental | Find Doctors')
@section('customCSS')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="{{ url('public/css/Doc_Profile_Page.css') }}">
    {{-- <link rel="stylesheet" href="{{ url('public/css/Our-Speciality.css') }}"> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script> --}}
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"
        integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>

    <style>
        .doc-profile-btn {
            position: absolute;
            top: -10px;
            right: -20px;
            text-transform: capitalize;
            text-decoration: none;
            color: #fff;
            padding: 5px 10px;
            background-color: transparent;
            border: 1px solid #264e71;
            border-radius: 6px;
            font-size: 13px;
            display: inline-block;
            margin: 10px 0px;
            float: left;
        }

        .doc-card-img h5 {
            color: #000;
        }

        .gender_feild {
            margin-left: 30px;
        }

        .show-doc-card-content h5 {
            color: #fff !important;
        }

        /* Form Search CSS */
        /* Custom CSS for gender buttons */
        .gender-btn {
            margin: 5px;
            padding: 10px 20px;
            border: none;
            background-color: #007bff;
            color: white;
            cursor: pointer;
        }

        .gender-btn:hover {
            background-color: #0056b3;
        }
    </style>
@endsection

@section('header-main')
    {{-- @include('design.header-main') --}}
    @include('inc.inner-header-header')

@endsection

@section('content')
    <section class="reh-find-doc">
        <div class="container">
            <div class="header-sec find-doc-form-sec">
                <h1>Find Doctors</h1>
                <div class="find-form-div">
                <form action="" class="find-doc-form">
                    <div class="row">

                        <div class="col-lg-5 col-md-5 col-sm-12 col-12 side-bar-search">
                            <label for="Srch-doc">Search Doctor Name & Speciality</label><br>
                            <div class="search">
                                <input type="text" id="input_doctor_search" class="form-control"
                                    onkeyup="find_doctors_search()" placeholder="Search Doctor Name & Speciality">
                            </div>
                        </div>
                        {{-- <div class="col-lg-5 col-md-5 col-sm-12 col-12">
                            <div class="gender_feild">
                                <label for="Srch-doc">Gender</label><br>
                                <button class="gender-btn" id="male-btn" type="button">Male</button>
                                <button class="gender-btn" id="female-btn" type="button">Female</button>
                            </div>
                        </div> --}}
                        <div class="col-lg-5 col-md-5 col-sm-12 col-12">
                            <label for="Srch-doc">Gender</label><br>
                            <button class="gender-btn" id="male-btn" type="button">Male</button>
                            <button class="gender-btn" id="female-btn" type="button">Female</button>
                        </div>

                    </div>
                </form>
                </div>
                {{-- <form id="doctor-search-form">
                    <div class="row" style="align-items: center;">
                        <div class="col-lg-5 col-md-5 col-sm-12 col-12">
                            <label for="input_doctor_search">Search Doctor Name & Speciality</label><br>
                            <input type="text" id="input_doctor_search" class="form-control"
                                onkeyup="find_doctors_search()" placeholder="Search Doctor Name & Speciality">
                        </div>
                    </div>
                </form> --}}
            </div>
        </div>
    </section>
    <section class="main-content-section" id="main-content-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                    <ul id="doctor-list" class="doc-card-u-list">
                        @foreach ($doctors as $doc)
                            <li>
                                <div class="row doc-card-content">
                                    <div class="col-lg-6 doc-card-img">
                                        <img style="border-radius: 98%; height:120px!important; width:130px !important;margin-bottom:10px"
                                            {{-- src="{{ asset("profile_image/$doc->profile_image") }}" alt=""> --}}
                                            src="{{ url("public/profile_image/$doc->profile_image") }}" alt="">
                                        <br>
                                        @foreach ($doc->user_role as $user_role)
                                            <h5>{{ $user_role->name }}</h5>
                                        @endforeach
                                    </div>
                                    <div class="col-lg-6 doc-card-info" style="display: none;">
                                        <h6>Degree</h6>
                                        <h5>{{ $doc->education }}</h5>
                                        <h6>Speciality</h6>
                                        @foreach ($doc->doctor_specaility as $doctor_specaility)
                                            @foreach ($doctor_specaility->specialities_list as $specialities_record)
                                                <h5>{{ $specialities_record->speciality }}</h5>
                                            @endforeach
                                        @endforeach
                                        @foreach ($doc->user_role as $user_role)
                                            <a href="{{ url("/doctor_profile/$user_role->id") }}"
                                                class="doc-profile-btn">Veiw
                                                Profile</a>
                                            <a style="margin-top:40px;" href="{{ url("/get_appointment/$user_role->id") }}"
                                                class="doc-profile-btn">Get An Appointment
                                            </a>
                                        @endforeach
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('footer-main')
    @include('design.footer-main')
@endsection
@section('script')
    <script>
        // function find_doctors_search() {
        //     var search = $('#input_doctor_search').val();
        //     $.ajax({
        //         url: "{{ url('/find_doctors_search') }}",
        //         type: 'GET',
        //         data: {
        //             search: search
        //         },
        //         dataType: 'json',
        //         success: function(data) {
        //             var html = '';
        //             $.each(data, function(index, doctor) {
        //                 if (doctor.user_role && doctor.user_role[0] && doctor.user_role[0].name) {
        //                     html += '<li>';
        //                     html += '<div class="row doc-card-content">';
        //                     html += '<div class="col-lg-6 doc-card-img">';
        //                     html +=
        //                         '<img style="border-radius: 98%;height:120px!important; width:130px !important;margin-bottom:10px" src="{{ url('public/profile_image/') }}/' +
        //                         doctor.profile_image + '" alt="">';
        //                     html += '<br>';
        //                     html += '<h5> ' + doctor.user_role[0].name + '</h5>';
        //                     html += '</div>';
        //                     html += '<div class="col-lg-6 doc-card-info" style="display: none;">';
        //                     html += '<h6>Degree</h6>';
        //                     html += '<h5>' + doctor.education + '</h5>';
        //                     html += '<h6>Speciality</h6>';
        //                     $.each(doctor.doctor_specaility, function(index,
        //                         doctor_specaility) {
        //                         $.each(doctor_specaility.specialities_list, function(
        //                             index,
        //                             specialty_record) {
        //                             html += '<h5>' + specialty_record
        //                                 .speciality + '</h5>';
        //                         });
        //                     });
        //                     html += '<a href="/doctor_profile/' + doctor.user_role[0].id +
        //                         '" class="doc-profile-btn">View Profile</a>';
        //                     html += '<a href="/get_appointment/' +
        //                         doctor.user_role[0].id +
        //                         '" style="margin-top:40px;" class="doc-profile-btn">Get An Appointment</a>';
        //                     html += '</div>';
        //                     html += '</div>';
        //                     html += '</li>';
        //                 }
        //             });
        //             var doctorList = $('#doctor-list');
        //             if (html === '') {
        //                 html = '<li>No doctors found.</li>';
        //             }
        //             doctorList.html(html);
        //         }
        //     });
        // }
        // $(document).on('click', '#male-btn', function() {
        //     var search = "1";
        //     $.ajax({
        //         url: "/male_filter",
        //         type: 'GET',
        //         data: {
        //             search: search
        //         },
        //         dataType: 'json',
        //         success: function(data) {
        //             var html = '';
        //             $.each(data, function(index, doctor) {
        //                 if (doctor.user_role && doctor.user_role[0] && doctor.user_role[0]
        //                     .name) {
        //                     html += '<li>';
        //                     html += '<div class="row doc-card-content">';
        //                     html += '<div class="col-lg-6 doc-card-img">';
        //                     html +=
        //                         '<img style="border-radius: 98%;height:120px!important; width:130px !important;margin-bottom:10px" src="{{ url('public/profile_image/') }}/' +
        //                         doctor.profile_image + '" alt="">';
        //                     html += '<br>';
        //                     html += '<h5> ' + doctor.user_role[0].name + '</h5>';
        //                     html += '</div>';
        //                     html +=
        //                         '<div class="col-lg-6 doc-card-info" style="display: none;">';
        //                     html += '<h6>Degree</h6>';
        //                     html += '<h5>' + doctor.education + '</h5>';
        //                     html += '<h6>Specialty</h6>';
        //                     $.each(doctor.doctor_specaility, function(index,
        //                         doctor_specaility) {
        //                         $.each(doctor_specaility.specialities_list, function(
        //                             index,
        //                             specialty_record) {
        //                             html += '<h5>' + specialty_record
        //                                 .speciality + '</h5>';
        //                         });
        //                     });
        //                     html += '<a href="/doctor_profile/' + doctor.user_role[0].id +
        //                         '" class="doc-profile-btn">View Profile</a>';
        //                     html += '<a href="/get_appointment/' + doctor.user_role[0].id +
        //                         '" style="margin-top:40px;" class="doc-profile-btn">Get An Appointment</a>';
        //                     html += '</div>';
        //                     html += '</div>';
        //                     html += '</li>';
        //                 }
        //             });
        //             var doctorList = $('#doctor-list');
        //             if (html === '') {
        //                 html = '<li>No doctors found.</li>';
        //             }
        //             doctorList.html(html);
        //         }
        //     });
        // });
        // $(document).on('click', '#female-btn', function() {
        //     var search = "0";
        //     $.ajax({
        //         url: "/male_filter",
        //         type: 'GET',
        //         data: {
        //             search: search
        //         },
        //         dataType: 'json',
        //         success: function(data) {
        //             var html = '';
        //             $.each(data, function(index, doctor) {
        //                 if (doctor.user_role && doctor.user_role[0] && doctor.user_role[0]
        //                     .name) {
        //                     html += '<li>';
        //                     html += '<div class="row doc-card-content">';
        //                     html += '<div class="col-lg-6 doc-card-img">';
        //                     html +=
        //                         '<img style="border-radius: 98%;height:120px!important; width:130px !important;margin-bottom:10px" src="{{ asset('profile_image/') }}/' +
        //                         doctor.profile_image + '" alt="">';
        //                     html += '<br>';
        //                     html += '<h5> ' + doctor.user_role[0].name + '</h5>';
        //                     html += '</div>';
        //                     html +=
        //                         '<div class="col-lg-6 doc-card-info" style="display: none;">';
        //                     html += '<h6>Degree</h6>';
        //                     html += '<h5>' + doctor.education + '</h5>';
        //                     html += '<h6>Speciality</h6>';
        //                     $.each(doctor.doctor_specaility, function(index,
        //                         doctor_specaility) {
        //                         $.each(doctor_specaility.specialities_list, function(
        //                             index,
        //                             specialty_record) {
        //                             html += '<h5>' + specialty_record
        //                                 .speciality + '</h5>';
        //                         });
        //                     });
        //                     html += '<a href="/doctor_profile/' + doctor.user_role[0].id +
        //                         '" class="doc-profile-btn">View Profile</a>';
        //                     html += '<a href="/get_appointment/' +
        //                         doctor.user_role[0].id +
        //                         '" style="margin-top:40px;" class="doc-profile-btn">Get An Appointment</a>';
        //                     html += '</div>';
        //                     html += '</div>';
        //                     html += '</li>';
        //                 }
        //             });
        //             var doctorList = $('#doctor-list');
        //             if (html === '') {
        //                 html = '<li>No doctors found.</li>';
        //             }
        //             doctorList.html(html);
        //         }
        //     });
        // });
        function fetchDoctors(search, gender) {
            $.ajax({
                // url: "/male_filter",
                // url: "Shah_Dental/find_doctors_search",
                url: "{{ url('/find_doctors_search') }}",

                type: 'GET',
                data: {
                    search: search,
                    gender: gender
                },
                dataType: 'json',
                success: function(data) {
                    var html = '';
                    // $.each(data, function(index, doctor) {
                    //     if (doctor.user_role && doctor.user_role[0] && doctor.user_role[0].name) {
                    //         html += '<li>';
                    //         html += '<div class="row doc-card-content">';
                    //         html += '<div class="col-lg-6 doc-card-img">';
                    //         html +=
                    //             '<img style="border-radius: 98%;height:120px!important; width:130px !important;margin-bottom:10px" src="/public/profile_image/' +
                    //             doctor.profile_image + '" alt="">';
                    //         html += '<br>';
                    //         html += '<h5>' + doctor.user_role[0].name + '</h5>';
                    //         html += '</div>';
                    //         html += '<div class="col-lg-6 doc-card-info">';
                    //         html += '<h6>Degree</h6>';
                    //         html += '<h5>' + doctor.education + '</h5>';
                    //         html += '<h6>Specialty</h6>';
                    //         $.each(doctor.doctor_specaility, function(index, doctor_specaility) {
                    //             $.each(doctor_specaility.specialities_list, function(index,
                    //                 specialty_record) {
                    //                 html += '<h5>' + specialty_record.speciality +
                    //                     '</h5>';
                    //             });
                    //         });
                    //         html += '<a href="/doctor_profile/' + doctor.user_role[0].id +
                    //             '" class="doc-profile-btn">View Profile</a>';
                    //         html += '<a href="/get_appointment/' + doctor.user_role[0].id +
                    //             '" style="margin-top:40px;" class="doc-profile-btn">Get An Appointment</a>';
                    //         html += '</div>';
                    //         html += '</div>';
                    //         html += '</li>';
                    //     }
                    // });

                                $.each(data, function(index, doctor) {
                                    if (doctor.user_role && doctor.user_role[0] && doctor.user_role[0].name) {
                                        html += '<li>';
                                        html += '<div class="row doc-card-content">';
                                        html += '<div class="col-lg-6 doc-card-img">';
                                        html +=
                                            '<img style="border-radius: 98%;height:120px!important; width:130px !important;margin-bottom:10px" src="{{ url('public/profile_image/') }}/' +
                                            doctor.profile_image + '" alt="">';
                                        html += '<br>';
                                        html += '<h5> ' + doctor.user_role[0].name + '</h5>';
                                        html += '</div>';
                                        html += '<div class="col-lg-6 doc-card-info" style="display: none;">';
                                        html += '<h6>Degree</h6>';
                                        html += '<h5>' + doctor.education + '</h5>';
                                        html += '<h6>Speciality</h6>';
                                        $.each(doctor.doctor_specaility, function(index,
                                            doctor_specaility) {
                                            $.each(doctor_specaility.specialities_list, function(
                                                index,
                                                specialty_record) {
                                                html += '<h5>' + specialty_record
                                                    .speciality + '</h5>';
                                            });
                                        });
                                        html += '<a href="/doctor_profile/' + doctor.user_role[0].id +
                                            '" class="doc-profile-btn">View Profile</a>';
                                        html += '<a href="/get_appointment/' +
                                            doctor.user_role[0].id +
                                            '" style="margin-top:40px;" class="doc-profile-btn">Get An Appointment</a>';
                                        html += '</div>';
                                        html += '</div>';
                                        html += '</li>';
                                    }
                                });
                    if (html === '') {
                        html = '<li>No doctors found.</li>';
                    }
                    $('#doctor-list').html(html);
                }
            });
        }

        $(document).on('click', '#male-btn', function() {
            fetchDoctors($("#input_doctor_search").val(), "0");
        });

        $(document).on('click', '#female-btn', function() {
            fetchDoctors($("#input_doctor_search").val(), "1");
        });

        $('#input_doctor_search').on('keyup', function() {
            fetchDoctors($(this).val(), "");
        });

        $(document).on('mouseleave', '.doc-card-content', function() {
            $(this).closest('.doc-card-content').removeClass('show-doc-card-content');
            $(this).closest('.doc-card-content').css('position', 'inherits');
            $(this).closest('.doc-card-content').css('margin-left', '0px');
            $(this).closest('.doc-card-content img').css('margin-bottom', '0px');
            $(this).closest('.doc-card-content').css('z-index', '0');
            $('.doc-card-info').hide();
            $(this).closest('.doc-card-content').css('background-color', 'transparent');
        })

        $(document).on('mouseenter', '.doc-card-img img', function() {
            $(this).closest('.doc-card-content').addClass('show-doc-card-content');
            $(this).closest('.doc-card-content').css('background-color', '#0d3a61');
            $(this).closest('.doc-card-content').css('position', 'relative');
            $(this).closest('.doc-card-content').css('margin-left', '-100px');
            $(this).closest('.doc-card-content img').css('margin-bottom', '10px');
            $(this).closest('.doc-card-content').css('z-index', '999');
            $(this).closest('.doc-card-content h5').css('color', '#fff');
            $(this).parent().next().show();
        })
    </script>

@endsection

{{-- <section>
    <div class="container">
        <div class="header-sec">
            <form action="">
                <div class="row" style="align-items: center;">

                    <div class="col-lg-5 col-md-5 col-sm-12 col-12 side-bar-search">
                        <label for="Srch-doc">Search Doctor Name & Speciality</label><br>
                        <div class="search">
                            <input type="text" id="input_doctor_search" class="form-control"
                                onkeyup="find_doctors_search()" placeholder="Search Doctor Name & Speciality">
                        </div>
                    </div>
                    <div class="col-lg-5 col-md-5 col-sm-12 col-12">
                        <div class="gender_feild">
                            <label for="Srch-doc">Gender</label><br>
                            <button class="gender-btn" id="male-btn" type="button">Male</button>
                            <button class="gender-btn" id="female-btn" type="button">Female</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
<section class="main-content-section" id="main-content-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                <ul id="doctor-list" class="doc-card-u-list">
                    @foreach ($doctors as $doc)
                        <li>
                            <div class="row doc-card-content">
                                <div class="col-lg-6 doc-card-img">
                                    <img style="border-radius: 98%; height:120px!important; width:130px !important;margin-bottom:10px"
                                        src="{{ asset("profile_image/$doc->profile_image") }}" alt="">
                                    <br>
                                    @foreach ($doc->user_role as $user_role)
                                        <h5>{{ $user_role->name }}</h5>
                                    @endforeach
                                </div>
                                <div class="col-lg-6 doc-card-info" style="display: none;">
                                    <h6>Degree</h6>
                                    <h5>{{ $doc->education }}</h5>
                                    <h6>Speciality</h6>
                                    @foreach ($doc->doctor_specaility as $doctor_specaility)
                                        @foreach ($doctor_specaility->specialities_list as $specialities_record)
                                            <h5>{{ $specialities_record->speciality }}</h5>
                                        @endforeach
                                    @endforeach
                                    @foreach ($doc->user_role as $user_role)
                                        <a href="{{ url("/doctor_profile/$user_role->id") }}"
                                            class="doc-profile-btn">Veiw
                                            Profile</a>
                                        <a style="margin-top:40px;" href="{{ url("/get_appointment/$user_role->id") }}"
                                            class="doc-profile-btn">Get An Appointment
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</section>


<script>
    function find_doctors_search() {
        var search = $('#input_doctor_search').val();
        $.ajax({
            url: "{{ url('/find_doctors_search') }}",
            type: 'GET',
            data: {
                search: search
            },
            dataType: 'json',
            success: function(data) {
                var html = '';
                $.each(data, function(index, doctor) {
                    if (doctor.user_role && doctor.user_role[0] && doctor.user_role[0].name) {
                        html += '<li>';
                        html += '<div class="row doc-card-content">';
                        html += '<div class="col-lg-6 doc-card-img">';
                        html +=
                            '<img style="border-radius: 98%;height:120px!important; width:130px !important;margin-bottom:10px" src="{{ asset('profile_image/') }}/' +
                            doctor.profile_image + '" alt="">';
                        html += '<br>';
                        html += '<h5> ' + doctor.user_role[0].name + '</h5>';
                        html += '</div>';
                        html += '<div class="col-lg-6 doc-card-info" style="display: none;">';
                        html += '<h6>Degree</h6>';
                        html += '<h5>' + doctor.education + '</h5>';
                        html += '<h6>Speciality</h6>';
                        $.each(doctor.doctor_specaility, function(index,
                            doctor_specaility) {
                            $.each(doctor_specaility.specialities_list, function(
                                index,
                                specialty_record) {
                                html += '<h5>' + specialty_record
                                    .speciality + '</h5>';
                            });
                        });
                        html += '<a href="/doctor_profile/' + doctor.user_role[0].id +
                            '" class="doc-profile-btn">View Profile</a>';
                        html += '<a href="/get_appointment/' +
                            doctor.user_role[0].id +
                            '" style="margin-top:40px;" class="doc-profile-btn">Get An Appointment</a>';
                        html += '</div>';
                        html += '</div>';
                        html += '</li>';
                    }
                });
                var doctorList = $('#doctor-list');
                if (html === '') {
                    html = '<li>No doctors found.</li>';
                }
                doctorList.html(html);
            }
        });
    }

    $(document).on('click', '#male-btn', function() {
        var search = "1";
        $.ajax({
            url: "/male_filter",
            type: 'GET',
            data: {
                search: search
            },
            dataType: 'json',
            success: function(data) {
                var html = '';
                $.each(data, function(index, doctor) {
                    if (doctor.user_role && doctor.user_role[0] && doctor.user_role[0]
                        .name) {
                        html += '<li>';
                        html += '<div class="row doc-card-content">';
                        html += '<div class="col-lg-6 doc-card-img">';
                        html +=
                            '<img style="border-radius: 98%;height:120px!important; width:130px !important;margin-bottom:10px" src="{{ asset('profile_image/') }}/' +
                            doctor.profile_image + '" alt="">';
                        html += '<br>';
                        html += '<h5> ' + doctor.user_role[0].name + '</h5>';
                        html += '</div>';
                        html +=
                            '<div class="col-lg-6 doc-card-info" style="display: none;">';
                        html += '<h6>Degree</h6>';
                        html += '<h5>' + doctor.education + '</h5>';
                        html += '<h6>Specialty</h6>';
                        $.each(doctor.doctor_specaility, function(index,
                            doctor_specaility) {
                            $.each(doctor_specaility.specialities_list, function(
                                index,
                                specialty_record) {
                                html += '<h5>' + specialty_record
                                    .speciality + '</h5>';
                            });
                        });
                        html += '<a href="/doctor_profile/' + doctor.user_role[0].id +
                            '" class="doc-profile-btn">View Profile</a>';
                        html += '<a href="/get_appointment/' + doctor.user_role[0].id +
                            '" style="margin-top:40px;" class="doc-profile-btn">Get An Appointment</a>';
                        html += '</div>';
                        html += '</div>';
                        html += '</li>';
                    }
                });
                var doctorList = $('#doctor-list');
                if (html === '') {
                    html = '<li>No doctors found.</li>';
                }
                doctorList.html(html);
            }
        });
    });


    $(document).on('click', '#female-btn', function() {
        var search = "0";
        $.ajax({
            url: "/male_filter",
            type: 'GET',
            data: {
                search: search
            },
            dataType: 'json',
            success: function(data) {
                var html = '';
                $.each(data, function(index, doctor) {
                    if (doctor.user_role && doctor.user_role[0] && doctor.user_role[0]
                        .name) {
                        html += '<li>';
                        html += '<div class="row doc-card-content">';
                        html += '<div class="col-lg-6 doc-card-img">';
                        html +=
                            '<img style="border-radius: 98%;height:120px!important; width:130px !important;margin-bottom:10px" src="{{ asset('profile_image/') }}/' +
                            doctor.profile_image + '" alt="">';
                        html += '<br>';
                        html += '<h5> ' + doctor.user_role[0].name + '</h5>';
                        html += '</div>';
                        html +=
                            '<div class="col-lg-6 doc-card-info" style="display: none;">';
                        html += '<h6>Degree</h6>';
                        html += '<h5>' + doctor.education + '</h5>';
                        html += '<h6>Speciality</h6>';
                        $.each(doctor.doctor_specaility, function(index,
                            doctor_specaility) {
                            $.each(doctor_specaility.specialities_list, function(
                                index,
                                specialty_record) {
                                html += '<h5>' + specialty_record
                                    .speciality + '</h5>';
                            });
                        });
                        html += '<a href="/doctor_profile/' + doctor.user_role[0].id +
                            '" class="doc-profile-btn">View Profile</a>';
                        html += '<a href="/get_appointment/' +
                            doctor.user_role[0].id +
                            '" style="margin-top:40px;" class="doc-profile-btn">Get An Appointment</a>';
                        html += '</div>';
                        html += '</div>';
                        html += '</li>';
                    }
                });
                var doctorList = $('#doctor-list');
                if (html === '') {
                    html = '<li>No doctors found.</li>';
                }
                doctorList.html(html);
            }
        });
    });




    $(document).on('mouseleave', '.doc-card-content', function() {
        $(this).closest('.doc-card-content').removeClass('show-doc-card-content');
        $(this).closest('.doc-card-content').css('position', 'inherits');
        $(this).closest('.doc-card-content').css('margin-left', '0px');
        $(this).closest('.doc-card-content img').css('margin-bottom', '0px');
        $(this).closest('.doc-card-content').css('z-index', '0');
        $('.doc-card-info').hide();
        $(this).closest('.doc-card-content').css('background-color', 'transparent');
    })
    $(document).on('mouseenter', '.doc-card-img img', function() {
        $(this).closest('.doc-card-content').addClass('show-doc-card-content');
        $(this).closest('.doc-card-content').css('background-color', '#0d3a61');
        $(this).closest('.doc-card-content').css('position', 'relative');
        $(this).closest('.doc-card-content').css('margin-left', '-100px');
        $(this).closest('.doc-card-content img').css('margin-bottom', '10px');
        $(this).closest('.doc-card-content').css('z-index', '999');
        $(this).closest('.doc-card-content h5').css('color', '#fff');
        $(this).parent().next().show();
    })
</script>

</body>

</html> --}}
