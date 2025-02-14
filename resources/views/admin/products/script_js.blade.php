<script type="text/javascript">
    $(function() {
        table = $('.data-table').DataTable({
            processing: true,
            serverSide: true,
            dom: 'lBfrtip',
            // ajax: "{{ route('products.index') }}",
            ajax: {
                url: "{{ route('products.index') }}",
                type: 'GET',
                data: function(d) {
                    d.category_id = $('#category_id').val();
                    d.in_stock = $('#in_stock').val();
                    d.min_price = $('#min_price').val();
                    d.max_price = $('#max_price').val();
                    // console.log(d);
                }
            },
            buttons: [{
                    text: 'csv',
                    extend: 'csvHtml5',
                    exportOptions: {
                        columns: ':visible:not(.not-export-col)'
                    }
                },
                {
                    text: 'excel',
                    extend: 'excelHtml5',
                    exportOptions: {
                        columns: ':visible:not(.not-export-col)'
                    }
                },
                {
                    text: 'pdf',
                    extend: 'pdfHtml5',
                    exportOptions: {
                        columns: ':visible:not(.not-export-col)'
                    }
                },
                {
                    text: 'print',
                    extend: 'print',
                    exportOptions: {
                        columns: ':visible:not(.not-export-col)'
                    }
                },
                {
                    text: 'copy',
                    extend: 'copy',
                    exportOptions: {
                        columns: ':visible:not(.not-export-col)'
                    }
                },

            ],
            columns: [
                // {
                //     data: 'id',
                //     name: 'id',
                //     orderable: false,
                //     searchable: false
                // },
                {
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'description',
                    name: 'description'
                },
                {
                    data: 'categories',
                    name: 'categories'
                },
                {
                    data: 'price',
                    name: 'price'
                },
                {
                    data: 'in_stock',
                    name: 'in_stock'
                },
                {
                    data: 'status',
                    name: 'status',
                    orderable: false,
                    searchable: false
                },
            ],
            "lengthMenu": [
                [10, 25, 50, 100, -1],
                [10, 25, 50, 100, "All"]
            ],
            "responsive": false,
            // "lengthChange": false,
            "autoWidth": false
        });

        $("#search_new").on("keyup search input paste cut", function() {
            table.search(this.value).draw();
        });

        $('body').on('change', '#no_of_entries', function(e) {
            $(".custom-select").html(`<option value='` + $(this).val() + `' selected></option>`)
                .change();
        });
    });

    $('body').on('change', '#category_id', function(e) {
        table.draw(true);
    });
    $('body').on('change', '#in_stock', function(e) {
        table.draw(true);
    });
    // $('body').on('change', '#definedDates', function(e) {
    //     table.draw(true);
    // });
    $('body').on('change', '#min_price', function(e) {
        table.draw(true);
    });
    $('body').on('change', '#max_price', function(e) {
        table.draw(true);
    });
    $('body').on('click', '.clear', function(e) {
        // alert('hi');
        $('#search_new').val("");
        $('#in_stock').val("");
        $('#category_id').val("").trigger();
        // $('#definedDates').val("");
        $('#min_price').val("");
        $('#max_price').val("");
        table.draw(true);
    });

    function status(id) {
        loading();
        $.ajax({
                url: "{{ route('products.status') }}",
                type: 'post',
                dataType: 'json',
                data: {
                    _token: '{!! csrf_token() !!}',
                    id: id
                }
            })
            .done(function(res) {
                // window.location.reload();
                swal(res.text, res.cls);
            })
            .fail(function() {
                console.log("error");
            }).always(function() {
                loading("stop");
            });
    }

    function destroy(id) {
        // bootbox.confirm("{{ trans('project.Are_you_sure_to_delete') }}", function(result) {
        if (confirm("{{ trans('Are_you_sure_to_delete') }}")) {
            loading();
            $.ajax({
                    url: "{{ route('products.destroy') }}",
                    type: 'post',
                    dataType: 'json',
                    data: {
                        _token: '{!! csrf_token() !!}',
                        id: id
                    },
                })
                .done(function(res) {
                    $("#" + id).hide(1000);
                    swal(res.text, res.cls);
                })
                .fail(function() {
                    console.log("error");
                })
                .always(function() {
                    loading("stop");
                });
        }
        // })
    }

    function add() {
        // alert('hi');
        loading();
        $('#modal_add').modal('show');
        $.ajax({
                url: "{{ route('products.create') }}",
                type: 'post',
                // dataType: 'json',
                data: {
                    _token: '{!! csrf_token() !!}',
                    action: 'add'
                },
            })
            .done(function(res) {
                $("#box").html(res);
            })
            .fail(function() {
                console.log("error");
            })
            .always(function() {
                loading("stop");
            });
    }

    function edit(id) {
        // alert('hi');
        loading();
        $('#modal_add').modal('show');
        $.ajax({
                url: "{{ route('products.create') }}",
                type: 'post',
                // dataType: 'json',
                data: {
                    _token: '{!! csrf_token() !!}',
                    id: id,
                    action: 'edit'
                },
            })
            .done(function(res) {
                $("#box").html(res);
            })
            .fail(function() {
                console.log("error");
            })
            .always(function() {
                loading("stop");
            });
    }
</script>
