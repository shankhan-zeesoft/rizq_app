<div class="form-check form-switch form-switch-custom form-switch-{{ $cls }} text-center">
    <input class="form-check-input check{{ $item->id }}" type="checkbox" role="switch" name="perm[]"
        value="{{ $operation }} {{ $item->menu_links }}" id="checkbox{{ $item->id }}" data-id="{{ $item->id }}"
        @checked(in_array($operation . ' ' . $item->menu_links, $permissions) == true)>
</div>
