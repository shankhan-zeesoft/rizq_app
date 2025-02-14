@extends('layouts.noheader_master')
@section('title')
    {{ trans('frontend.Signup') }}
@endsection
@section('content')
    <!-- auth page content -->
    <div class="auth-page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-center mb-4 text-white-50">
                        <div>
                            <a href="{{ url('/') }}" class="d-inline-block auth-logo">
                                <img src="{{ URL::asset('build/images/logo.png') }}" alt="" height="70">
                            </a>
                        </div>
                        {{-- <p class="mt-3 fs-15 fw-medium">Premium Admin & Dashboard Template</p> --}}
                    </div>
                </div>
            </div>
            <!-- end row -->

            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="mt-2">
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
                            </div>
                            @if (session()->has('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session()->get('success') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            @elseif(session()->has('error'))
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    {{ session()->get('error') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            @endif
                            {{-- need to show all errors --}}
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <form class="form-steps" autocomplete="off" novalidate method="POST"
                                action="{{ route('register') }}" enctype="multipart/form-data" id="regForm">
                                @csrf
                                <input type="hidden" id="package_id" name="package_id" value="{{ $package_id ?? 0 }}">
                                <div class="text-center pt-3 pb-4 mb-1">
                                    <h5>@lang('frontend.Create Account')</h5>
                                    <p class="text-muted">@lang('frontend.Try 14 Days FREE')</p>
                                </div>
                                <div id="custom-progress-bar" class="progress-nav mb-4">
                                    <div class="progress" style="height: 1px;">
                                        <div class="progress-bar" role="progressbar" style="width: 0%;" aria-valuenow="0"
                                            aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>

                                    <ul class="nav nav-pills progress-bar-tab custom-nav" role="tablist">
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link rounded-pill active"
                                                data-progressbar="custom-progress-bar" id="pills-gen-info-tab"
                                                data-bs-toggle="pill" data-bs-target="#pills-gen-info" type="button"
                                                role="tab" aria-controls="pills-gen-info"
                                                aria-selected="true">1</button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link rounded-pill" data-progressbar="custom-progress-bar"
                                                id="pills-info-desc-tab" data-bs-toggle="pill"
                                                data-bs-target="#pills-info-desc" type="button" role="tab"
                                                aria-controls="pills-info-desc" aria-selected="false">2</button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link rounded-pill" data-progressbar="custom-progress-bar"
                                                id="pills-success-tab" data-bs-toggle="pill" data-bs-target="#pills-success"
                                                type="button" role="tab" aria-controls="pills-success"
                                                aria-selected="false">3</button>
                                        </li>
                                    </ul>
                                </div>
                                <div class="tab-content">
                                    <div class="tab-pane fade show active" id="pills-gen-info" role="tabpanel"
                                        aria-labelledby="pills-gen-info-tab">
                                        <div>
                                            <div class="mb-4">
                                                <div>
                                                    <h5 class="mb-1">@lang('frontend.General Information')</h5>
                                                    <p class="text-muted">@lang('frontend.Fill all Information as below')</p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 mb-3">
                                                    <label for="company_name" class="form-label">@lang('frontend.Company name') <i
                                                            class="text-danger">*</i></label>
                                                    <input type="text" value="{{ old('company_name') }}"
                                                        class="form-control @error('company_name') is-invalid @enderror"
                                                        name="company_name" id="company_name"
                                                        placeholder="@lang('frontend.Enter company name')">
                                                    @error('company_name')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>

                                                <x-forms.row-select-field id="business_type" name="business_type"
                                                    :label="__('company.Business Type')" required="true">
                                                    {!! business_types(old('business_type')) !!}
                                                </x-forms.row-select-field>
                                                @error('business_type')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                                <!--end col-->

                                                {{-- <div class="col-md-6 mb-3"> --}}
                                                {{-- <label for="registration_number" class="form-label">@lang('frontend.Registration Number') --}}
                                                {{-- <i class="text-danger">*</i></label> --}}
                                                {{-- <input type="text" value="{{ old('registration_number') }}" --}}
                                                {{-- class="form-control @error('registration_number') is-invalid @enderror" --}}
                                                {{-- name="registration_number" id="registration_number" --}}
                                                {{-- pattern="@lang('frontend.Enter company registration number')"> --}}
                                                {{-- @error('registration_number') --}}
                                                {{-- <span class="invalid-feedback" role="alert"> --}}
                                                {{-- <strong>{{ $message }}</strong> --}}
                                                {{-- </span> --}}
                                                {{-- @enderror --}}
                                                {{-- </div> --}}
                                                {{-- <div class="col-md-6 mb-3"> --}}
                                                {{-- <label for="tax_number" class="form-label">@lang('frontend.VAT') <i --}}
                                                {{-- class="text-danger">*</i></label> --}}
                                                {{-- <input type="text" value="{{ old('tax_number') }}" --}}
                                                {{-- class="form-control  @error('tax_number') is-invalid @enderror" --}}
                                                {{-- id="tax_number" name="tax_number" --}}
                                                {{-- placeholder="@lang('frontend.Enter your tax number')"> --}}
                                                {{-- @error('tax_number') --}}
                                                {{-- <span class="invalid-feedback" role="alert"> --}}
                                                {{-- <strong>{{ $message }}</strong> --}}
                                                {{-- </span> --}}
                                                {{-- @enderror --}}
                                                {{-- </div> --}}

                                                <div class="col-12 mb-3">
                                                    <label for="address" class="form-label">@lang('frontend.Address')</label>
                                                    <textarea type="text" rows="4" class="form-control @error('address') is-invalid @enderror" name="address"
                                                        id="address" placeholder="@lang('frontend.Enter your address')">{{ old('address') }}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-start gap-3 mt-4">
                                            <button type="button"
                                                class="btn btn-success btn-label right ms-auto nexttab nexttab"
                                                data-nexttab="pills-info-desc-tab"><i
                                                    class="ri-arrow-right-line label-icon align-middle fs-16 ms-2"></i>@lang('frontend.Next')</button>
                                        </div>
                                    </div>
                                    <!-- end tab pane -->

                                    <div class="tab-pane fade" id="pills-info-desc" role="tabpanel"
                                        aria-labelledby="pills-info-desc-tab">
                                        <div>
                                            <div class="mb-4">
                                                <div>
                                                    <h5 class="mb-1">@lang('frontend.General Information')</h5>
                                                    <p class="text-muted">@lang('frontend.Fill all Information as below')</p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                {{-- <div class="col-md-3 col-sm-3">
                                                    <label for="vat_certificate" class="rounded p-2"
                                                        style="background-color: lightgray;">
                                                        <img src="{{ asset('/sys_images/sv.png') }}" alt=""
                                                            class="rounded img img-responsive"
                                                            style="width: 100px; height: 100px; object-fit: contain;"
                                                            id="vat_file_output">
                                                        <br>@lang('frontend.VAT Certificate')
                                                    </label>
                                                    <input type="file" id="vat_certificate" name="vat_certificate"
                                                        onchange="vat_preview(event)" hidden>
                                                    @error('vat_certificate')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div> --}}
                                                <div class="col-md-12 col-sm-12">
                                                    <div class="row">
                                                        <div class="col-md-6 mb-3">
                                                            <label for="first_name" class="form-label">@lang('frontend.First name')
                                                                <i class="text-danger">*</i></label>
                                                            <input type="text" value="{{ old('first_name') }}"
                                                                class="form-control  @error('first_name') is-invalid @enderror"
                                                                name="first_name" id="first_name"
                                                                placeholder="@lang('frontend.Enter your first name')">
                                                            @error('first_name')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                        <div class="col-md-6 mb-3">
                                                            <label for="last_name" class="form-label">@lang('frontend.Last name')
                                                                <i class="text-danger">*</i></label>
                                                            <input type="text" value="{{ old('last_name') }}"
                                                                class="form-control  @error('last_name') is-invalid @enderror"
                                                                name="last_name" id="last_name"
                                                                placeholder="@lang('frontend.Enter your last name')">
                                                            @error('last_name')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>

                                                        {{-- <div class="col-md-12 mb-3"> --}}
                                                        {{-- <label for="first_name" --}}
                                                        {{-- class="form-label">@lang('frontend.Id number')</label> --}}
                                                        {{-- <input type="text" value="{{ old('id_number') }}" --}}
                                                        {{-- class="form-control @error('id_number') is-invalid @enderror" --}}
                                                        {{-- name="id_number" id="id_number" --}}
                                                        {{-- placeholder="@lang('frontend.Enter identity number')"> --}}
                                                        {{-- </div> --}}

                                                        <div class="col-md-12 mb-2">
                                                            <label for="mobile" class="form-label">@lang('frontend.Mobile Number')
                                                                <i class="text-danger">*</i></label>
                                                            <input type="number" value="{{ old('mobile') }}"
                                                                placeholder="532735870"
                                                                class="form-control @error('mobile') is-invalid @enderror"
                                                                name="mobile" id="mobile">
                                                            @error('mobile')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                            <small id="mumber_message"></small>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-start gap-3 mt-4">
                                            <button type="button"
                                                class="btn btn-link text-decoration-none btn-label previestab"
                                                data-previous="pills-gen-info-tab"><i
                                                    class="ri-arrow-left-line label-icon align-middle fs-16 me-2"></i>
                                                @lang('frontend.Back')</button>
                                            <button type="button"
                                                class="btn btn-success btn-label right ms-auto nexttab nexttab"
                                                data-nexttab="pills-success-tab"><i
                                                    class="ri-arrow-right-line label-icon align-middle fs-16 ms-2"></i>@lang('frontend.Next')</button>
                                        </div>
                                    </div>
                                    <!-- end tab pane -->

                                    <div class="tab-pane fade" id="pills-success" role="tabpanel"
                                        aria-labelledby="pills-success-tab">
                                        <div>
                                            <div class="row">
                                                {{-- <div class="col-md-3 col-sm-3">
                                                    <label for="id_photo" class="rounded p-2"
                                                        style="background-color: lightgray;">
                                                        <img src="{{ asset('/sys_images/sv.png') }}" alt=""
                                                            class="rounded img img-responsive"
                                                            style="width: 100px; height: 100px; object-fit: contain;"
                                                            id="id_photo_output">
                                                        @lang('frontend.Upload ID')
                                                    </label>
                                                    <input type="file" id="id_photo" name="id_photo"
                                                        onchange="ID_preview(event)" hidden>
                                                    @error('id_photo')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div> --}}
                                                <div class="col-md-12">
                                                    <div class="row">
                                                        <div class="col-md-12 mb-3">
                                                            <label for="email" class="form-label">@lang('frontend.Email') <i
                                                                    class="text-danger">*</i></label>
                                                            <input type="email" value="{{ old('email') }}"
                                                                id="email" placeholder="@lang('frontend.Enter email')"
                                                                class="form-control @error('email') is-invalid @enderror"
                                                                name="email" autocomplete="off">
                                                            @error('email')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                        <div class="col-md-12 mb-2">
                                                            <label for="userpassword"
                                                                class="form-label">@lang('frontend.Password') <i
                                                                    class="text-danger">*</i></label>
                                                            <input type="password"
                                                                class="form-control @error('password') is-invalid @enderror"
                                                                name="password" id="userpassword"
                                                                placeholder="@lang('frontend.Enter Password')">
                                                            <i class="bi bi-info text-info fs-3"></i>
                                                            <i class="text-muted">@lang('frontend.Strong password messege')</i>
                                                            @error('password')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                        <div class="col-md-12 mb-2">
                                                            <label for="input-password"
                                                                class="form-label">@lang('frontend.Confirm Password')<i
                                                                    class="text-danger">*</i></label>
                                                            <input type="password"
                                                                class="form-control @error('password_confirmation') is-invalid @enderror"
                                                                name="password_confirmation" id="input-password"
                                                                placeholder="@lang('frontend.Confirm your password')">
                                                            <div class="form-floating-icon">
                                                                <i data-feather="lock"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-start gap-3 mt-4">
                                            <button type="button"
                                                class="btn btn-link text-decoration-none btn-label previestab"
                                                data-previous="pills-info-desc-tab"><i
                                                    class="ri-arrow-left-line label-icon align-middle fs-16 me-2"></i>
                                                @lang('frontend.Back')</button>
                                            <button type="submit" class="btn btn-success btn-label right ms-auto">
                                                <i class="ri-arrow-right-line label-icon align-middle fs-16 ms-2"></i>
                                                @lang('frontend.Sign Up')
                                            </button>
                                        </div>
                                    </div>
                                    <!-- end tab pane -->
                                </div>
                                <!-- end tab content -->
                            </form>
                            <div class="mt-4 text-center">
                                {{-- <div class="signin-other-title">
                                    <h5 class="fs-13 mb-4 title text-muted">Create account with</h5>
                                </div>

                                <div>
                                    <button type="button"
                                        class="btn btn-primary btn-icon waves-effect waves-light"><i
                                            class="ri-facebook-fill fs-16"></i></button>
                                    <button type="button"
                                        class="btn btn-danger btn-icon waves-effect waves-light"><i
                                            class="ri-google-fill fs-16"></i></button>
                                    <button type="button" class="btn btn-dark btn-icon waves-effect waves-light"><i
                                            class="ri-github-fill fs-16"></i></button>
                                    <button type="button" class="btn btn-info btn-icon waves-effect waves-light"><i
                                            class="ri-twitter-fill fs-16"></i></button>
                                </div> --}}
                            </div>
                        </div>
                        <!-- end card body -->
                    </div>
                    <!-- end card -->

                    <div class="mt-4 text-center">
                        <p class="mb-0">
                            @lang('frontend.Already have an account')
                            <a href="{{ route('login') }}" class="fw-semibold text-decoration-underline">
                                @lang('frontend.Signin')
                            </a>
                        </p>
                    </div>

                </div>
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </div>
    <!-- end auth page content -->
    <script>
        function vat_preview(event) {
            var preview = document.getElementById("vat_file_output");
            preview.src = URL.createObjectURL(event.target.files[0]);
        }

        function reg_preview(event) {
            var preview = document.getElementById("reg_file_output");
            preview.src = URL.createObjectURL(event.target.files[0]);
        }

        function ID_preview(event) {
            var preview = document.getElementById("id_photo_output");
            preview.src = URL.createObjectURL(event.target.files[0]);
        }

        function regex() {
            return new RegExp(/^(009665|9665|\+9665|05|5)(5|0|3|6|4|9|1|8|7)([0-9]{7})$/);
        }

        $(document).ready(function() {
            $("#mobile").keyup(function(e) {
                var mobile_number = $(this).val();
                // console.log(mobile_number);
                if (mobile_number != "") {
                    var num = regex().test(mobile_number); // return true/false;
                    if (num) {
                        $("#mumber_message").html("");
                        $('#regForm').find("input[type='submit']").removeAttr("disabled");
                    } else {
                        $("#mumber_message").html("Enter a valid number");
                        $("#mumber_message").addClass("text-danger");
                        $('#regForm').find("input[type='submit']").attr("disabled", "disabled");
                    }
                } else {
                    $("#mumber_message").html("");
                    $('#regForm').find("input[type='submit']").removeAttr("disabled");
                }
            });

            $("#name").keyup(function(e) {
                var username = $(this).val();
                //remove space
                username = username.replace(/\s/g, '');
                //make string lower
                username = username.toLowerCase();
                $("#name").val(username);
            });
        })
    </script>
@endsection
@section('script')
    <script src="{{ URL::asset('build/js/pages/form-wizard.init.js') }}"></script>
@endsection
