<!doctype html>
@php
    $locale = getLang();
@endphp
<html lang="{{ str_replace('_', '-', $locale) }}" data-layout="vertical" data-layout-style="default" data-layout-position="fixed"  data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-layout-width="fluid">
<head>
    <meta charset="utf-8" />
    <title> @yield('title') | {{ config('app.name', 'Laravel') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta content="Said Flock Managment System" name="description" />
    <meta content="SaidIT" name="author" />
    @include('layouts.common.head-css')
</head>
<body>

    <!-- Begin page -->
    <div id="layout-wrapper">
        @include('layouts.menus.admin_topbar')
        @include('layouts.menus.admin_sidebar')
        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">
            <div class="page-content">
                <!-- Start content -->
                <div class="container-fluid">
                    @yield('content')
                </div> <!-- content -->
            </div>
            @include('layouts.common.footer')
        </div>
        <!-- ============================================================== -->
        <!-- End Right content here -->
        <!-- ============================================================== -->
    </div>
    <!-- END wrapper -->

    <!-- Right Sidebar -->
    @include('layouts.common.customizer')
    <!-- END Right Sidebar -->
    @include('layouts.common.vendor-scripts')
</body>

</html>
