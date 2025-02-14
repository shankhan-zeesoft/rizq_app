<script type="text/javascript">
    $(function() {
        table = $('.data-table').DataTable({
            processing: true,
            serverSide: true,
            dom: 'lBfrtip',
            // ajax: "{{ route('categories.index') }}",
            ajax: {
                url: "{{ route('categories.index') }}",
                type: 'GET',
                data: function(d) {
                    d.filter_status = $('#filter_status').val();
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
                    data: 'status',
                    name: 'status',
                    orderable: false,
                    searchable: false
                },
                {
                    data: 'action',
                    name: 'action',
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

    $('body').on('change', '#filter_status', function(e) {
        table.draw(true);
    });

    $('body').on('click', '.clear', function(e) {
        // alert('hi');
        $('#search_new').val("");
        $('#filter_status').val("");
        table.draw(true);
    });

    function status(id) {
        loading();
        $.ajax({
                url: "{{ route('categories.status') }}",
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
                    url: "{{ route('categories.destroy') }}",
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
                url: "{{ route('categories.create') }}",
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
                url: "{{ route('categories.create') }}",
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
