<div class="{{ $col }} mb-2">
    <div class="form-floating">
        <input type="{{ $type }}" id="{{ $id }}" name="{{ $name }}"
            placeholder="{{ $placeholder }}"
            class="form-control {{ $classes }} @if ($required) field_check @endif"
            value="{{ $value }}"
            @if ($datePicker) data-provider="flatpickr" data-date-format="Y-m-d" @endif
            @readonly($readonly)>
        <label for="{{ $id }}" class="form-label">{{ $label }} @if ($required)
                <i class="text-danger">*</i>
            @endif
        </label>
    </div>
</div>
