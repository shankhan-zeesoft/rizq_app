@props(['id', 'col'])
{{-- input field --}}
<div {{ $attributes->merge(['class' => 'mb-3 col-' . $col]) }}
    @isset($id) id="{{ $id }}" @endisset>
    {{ $slot ?? '' }}
</div>
