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
            <h1>Assign Doctor to Nurse</h1>
            @if (Session::has('message'))
                <div class="alert alert-success">
                    <strong>{{ session('message') }}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            <form action="{{ url('/admin/doassign_doctor_to_nurse') }}" method="post" id="assign_form">
                @csrf
                <input type="hidden" name="nurse_id" value="{{ $nurse_id }}" id="">
                <div class="row">
                    @foreach ($doctors as $doc)
                        <div class="col-md-4">
                            <label>{{ $doc->name }}</label>
                            @php
                                $data = [];
                            @endphp
                            @foreach ($check_assign as $list)
                                @foreach ($list->assign_doctor_to_nurse as $list2)
                                    @php
                                        $data[] = $list2->doctor_id;
                                    @endphp
                                @endforeach
                            @endforeach
                            @if (in_array($doc->id, $data))
                                <input type="checkbox" checked name="doctor_id[]" value="{{ $doc->id }}"
                                    id="">
                            @else
                                <input type="checkbox" name="doctor_id[]" value="{{ $doc->id }}" id="">
                            @endif
                            @error('doctor_id')
                                <p>{{ $message }}</p>
                            @enderror
                        </div>
                    @endforeach
                </div>
                <input type="submit" class="btn btn-info" value="Submit">
                <a class="btn btn-primary" href="{{ url('admin/view_staff') }}">Back To Staff</a>
            </form>
        </div>
    </div>
@endsection
@section('js_code')
    <script>
        $(document).ready(function() {
            $("#assign_form").submit(function(e) {
                var selectedSlot = $('input[name="doctor_id[]"]:checked').val();
                if (!selectedSlot) {
                    e.preventDefault();
                    alert("Please select a doctor.");
                }
            });
        });
    </script>
@endsection
