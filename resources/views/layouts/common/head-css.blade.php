<!-- App favicon -->
<link rel="shortcut icon" href="{{ URL::asset('build/images/favicon.png') }}">
@yield('css')

{{-- <script src="{{ URL::asset('build/js/jquery.js') }}"></script> --}}
<!--jquery cdn-->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<!-- Layout config Js -->
<script src="{{ URL::asset('build/js/layout.js') }}"></script>
<!-- Bootstrap Css -->
<link href="{{ URL::asset('build/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
<!-- Icons Css -->
<link href="{{ URL::asset('build/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
<!-- App Css-->
@if (app()->getLocale() == 'en')
    <link href="{{ URL::asset('build/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />
@else
    <link href="{{ URL::asset('build/css/app.rtl.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />
@endif
<!-- custom Css-->
<link href="{{ URL::asset('build/css/custom.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />
@if (Auth::check() && Auth::user()->theme == 'dark')
    <style>
        .select2-container--default .select2-results>.select2-results__options {
            color: var(--vz-body-color) !important;
            background-color: var(--vz-input-bg) !important;
        }

        .select2-container--default .select2-selection--single {
            background-color: var(--vz-input-bg) !important;
            border: 1px solid var(--vz-input-border) !important;
        }

        .select2-container--default .select2-selection--single .select2-selection__rendered {
            color: var(--vz-body-color) !important;
        }

        .select2-container--default .select2-selection--multiple {
            background-color: var(--vz-input-bg) !important;
            border: 1px solid var(--vz-input-border) !important;
        }

        .select2-container--default .select2-selection--multiple .select2-selection__rendered {
            color: var(--vz-body-color) !important;
        }
    </style>
@endif
{{-- @yield('css') --}}
<script src="{{ URL::asset('build/libs/sweetalert2/sweetalert2.all.min.js') }}"></script>
<link href="{{ URL::asset('build/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />

<link rel="stylesheet" href="{{ URL::asset('build/libs/@simonwep/pickr/themes/classic.min.css') }}" />
<link rel="stylesheet" href="{{ URL::asset('build/libs/@simonwep/pickr/themes/monolith.min.css') }}" />
<link rel="stylesheet" href="{{ URL::asset('build/libs/@simonwep/pickr/themes/nano.min.css') }}" />

<!-- google fonts cdn-->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Arabic&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Arabic&family=Reem+Kufi:wght@600&display=swap"
    rel="stylesheet">

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet"
    type="text/css" />
{{-- <link href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme/dist/select2-bootstrap-5-theme.min.css"/> --}}

{{-- dataTables --}}
<link href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" rel="stylesheet" type="text/css" />
<link href="https://cdn.datatables.net/select/1.3.4/css/select.dataTables.min.css" rel="stylesheet" type="text/css">
<!--dataTable responsive css-->
<link href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap.min.css" rel="stylesheet"
    type="text/css" />

{{-- <link href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.css" rel="stylesheet" type="text/css" /> --}}

<link href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css" rel="stylesheet" type="text/css" />
{{-- <link href="https://cdn.datatables.net/buttons/3.2.0/css/buttons.dataTables.css" rel="stylesheet" type="text/css" /> --}}

{{-- dataTables end here --}}

<script src="//cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
{{-- <script src="https://cdn.ckeditor.com/ckeditor5/39.0.2/classic/ckeditor.js"></script> --}}
<script>
    $(document).ready(function() {
        $('.editor').each(function() {
            CKEDITOR.replace(this);
            // CKEDITOR.replace(this, {
            //     toolbar: [
            //         ['Bold', 'Italic', 'Underline', 'TextColor', 'BGColor', 'NumberedList',
            //             'BulletedList', 'Link',
            //             'Unlink'
            //         ]
            //     ]
            // });
        });
        // ClassicEditor
        //     .create(document.querySelector('.editor'))
        //     .catch(error => {
        //         console.error(error);
        //     });
    });
</script>
