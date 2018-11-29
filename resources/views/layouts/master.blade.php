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

    <!-- style switcher -->
    <link href="{{ asset('assets/css/style_switcher.min.css') }}" media="all" rel="stylesheet">

    <!-- altair admin -->
    <link rel="stylesheet" href="{{ asset('assets/css/main.min.css') }}" media="all">

    <!-- themes -->
    <link rel="stylesheet" href="{{ asset('assets/css/themes/themes_combined.min.css') }}" media="all">

    <!--- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}" media="all">

    <!-- kendo UI -->
    <link rel="stylesheet" href="{{ asset('bower_components/kendo-ui/styles/kendo.common-material.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('bower_components/kendo-ui/styles/kendo.material.min.css') }}" id="kendoCSS"/>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- matchMedia polyfill for testing media queries in JS -->
    <!--[if lte IE 9]>
    <script type="text/javascript" src="{{ asset('bower_components/matchMedia/matchMedia.js')}}"></script>
    <script type="text/javascript" src="{{ asset('bower_components/matchMedia/matchMedia.addListener.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('assets/css/ie.css') }}" media="all">

    <link rel="stylesheet" href="{{ asset('assets/css/ie.css') }}" media="all">
    <!--[endif]-->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
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


<!-- google web fonts -->
<script>
    WebFontConfig = {
        google: {
            families: [
                'Source+Code+Pro:400,700:latin',
                'Roboto:400,300,500,700,400italic:latin'
            ]
        }
    };
    (function() {
        var wf = document.createElement('script');
        wf.src = ('https:' == document.location.protocol ? 'https' : 'http') +
            '://ajax.googleapis.com/ajax/libs/webfont/1/webfont.js';
        wf.type = 'text/javascript';
        wf.async = 'true';
        var s = document.getElementsByTagName('script')[0];
        s.parentNode.insertBefore(wf, s);
    })();
</script>
<script src="{{ asset('bower_components/jquery/dist/jquery.min.js') }}"></script>
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
{{--<script src="{{ url('backend/assets/js/pages/page_contact_list.min.js') }}"></script>--}}
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

<!--  datatables functions -->
<script src="{{ url('assets/js/pages/plugins_datatables.min.js') }}"></script>

<script src="{{ url('bower_components/ckeditor/ckeditor.js') }} "></script>

<script src="{{ url('assets/js/custom/dropify/dist/js/dropify.min.js') }}"></script>


<!-- kendo UI -->
<script src="{{ asset('assets/js/kendoui_custom.min.js') }}"></script>

<!--  kendoui functions -->
<script src="{{ asset('assets/js/pages/kendoui.min.js') }}"></script>

<script src="{{url('angular/angular.min.js')}}"></script>
@yield('angular')
@yield('script')


</body>
</html>