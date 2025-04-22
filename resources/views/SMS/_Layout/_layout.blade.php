
<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="UTF-8">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>@yield('title')</title>


    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{asset('sms_assets/modules/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('sms_assets/modules/fontawesome/css/all.min.css')}}">
    <link rel="stylesheet" href="{{ asset('sms_assets/modules/select2/dist/css/select2.min.css')}}">
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('sms_assets/modules/jqvmap/dist/jqvmap.min.css')}}">
    <link rel="stylesheet" href="{{ asset('sms_assets/modules/summernote/summernote-bs4.css')}}">
    <link rel="stylesheet" href="{{ asset('sms_assets/modules/owlcarousel2/dist/assets/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{ asset('sms_assets/modules/owlcarousel2/dist/assets/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{asset('sms_assets/modules/codemirror/lib/codemirror.css')}}">
    <link rel="stylesheet" href="{{asset('sms_assets/modules/codemirror/theme/duotone-dark.css')}}">
    <link rel="stylesheet" href="{{asset('sms_assets/modules/jquery-selectric/selectric.css')}}">

    <link rel="stylesheet" href="{{asset('sms_assets/modules/datatables/datatables.min.css')}}">
    <link rel="stylesheet" href="{{asset('sms_assets/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css')}}">
    {{-- <link rel="stylesheet" href="{{asset('sms_assets/modules/datatables/Select-1.2.4/css/select.bootstrap4.min.css')}}"> --}}
    <link rel="stylesheet" href="{{ asset('main_assets/plugins/select2/css/select2.min.css')}}">
<link rel="stylesheet" href="{{asset('main_assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">

    <link rel="stylesheet" href="{{asset('sms_assets/modules/bootstrap-timepicker/css/bootstrap-timepicker.min.css')}}">


    <!-- Template CSS -->
    <link rel="stylesheet" href="{{asset('sms_assets/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('sms_assets/css/components.css')}}">
    <!-- Start GA -->
    {{-- <script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script> --}}
    {{-- <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-94034622-3');
    </script> --}}
    <!-- /END GA -->
</head>

<body>
<div id="app">
    <div class="main-wrapper main-wrapper-1">
        <div class="navbar-bg"></div>

    @include('SMS._Layout._partials._navbar')

    @include('SMS._Layout._partials._sidebar')

    <!-- Main Content -->
        <div class="main-content">
            @yield('content')
        </div>
        @include('SMS._Layout._partials._footer')
    </div>
</div>

<!-- General JS Scripts -->
<script src="{{asset('sms_assets/modules/jquery.min.js')}}"></script>
<script src="{{asset('sms_assets/modules/popper.js')}}"></script>
<script src="{{asset('sms_assets/modules/tooltip.js')}}"></script>
<script src="{{asset('sms_assets/modules/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{asset('sms_assets/modules/nicescroll/jquery.nicescroll.min.js')}}"></script>
<script src="{{asset('sms_assets/modules/moment.min.js')}}"></script>
<script src="{{asset('sms_assets/js/stisla.js')}}"></script>

<!-- JS Libraies -->
<script src="{{asset('sms_assets/modules/select2/dist/js/select2.full.min.js')}}"></script>
<script src="{{asset('sms_assets/modules/jquery.sparkline.min.js')}}"></script>
<script src="{{asset('sms_assets/modules/chart.min.js')}}"></script>
<script src="{{asset('sms_assets/modules/owlcarousel2/dist/owl.carousel.min.js')}}"></script>
<script src="{{asset('sms_assets/modules/summernote/summernote-bs4.js')}}"></script>
<script src="{{asset('sms_assets/modules/chocolat/dist/js/jquery.chocolat.min.js')}}"></script>
<script src="{{asset('sms_assets/modules/bootstrap-timepicker/js/bootstrap-timepicker.min.js')}}"></script>


<script src="{{asset('sms_assets/modules/codemirror/lib/codemirror.js')}}"></script>
<script src="{{asset('sms_assets/modules/codemirror/mode/javascript/javascript.js')}}"></script>
<script src="{{asset('sms_assets/modules/jquery-selectric/jquery.selectric.min.js')}}"></script>
<script src="{{asset('sms_assets/modules/datatables/datatables.min.js')}}"></script>
<script src="{{asset('sms_assets/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js')}}"></script>

{{-- <script src="{{ asset('main_assets/plugins/select2/js/select2.full.min.js') }}"></script> --}}
{{-- <script src="{{asset('sms_assets/modules/datatables/Select-1.2.4/js/dataTables.select.min.js')}}"></script> --}}
<script src="{{asset('sms_assets/modules/jquery-ui/jquery-ui.min.js')}}"></script>

<!-- Page Specific JS File -->
<script src="{{asset('sms_assets/js/page/modules-datatables.js')}}"></script>
{{--  <script src="{{asset('sms_assets/js/page/forms-advanced-forms.js')}}"></script>--}}

<!-- Template JS File -->
<script src="{{asset('sms_assets/js/scripts.js')}}"></script>

<script src="{{asset('sms_assets/pages/ajax.js')}}"></script>
<script src="{{ asset('sms_assets/pages/profile.js') }}"></script>
<script src="{{ asset('sms_assets/pages/steps.js') }}"></script>
<script src="{{ asset('sms_assets/pages/student-register.js') }}"></script>
<script src="{{asset('sms_assets/pages/submit.js')}}"></script>
<script src="{{asset('sms_assets/pages/scores.js')}}"></script>

@yield('scripts')


</body>
</html>




<!-- JS Libraies -->

<!-- Page Specific JS File -->
