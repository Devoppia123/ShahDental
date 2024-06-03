@extends('design.template')
@section('title', 'Shah Dental | Site Map')
@section('customCSS')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="{{ asset('css/Our-Speciality.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
@endsection
@section('header-main')
    {{-- @include('design.header-main') --}}
    @include('inc.inner-header-header')

@endsection
@section('content')
    <main>
        <section class="Our-services">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <select name="site" id="site" class="form-control" onchange="redirectToPage()">
                            <option value="1">--Select Option--</option>
                            <option value="1">Dental Service</option>
                            <option value="2">Direction</option>
                            <option value="3">Our Teams</option>
                            <option value="4">Appointments</option>
                            <option value="5">Contact Us</option>
                            <option value="6">Gallery</option>
                            <option value="7">Our Branches</option>
                            <option value="8">Patient Check-in</option>

                        </select>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection

{{-- add script to redirect pages --}}
<script>
    function redirectToPage() {
        var selectElement = document.getElementById('site');
        var selectedValue = selectElement.value;

        switch (selectedValue) {
            case '1':
                window.location.href = '{{ url("/services-treatments") }}';
                break;
            case '2':
                window.location.href = '{{ url("/branch-directions") }}';
                break;
            case '3':
                window.location.href = '{{ url("/our-teams") }}';
                break;
            case '4':
                window.location.href = '{{ url("/make-an-appointment") }}';
                break;
            case '5':
                window.location.href = '{{ url("/contact-us") }}';
                break;
            case '6':
                window.location.href = '{{ url("/gallery") }}';
                break;
            case '7':
                window.location.href = '{{ url("/branch-directions") }}';
                break;
                case '8':
                    // Dynamically create and submit a form
                    var form = document.createElement("form");
                    form.setAttribute("method", "get");
                    form.setAttribute("action", "https://getphr.com/");
                    form.setAttribute("target", "_blank");

                    var hospID = document.createElement("input");
                    hospID.setAttribute("type", "hidden");
                    hospID.setAttribute("name", "hospID");
                    hospID.setAttribute("value", "7");

                    form.appendChild(hospID);
                    document.body.appendChild(form);
                    form.submit();
                    break;
            default:
                break;
        }
    }
</script>
@section('footer-main')
    @include('design.footer-main')
@endsection
@section('script')

@endsection
