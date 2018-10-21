<!doctype html>
<!--[if lte IE 9]> <html class="lte-ie9" lang="en"> <![endif]-->
<!--[if gt IE 9]><!--> <html lang="en"> <!--<![endif]-->

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="initial-scale=1.0,maximum-scale=1.0,user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Remove Tap Highlight on Windows Phone IE -->
    <meta name="msapplication-tap-highlight" content="no"/>

    <link rel="icon" type="image/png" href="assets/img/favicon-16x16.png" sizes="16x16">
    <link rel="icon" type="image/png" href="assets/img/favicon-32x32.png" sizes="32x32">

    <title> @yield('title')</title>

    @yield('custom_header_top_css')

    <!-- htmleditor (codeMirror) -->
    <link rel="stylesheet" href="{{ asset('bower_components/codemirror/lib/codemirror.css') }}">

    <!-- dropify -->
    <link rel="stylesheet" href="{{ asset('assets/skins/dropify/css/dropify.css') }} ">
    <!-- uikit -->
    <link rel="stylesheet" href="{{ asset('bower_components/uikit/css/uikit.almost-flat.min.css') }} " media="all">

    <!-- flag icons -->
    <link rel="stylesheet" href="{{ asset('assets/icons/flags/flags.min.css') }}" media="all">



    <!-- altair admin -->
    <link rel="stylesheet" href="{{ asset('assets/css/main.min.css') }}" media="all">
    <!--- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}" media="all">

    <!-- themes -->
    <link rel="stylesheet" href="{{ asset('assets/css/themes/themes_combined.min.css') }}" media="all">


    <!-- matchMedia polyfill for testing media queries in JS -->
    <!--[if lte IE 9]>
    <script type="text/javascript" src="{{ asset('bower_components/matchMedia/matchMedia.js')}}"></script>
    <script type="text/javascript" src="{{ asset('bower_components/matchMedia/matchMedia.addListener.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('assets/css/ie.css') }}" media="all">
    <![endif]-->

    @yield('styles')

</head>
<body class="sidebar_main_open sidebar_main_swipe">
@include('layouts.includes.sidebar')
@include('layouts.includes.header')

<div id="page_content">
    <div id="page_content_inner">
        <!-- main content start from here -->

       @yield('content')
        <!-- main content end from here -->

    </div>
</div>

<!-- common functions -->
<script src=" {{ asset('assets/js/common.min.js') }} "></script>
<!-- uikit functions -->
<script src="{{ asset('assets/js/uikit_custom.min.js') }}"></script>
<!-- altair common functions/helpers -->
<script src="{{ asset('assets/js/altair_admin_common.min.js') }}"></script>
<!-- datatables -->

<!-- htmleditor (codeMirror) -->
<script src="{{ asset('assets/js/uikit_htmleditor_custom.min.js') }}"></script>
<!-- inputmask-->
<script src="{{ asset('bower_components/jquery.inputmask/dist/jquery.inputmask.bundle.js') }}"></script>

<!--  forms advanced functions -->
<script src="{{ asset('assets/js/pages/forms_advanced.min.js') }}"></script>

<script src="{{ url('bower_components/datatables/media/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ url('bower_components/datatables-buttons/js/dataTables.buttons.js') }}"></script>
<script src="{{ url('assets/js/custom/datatables/buttons.uikit.js') }}"></script>
<script src="{{ url('bower_components/jszip/dist/jszip.min.js') }}"></script>
<script src="{{ url('bower_components/pdfmake/build/pdfmake.min.js') }}"></script>
<script src="{{ url('bower_components/pdfmake/build/vfs_fonts.js') }}"></script>
<script src="{{ url('bower_components/datatables-buttons/js/buttons.colVis.js') }}"></script>
<script src="{{ url('bower_components/datatables-buttons/js/buttons.html5.js') }}"></script>
<script src="{{ url('bower_components/datatables-buttons/js/buttons.print.js') }}"></script>
<script src="{{ url('assets/js/custom/datatables/datatables.uikit.min.js') }}"></script>
<script src="{{ url('assets/js/pages/plugins_datatables.js') }}"></script>

<script src="{{ url('bower_components/ckeditor/ckeditor.js') }} "></script>

<script src="{{ url('assets/js/custom/dropify/dist/js/dropify.min.js') }}"></script>

@yield('script')






</body>
</html>