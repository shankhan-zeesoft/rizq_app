@extends('layouts.noheader_master')
@section('title')
    {{ trans('translation.reset-mail') }}
@endsection
@section('content')
    <!-- auth-page content -->
    <div class="auth-page-content overflow-hidden pt-lg-5 mt-5">
        <div class="container mt-5">
            <div class="row">
                <div class="col-lg-3"></div>
                <div class="col-lg-6">
                    <div class="card overflow-hidden">
                        <div class="row justify-content-center g-0">
                            {{-- <div class="col-lg-6">
                            <div class="p-lg-5 p-4 auth-one-bg h-100">
                                <div class="bg-overlay"></div>
                                <div class="position-relative h-100 d-flex flex-column">
                                    <div class="mb-4">
                                        <a href="index" class="d-block">
                                            <img src="{{ URL::asset('build/images/logo-light.png') }}" alt="" height="18">
                                        </a>
                                    </div>
                                    <div class="mt-auto">
                                        <div class="mb-3">
                                            <i class="ri-double-quotes-l display-4 text-success"></i>
                                        </div>

                                        <div id="qoutescarouselIndicators" class="carousel slide"
                                            data-bs-ride="carousel">
                                            <div class="carousel-indicators">
                                                <button type="button" data-bs-target="#qoutescarouselIndicators"
                                                    data-bs-slide-to="0" class="active" aria-current="true"
                                                    aria-label="Slide 1"></button>
                                                <button type="button" data-bs-target="#qoutescarouselIndicators"
                                                    data-bs-slide-to="1" aria-label="Slide 2"></button>
                                                <button type="button" data-bs-target="#qoutescarouselIndicators"
                                                    data-bs-slide-to="2" aria-label="Slide 3"></button>
                                            </div>
                                            <div class="carousel-inner text-center text-white-50 pb-5">
                                                <div class="carousel-item active">
                                                    <p class="fs-15 fst-italic">" Great! Clean code, clean design,
                                                        easy for customization. Thanks very much! "</p>
                                                </div>
                                                <div class="carousel-item">
                                                    <p class="fs-15 fst-italic">" The theme is really great with an
                                                        amazing customer support."</p>
                                                </div>
                                                <div class="carousel-item">
                                                    <p class="fs-15 fst-italic">" Great! Clean code, clean design,
                                                        easy for customization. Thanks very much! "</p>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end carousel -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end col --> --}}

                            <div class="col-lg-12">
                                <div class="p-3">
                                    @switch(app()->getLocale())
                                        @case('ar')
                                            <a href="{{ url('locale/en') }}" class="dropdown-item notify-item language text-end"
                                                data-lang="en" title="English">
                                                <img src="{{ URL::asset('build/images/flags/us.svg') }}" class="me-2 rounded"
                                                    height="20" alt="Header Language">
                                            </a>
                                        @break

                                        @case('en')
                                            <a href="{{ url('locale/ar') }}" class="dropdown-item notify-item language text-end"
                                                data-lang="ae" title="عربي">
                                                <img src="{{ URL::asset('build/images/flags/sa.svg') }}" class="me-2 rounded"
                                                    height="20" alt="Header Language">
                                            </a>
                                        @break
                                    @endswitch
                                    <h5 class="text-primary text-center">@lang('frontend.Forgot password?')</h5>
                                    <p class="text-muted text-center">@lang('frontend.Reset password with SFM')</p>

                                    <div class="mt-2 text-center">
                                        <lord-icon src="https://cdn.lordicon.com/rhvddzym.json" trigger="loop"
                                            colors="primary:#0ab39c" class="avatar-xl">
                                        </lord-icon>
                                    </div>

                                    <div class="alert alert-borderless alert-warning text-center mb-2 mx-2" role="alert">
                                        @lang('frontend.Enter your email and instructions will be sent to you!')
                                    </div>
                                    <div class="p-2">
                                        <form>
                                            <div class="mb-4">
                                                <label class="form-label">@lang('frontend.Email')</label>
                                                <input type="email" class="form-control" id="email"
                                                    placeholder="@lang('frontend.Enter email address')">
                                            </div>
                                            <div class="text-center mt-4">
                                                <button class="btn btn-success w-100" type="submit">@lang('frontend.Send Reset Link')</button>
                                            </div>
                                        </form><!-- end form -->
                                    </div>

                                    <div class="mt-5 text-center">
                                        <p class="mb-0">@lang('frontend.Wait, I remember my password...') <a href="{{ route('login') }}"
                                                class="fw-semibold text-primary text-decoration-underline"> @lang('frontend.Sign In')
                                            </a> </p>
                                    </div>
                                </div>
                            </div>
                            <!-- end col -->
                        </div>
                        <!-- end row -->
                    </div>
                    <!-- end card -->
                </div>
                <!-- end col -->

            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </div>
    <!-- end auth page content -->
@endsection
@section('script')
    <script src="{{ URL::asset('build/libs/particles.js/particles.js') }}"></script>
    <script src="{{ URL::asset('build/js/pages/particles.app.js') }}"></script>
@endsection
