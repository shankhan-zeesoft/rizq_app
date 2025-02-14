{{-- datatables --}}
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/select/1.3.4/js/dataTables.select.min.js"></script>

{{-- <script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script> --}}
{{-- <script src="https://cdn.datatables.net/buttons/3.2.0/js/dataTables.buttons.js"></script> --}}
{{-- <script src="https://cdn.datatables.net/buttons/3.2.0/js/buttons.dataTables.js"></script> --}}
{{-- <script src="https://cdn.datatables.net/buttons/3.2.0/js/buttons.print.min.js"></script> --}}
{{-- <script src="https://cdn.datatables.net/select/2.1.0/js/dataTables.select.js"></script> --}}
{{-- <script src="https://cdn.datatables.net/select/2.1.0/js/select.dataTables.js"></script> --}}

{{-- calculations --}}
<script src="https://cdn.datatables.net/plug-ins/1.13.5/api/sum().js"></script>
{{-- export to pdf and excel etc --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>

<script>
    // Set global defaults for DataTables (this should be outside of document ready)
    $.extend(true, $.fn.dataTable.defaults, {
        fixedHeader: true,
        select: {
            style: 'multi' // Enables multi-row selection
        },
        // columnDefs: [{
        // targets: -1,
        // visible: false
        // }],
        // fixedColumns: {
        // start: 3
        // },
        // paging: false,
        // scrollCollapse: true,
        // scrollX: true,
        // scrollY: 300,
        language: {
            sProcessing: "{{ trans('company.sProcessing') }}",
            sLengthMenu: "{{ trans('company.sLengthMenu') }}",
            sZeroRecords: "{{ trans('company.sZeroRecords') }}",
            sInfo: "{{ trans('company.sInfo') }}",
            sInfoEmpty: "{{ trans('company.sInfoEmpty') }}",
            sInfoFiltered: "{{ trans('company.sInfoFiltered') }}",
            // sInfoPostFix: "{{ trans('company.sInfoPostFix') }}",
            sSearch: "{{ trans('company.sSearch') }}",
            sUrl: "{{ trans('company.sUrl') }}",
            sEmptyTable: "{{ trans('company.sEmptyTable') }}",
            sLoadingRecords: "{{ trans('company.sLoadingRecords') }}",
            // sThousands: "{{ trans('company.sThousands') }}",
            oPaginate: {
                sFirst: "{{ trans('company.sFirst') }}",
                sPrevious: "{{ trans('company.sPrevious') }}",
                sNext: "{{ trans('company.sNext') }}",
                sLast: "{{ trans('company.sLast') }}",
            },
            oAria: {
                sSortAscending: "{{ trans('company.sSortAscending') }}",
                sSortDescending: "{{ trans('company.sSortDescending') }}",
            },
            select: {
                rows: "{{ trans('company.sSelectRows') }}",
                // rows: {
                // _: "{{ trans('company.sSelectRowsMultiple') }}",
                // 0: "{{ trans('company.sSelectRowsNone') }}",
                // 1: "{{ trans('company.sSelectRowsSingle') }}",
                // },
            },
            buttons: {
                copy: "{{ trans('company.copy') }}",
                csv: "{{ trans('company.csv') }}",
                excel: "{{ trans('company.excel') }}",
                pdf: "{{ trans('company.pdf') }}",
                print: "{{ trans('company.print') }}",
                colvis: "{{ trans('company.colvis') }}",
            },
        },
        // Add global configuration for buttons
        buttons: {
            print: {
                extend: 'print',
                customize: function(win) {
                    $(win.document.body)
                        .css('font-size', '10pt')
                        .prepend(
                            "Text"
                            // "<img src='{{ asset('build/images/logo.png') }}' style='position:absolute; top:0; left:0;' />"
                            // '<img src="http://datatables.net/media/images/logo-fade.png" style="position:absolute; top:0; left:0;" />'
                        );

                    $(win.document.body)
                        .find('table')
                        .addClass('compact')
                        .css('font-size', 'inherit');
                }
            }
        }
    });
</script>
{{-- datatables --}}

<script src="{{ URL::asset('build/js/custom.init.js?' . rand()) }}"></script>
<script src="{{ URL::asset('build/js/barcode.init.js?' . rand()) }}"></script>
<script src="{{ URL::asset('build/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ URL::asset('build/libs/simplebar/simplebar.min.js') }}"></script>
<script src="{{ URL::asset('build/libs/node-waves/waves.min.js') }}"></script>
<script src="{{ URL::asset('build/libs/feather-icons/feather.min.js') }}"></script>
<script src="{{ URL::asset('build/js/pages/plugins/lord-icon-2.1.0.js') }}"></script>
<script src="{{ asset('build/js/pages/printer/jQuery.print.js') }}"></script>
<script src="{{ URL::asset('build/js/plugins.js') }}"></script>

<!-- export to pdf and excel -->
<script src="{{ URL::asset('build/export/jspdf.min.js') }}"></script>
<script src="{{ URL::asset('build/export/jspdf.plugin.autotable.min.js') }}"></script>
<script src="{{ URL::asset('build/export/tableHTMLExport.js') }}"></script>
<!-- <script src="https://cdn.jsdelivr.net/npm/table2excel@1.0.4/dist/table2excel.js"></script> -->
<script src="{{ URL::asset('build/export/table2excel.js') }}"></script>

<!--select2 cdn-->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="{{ URL::asset('build/js/pages/select2.init.js') }}"></script>
<script>
    // $('.js-example-basic-single').select2({
    // placeholder: "{{ trans('company.Choose') }}",
    // allowClear: true,
    // theme: 'bootstrap-5', // Make sure to include the Select2 Bootstrap 5 theme
    // });

    function showConfirmation() {
        Swal.fire({
            title: "{{ trans('company.Are you sure') }}",
            text: "{{ trans('You won`t be able to revert this!') }}",
            icon: "warning",
            confirmButtonClass: 'btn btn-primary w-xs me-2 mt-2',
            confirmButtonText: "{{ trans('company.Yes, delete it!') }}",
            showCancelButton: true,
            cancelButtonClass: 'btn btn-danger w-xs mt-2',
            cancelButtonText: "{{ trans('company.Cancel') }}",
            buttonsStyling: false,
            showCloseButton: true
        })
        // .then(function(result) {
        //     if (result.value) {
        //         confirmationCallback
        //     }
        // });
    }
</script>
@yield('script')
<script src="{{ URL::asset('build/libs/dom-autoscroller/dom-autoscroller.min.js') }}"></script>
<script src="{{ URL::asset('build/libs/@simonwep/pickr/pickr.min.js') }}"></script>
<script src="{{ URL::asset('build/js/pages/form-pickers.init.js') }}"></script>
<script src="{{ URL::asset('build/js/app.js') }}"></script>
@yield('script-bottom')
