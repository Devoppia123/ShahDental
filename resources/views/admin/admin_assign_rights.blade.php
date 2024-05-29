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
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row bg-title">
                <div class="col-sm-12 pb-3">
                    <h4 class="page-title">Assign Rights To {{ $check_user->name }}</h4>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="white-box">
                        <form name="rights" method="post" action="{{ url('admin/doassign_rights') }}">
                            @csrf
                            <input type="hidden" name="user_id" value="{{ $user_id }}" />

                            @foreach ($RoleAssign as $list)
                                @foreach ($list->role_rights as $list2)
                                    <div>
                                        {{ $list2->rights_name }}
                                        <input type="checkbox" name="role_assign_id[]" value="{{ $list->id }}"
                                            id="" @if ($check_assign_right->contains('role_assign_id', $list->id)) checked @endif>
                                    </div>
                                @endforeach
                            @endforeach

                            <button type="submit" class="btn btn-primary btn-sm mt-3">Save</button>

                            <a href="{{ url('/admin/view_staff') }}" class="btn btn-success btn-sm mt-3">Back To Staff</a>

                        </form>

                    </div>
                </div>
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
