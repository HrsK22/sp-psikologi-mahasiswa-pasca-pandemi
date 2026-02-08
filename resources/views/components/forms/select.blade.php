@props([
    'label', 
    'name', 
])

<div class="mb-3">
    <label for="{{ $name }}" class="form-label">{{ $label }}</label>

    <select 
        name="{{ $name }}" 
        id="{{ $name }}" 
        {{ $attributes->merge([
            'class' => 'form-select ' . ($errors->has($name) ? 'is-invalid' : '')
        ]) }}
    >
        {{-- Slot ini nanti diisi oleh <option> dari luar --}}
        {{ $slot }}
    </select>

    @error($name)
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>