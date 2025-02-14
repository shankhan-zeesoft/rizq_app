<div class="{{ $col }} mb-2">
    <div class="form-floating">
        <textarea type="{{ $type }}" rows="{{ $rows }}" id="{{ $id }}" name="{{ $name }}"
            placeholder="{{ $placeholder }}"
            class="form-control {{ $classes }} @if ($required) field_check @endif" style="height: 150px;">{{ $slot }}</textarea>
        <label for="{{ $id }}" class="form-label">{{ $label }} @if ($required)
                <i class="text-danger">*</i>
            @endif
        </label>
    </div>
</div>
