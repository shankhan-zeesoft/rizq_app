@extends('layouts.admin')
@section('title')
    @lang('Categories')
@endsection
@section('content')
    @component('components.breadcrumb')
        @slot('li_1')
            @lang('Home')
        @endslot
        @slot('li_1_link')
            {{ route('dashboard') }}
        @endslot
        @slot('title')
            @lang('Categories')
        @endslot
    @endcomponent
    <style>
        .dataTables_filter,
        .dataTables_length {
            display: none;
        }
    </style>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center flex-wrap gap-2">
                        <div class="flex-grow-1">
                            <a class="btn btn-info add-btn btn-sm" href="javascript:void(0);" onclick="add()">
                                <i class="ri-add-fill me-1 align-bottom"></i> @lang('Add')
                            </a>
                        </div>
                        <div class="flex-shrink-0">
                            <div class="hstack text-nowrap gap-2">
                                <div class="col-4">
                                    <div class="input-group input-group-sm">
                                        <label for="no_of_entries">@lang('Show')</label>
                                        <select class="form-select form-select-sm mx-1" id="no_of_entries">
                                            <option value="10" selected>10</option>
                                            <option value="50">50</option>
                                            <option value="100">100</option>
                                            <option value="400">500</option>
                                            <option value="-1">{{ trans('All') }}</option>
                                        </select>
                                        <label for="no_of_entries">@lang('Entries')</label>
                                    </div>
                                </div>
                                <div class="search-box">
                                    <input type="text" id="search_new" class="form-control form-control-sm search"
                                        placeholder="@lang('Search...')">
                                    <i class="ri-search-line search-icon"></i>
                                </div>
                                <button class="btn btn-soft-danger btn-sm" id="remove-actions" onClick="deleteMultiple()"><i
                                        class="ri-delete-bin-2-line"></i></button>
                                <button class="btn btn-secondary btn-sm" data-bs-toggle="collapse" data-bs-target="#filter">
                                    <i class="ri-filter-2-line me-1 align-bottom"> </i> @lang('Filters')
                                </button>
                                <button type="button" class="btn btn-light btn-sm clear">@lang('Clear')</button>
                                {{-- @can('import ' . '/products')
                                    <button class="btn btn-soft-success btn-sm import_btn">
                                        <i class="bx bx-import me-1 align-center"></i> @lang('Import')
                                    </button>
                                @endcan --}}
                                <button type="button" id="dropdownMenuLink1" data-bs-toggle="dropdown"
                                    aria-expanded="false" class="btn btn-soft-info btn-sm"><i
                                        class="ri-more-2-fill"></i></button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink1">
                                    <li class="myLi" value="1">
                                        <a class="dropdown-item" href="#"><i
                                                class="ri-file-excel-2-fill mx-2 fs-5"></i>@lang('Export CSV')</a>
                                    </li>
                                    <li class="myLi" value="2">
                                        <a class="dropdown-item" href="#"><i
                                                class="ri-file-excel-2-fill mx-2 fs-5"></i>@lang('Export Excel')</a>
                                    </li>
                                    <li class="myLi" value="3">
                                        <a class="dropdown-item" href="#"><i
                                                class=" bx bxs-file-pdf mx-2 fs-5"></i>@lang('Export PDF')</a>
                                    </li>
                                    <li class="myLi" value="4">
                                        <a class="dropdown-item" href="#"><i
                                                class="bx bxs-printer mx-2 fs-5"></i>@lang('Print')</a>
                                    </li>
                                    <li class="myLi" value="5">
                                        <a class="dropdown-item" href="#"><i
                                                class=" bx bxs-copy mx-2 fs-5"></i>@lang('Copy')</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    {{-- filter --}}
                    <div class="row mt-2 collapse shadow-lg pb-2 border show" id="filter">
                        <div class="col-md-2">
                            <label for="filter_status" class="form-label">@lang('Status')</label>
                            <select id="filter_status" class="form-select form-select-sm js-example-basic-single">
                                <option value="">@lang('Choose')</option>
                                <option value="1">@lang('Active')</option>
                                <option value="0">@lang('Inactive')</option>
                            </select>
                        </div>
                        <!--end col-->
                    </div>
                </div>
            </div>
        </div>
        <!--end col-->
        <div class="col-xxl-12">
            <div class="card" id="companyList">
                <div class="card-body">
                    <div>
                        <div class="table-responsive table-card mb-3">
                            <table class="table align-middle table-nowrap mb-0 data-table" id="productsTable">
                                <thead class="table-light">
                                    <tr>
                                        {{-- <th scope="col" style="width: 50px;">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="checkAll"
                                                    value="option">
                                            </div>
                                        </th> --}}
                                        {{-- <th class="sort" data-sort="id" scope="col">@lang('Id')</th> --}}
                                        <th scope="col">@lang('Name')</th>
                                        <th class="not-export-col" scope="col">@lang('Status')</th>
                                        <th class="not-export-col" scope="col">@lang('Action')</th>
                                    </tr>
                                </thead>
                                <tbody class="list form-check-all">
                                    {{-- yajrah data here --}}
                                </tbody>
                            </table>
                        </div>
                        {{-- <div class="d-flex justify-content-end mt-3">
                            <div class="pagination-wrap hstack gap-2">
                                <a class="page-item pagination-prev disabled" href="#">
                                    Previous
                                </a>
                                <ul class="pagination listjs-pagination mb-0"></ul>
                                <a class="page-item pagination-next" href="#">
                                    Next
                                </a>
                            </div>
                        </div> --}}
                    </div>

                </div>
            </div>
            <!--end card-->
        </div>
        <!--end col-->
    </div>
    <!--end row-->

    {!! modalBox('', 'modal_add', 'box', 'modal-xl') !!}

    @include('admin.category.script_js')
@endsection
