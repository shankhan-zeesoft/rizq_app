<div class="form-check form-switch form-switch-custom form-switch-{{ $cls }} text-center">
    <input class="form-check-input check{{ $item->module_id }}" type="checkbox" role="switch" name="perm[]"
        value="{{ $operation }} /module{{ $item->module_id }}" id="checkbox{{ $item->module_id }}" data-id="{{ $item->module_id }}"
        @checked(in_array($operation . ' /module' . $item->module_id, $permissions) == true)>
</div>
