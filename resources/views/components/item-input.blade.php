@props([
    'name',
    'value',
    'id',
    'label',
    'readonly'

])

<div class="col-md-2 bg-white border border-black rounded-2 m-2">
    <label class="mt-2">{{ $label ?? \Str::snakeToTitle($name ?? '') }}
        <input class="form-control mb-2" id="{{ $id ?? $name ?? '' }}" name="{{ $name ?? '' }}" value="{{ $value ?? '' }}" @isset($readonly){{ "readonly" }}@endisset>
    </label>
</div>