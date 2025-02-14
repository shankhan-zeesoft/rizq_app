@extends('layouts.noheader_master')
@section('tilte')
    {{ trans('frontend.Error') }} 403
@endsection
@section('content')
    <!-- auth-page content -->
    <div class="auth-page-content overflow-hidden p-0">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-xl-4 text-center">
                    <div class="error-500 position-relative">
                        <img src="{{ URL::asset('build/images/error500.png') }}" alt=""
                            class="img-fluid error-500-img error-img" />
                        <h1 class="title text-white">403</h1>
                    </div>
                    <div>
                        <h4>@lang('frontend.Permission denied...!')</h4>
                        <p class="text-white w-75 mx-auto">@lang('frontend.Permission denied... You have no access for this page')</p>
                        {{-- <p>{{ $message }}</p>
                        <p>Exception: {{ $exception }}</p>
                        <p>File: {{ $file }}</p>
                        <p>Line: {{ $line }}</p> --}}
                        @auth
                            <a href="{{ route('dashboard') }}" class="btn btn-success"><i
                                    class="mdi mdi-home me-1"></i>@lang('frontend.Back To Home')</a>
                        @else
                            <a href="{{ url('/') }}" class="btn btn-success"><i
                                    class="mdi mdi-home me-1"></i>@lang('frontend.Back To Home')</a>
                        @endauth
                    </div>
                </div><!-- end col-->
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </div>
    <!-- end auth-page content -->
@endsection
