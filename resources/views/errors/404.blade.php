@extends('layouts.noheader_master')
@section('tilte')
    {{ trans('frontend.Error') }} 404
@endsection
@section('content')
    <!-- auth-page content -->
    <div class="auth-page-content overflow-hidden p-0">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-7 col-lg-8">
                    <div class="text-center">
                        <img src="{{ URL::asset('build/images/error400-cover.png') }}" alt="error img" class="img-fluid">
                        <div class="mt-3">
                            <h3 class="text-uppercase">@lang('frontend.Sorry, Page not Found') 😭</h3>
                            <p class="text-white mb-4">@lang('frontend.The page you are looking for not available!')</p>
                            @auth
                                <a href="{{ route('dashboard') }}" class="btn btn-success"><i
                                        class="mdi mdi-home me-1"></i>@lang('frontend.Back To Home')</a>
                            @else
                                <a href="{{ url('/') }}" class="btn btn-success"><i
                                        class="mdi mdi-home me-1"></i>@lang('frontend.Back To Home')</a>
                            @endauth
                        </div>
                    </div>
                </div><!-- end col -->
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </div>
    <!-- end auth-page content -->
@endsection
