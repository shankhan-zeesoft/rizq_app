@props(['for', 'text', 'r_icon', 'value'])

<label {{ $attributes->merge(['class' => 'block font-medium text-sm text-gray-700 dark:text-gray-300']) }}
    @isset($for) for="{{ $for ?? '' }}" @endisset
    @isset($value) value="{{ $value ?? '' }}" @endisset>
    {{ $text ?? $slot }} @isset($r_icon) <i class="text-danger">{{ $r_icon }}</i> @endisset
</label>
