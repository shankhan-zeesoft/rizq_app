<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-xl-6 text-center">
            <div class="error-500 position-relative">
                <img src="{{ URL::asset('build/images/error500.png') }}" alt=""
                    class="img-fluid error-500-img error-img" />
                <h1 class="title text-white">403</h1>
            </div>
            <div>
                <h4>@lang('frontend.Permission denied...!')</h4>
                <p class="text-white w-75 mx-auto">@lang('frontend.Permission denied... You have no access for this page')</p>
            </div>
        </div><!-- end col-->
    </div>
    <!-- end row -->
</div>
<!-- end container -->
