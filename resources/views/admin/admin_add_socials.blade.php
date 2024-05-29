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
            <h1>Add Socials</h1>
            <div class="row">
                <div class="col-md-12">
                    <div class="white-box">
                        <form class="form-horizontal" method="post" action="{{ url('/admin/doadd_social_links') }}"
                            enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="doctor_id" value="{{ $doctor_id }}">
                            <div>
                                <label>WhatsApp :</label>
                                <input class="form-control" type="text" required name="whatsapp" class="txt-field"
                                    size="35" maxlength="130" />
                            </div>
                            <div>
                                <label>Facebook :</label>
                                <input class="form-control" type="text" required name="facebook" class="txt-field"
                                    size="35" maxlength="130" />
                            </div>
                            <div>
                                <label>Twitter :</label>
                                <input class="form-control" type="text" required name="twitter" class="txt-field"
                                    size="35" maxlength="130" />
                            </div>
                            <div>
                                <label>Linkedin :</label>
                                <input class="form-control" type="text" required name="linkedin" class="txt-field"
                                    size="35" maxlength="130" />
                            </div>
                            <div>
                                <label>
                                    <input type="hidden" name="is_show" value="0">
                                    <input type="checkbox" class="show">
                                    Show On Profile </label>
                            </div>
                            <input class="btn btn-info" style="margin-top: 5px" type="submit" value="Submit">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js_code')
    <script>
        $(document).on('change', '.show', function() {
            if ($(this).is(":checked")) {
                $(this).prev().val(1);
            } else {
                $(this).prev().val(0);
            }
        });
    </script>
@endsection
