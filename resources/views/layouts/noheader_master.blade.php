<!doctype html>
@php
    $locale = getLang();
@endphp
<html lang="{{ str_replace('_', '-', $locale) }}" data-layout="vertical" data-layout-style="default"
    data-layout-position="fixed" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-layout-width="fluid"
    data-layout-mode="{{ Auth::user()->theme ?? 'light' }}">

<head>
    <meta charset="UTF-8" />
    {{-- <title> @yield('title') | {{ config('app.name', 'Laravel') }}</title> --}}
    <title> @yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta content="Zeesahn khan software developer" name="description" />
    <meta content="Zeeshan" name="author" />
    @include('layouts.common.head-css')
</head>

<body data-bs-spy="scroll" data-bs-target="#navbar-example">
    <div class="layout-wrapper landing min-vh-100 bg-light">
        <div class="container-fluid">
            @yield('content')
        </div>
    </div>
    <!-- END wrapper -->

    <!-- Right Sidebar -->
    @include('layouts.common.customizer')
    <!-- END Right Sidebar -->
    @include('layouts.common.vendor-scripts')
</body>

</html>
