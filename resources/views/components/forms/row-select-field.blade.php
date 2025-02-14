<div class="{{ $col }} mb-2" @if($d_none) style="display: none;" @endif id="div_{{ $id }}">
    @if ($inputGroup)
        <div class="d-flex align-items-center gap-2">
    @endif
        <div class="@if($select2) border border-1 p-1 rounded @else form-floating  @endif">
            <label for="{{ $id }}" class="form-label align-middle">
                {{ $label }} @if ($required) <i class="text-danger">*</i> @endif
            </label>
            <select
                class="form-select {{ $classes }} @if ($select2) js-example-basic-single @endif @if ($required) field_check @endif"
                id="{{ $id }}" name="{{ $name }}" @if ($multiple) multiple @endif>
                {{ $slot }} <!-- custom options -->
            </select>
        </div>
    @if ($inputGroup)
        </div>
    @endif
</div>
