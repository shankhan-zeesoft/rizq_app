@props(['title'])
<div class="col-12 mt-3">
    <div class="d-flex align-items-center">
        <hr class="flex-grow-1 border border-1 border-primary">
        @if (isset($title))
            <h3 class="mx-3 text-muted text-primary">{{ $title }}</h3>
        @endif
        <hr class="flex-grow-1 border border-1 border-primary">
    </div>
</div>
