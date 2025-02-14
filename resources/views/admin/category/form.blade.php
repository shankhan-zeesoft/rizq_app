<p class="text-muted"><span class="text-danger fw-bold">*</span> @lang('requiredFieldsIndicationMessage')</p>
<form id="products_update" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-12 border-bottom">
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="name" class="form-label">@lang('Name') <span class="text-danger">*</span></label>
                    <input type="text" class="form-control form-control-sm field_check" placeholder="Enter name"
                        id="name" name="name" value="{{ $data['post']->name ?? '' }}">
                </div>
                <!--end col-->
            </div>
        </div>
        <!--end col-->
        <div class="col-lg-12">
            <div class="text-end">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">@lang('Close')</button>
                <button type="submit" class="btn btn-primary">@lang('Submit')</button>
                @if (request()->action == 'edit')
                    <input type="hidden" id="id" name="id" value="{{ $data['post']->id ?? '' }}">
                    <input type="hidden" id="action" name="action" value="{{ request()->action ?? '' }}">
                @endif
            </div>
        </div>
        <!--end col-->
    </div>
    <!--end row-->
</form>

<script>
    $('.js-example-basic-single').select2({
        dropdownParent: $('#modal_add')
    });

    $('#products_update').submit(function(e) {
        e.preventDefault();
        var errors = [];
        $(".field_check").each(function(index, el) {
            var value = $(this).val();
            // console.log(value);
            if (value == "" || value == 0 || value == null) {
                $("#" + $(this).attr('id')).addClass('is-invalid');
                $(this).parent().addClass('border rounded border-danger');
                errors[index] = el;
                swal("{{ trans('Please fill important fields(*)') }}", "error");
            } else {
                $("#" + $(this).attr('id')).removeClass('is-invalid');
                $(this).parent().removeClass('border rounded border-danger');
            }
        });

        if (errors.length < 1) {
            var form_data = new FormData(this);
            loading();
            $.ajax({
                url: "{{ route('categories.store') }}",
                data: form_data,
                contentType: false,
                processData: false,
                cache: false,
                type: 'POST',
                dataType: 'json',
                success: function(res) {
                    if (res.cls == "success") {
                        $("#modal_add").modal('hide');
                    }
                    loading('stop');
                    swal(res.text, res.cls);
                    table.draw();
                },
                error: function(err) {
                    // Swal.fire(err.statusText, '', 'danger');
                    // $("#modal_add").modal('hide');
                    swal(err.responseJSON.message, "error")
                    loading('stop');
                }
            });
        }
    });
</script>
