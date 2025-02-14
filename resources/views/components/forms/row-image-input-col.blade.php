<div class="{{ $col }} mb-2">
    <label for="{{ $id }}" class="rounded p-2 mt-2" style="background-color: lightgray;">
        <img src="{{ asset($src) }}" class="rounded img img-responsive" style="height: 100px; object-fit: contain;"
            id="{{ $outputId }}" alt="{{ $label }}" width="100%"><br>
        {{ $label }}
    </label>
    <input type="file" id="{{ $id }}" name="{{ $name }}" onchange="{{ $onchange }}" hidden>
</div>
