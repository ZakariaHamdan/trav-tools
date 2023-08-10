@props([
    'name',
    'value',
    'id',
])

<div class="col-md-2 bg-white border border-black rounded-2 m-2">
    <p class="mt-2" id="{{ $id ?? '' }}">{{ $name ?? '' }}: {{ $value ?? '' }}</p>
</div>