@props(['id'])
{{-- input field --}}
<div {{ $attributes->merge(['class' => 'row']) }}
    @isset($id) id="{{ $id }}" @endisset>
    {{ $slot ?? '' }}
</div>
