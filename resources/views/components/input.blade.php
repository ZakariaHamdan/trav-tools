@props([
    'name',
    'type'
])
<div class="row mb-3">
    <label for="{{ $name }}"
           class="col-md-4 col-form-label text-md-end text-capitalize">{{ \Str::snakeToTitle($name) }}</label>

    <div class="col-md-6">
        <input id="{{ $name }}" type="{{ $type ?? 'text' }}" class="form-control @error($name) is-invalid @enderror"
               name="{{ $name }}"
               value="{{ old($name) }}" required autocomplete="name" autofocus>
        @error($name)
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>