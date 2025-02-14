@extends('layouts.admin')
@section('title')
    Dashboard
@endsection
@section('css')
    <link href="{{ URL::asset('build/libs/jsvectormap/css/jsvectormap.min.css') }}" rel="stylesheet">
@endsection
@section('content')
    @component('components.breadcrumb')
        @slot('li_1')
            Home
        @endslot
        @slot('li_1_link')
            {{ route('dashboard') }}
        @endslot
        @slot('title')
            Dashboard
        @endslot
    @endcomponent
    <div class="d-flex justify-content-center align-items-center">
        <div class="alert alert-success">
            <h2>Product Management</h2>
        </div>
    </div> <!-- end row-->
@endsection
