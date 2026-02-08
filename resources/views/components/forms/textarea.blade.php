@props([
    'label', 
    'name', 
    'value' => '', // Default kosong
    'placeholder' => '',
    'rows' => 3    // Default tinggi 3 baris
])

<div class="mb-3">
    <label for="{{ $name }}" class="form-label">{{ $label }}</label>
    
    <textarea 
        name="{{ $name }}" 
        id="{{ $name }}" 
        rows="{{ $rows }}" 
        placeholder="{{ $placeholder }}"
        {{ $attributes->merge([
            'class' => 'form-control ' . ($errors->has($name) ? 'is-invalid' : '')
        ]) }}
    >{{ old($name, $value) }}</textarea>

    @error($name)
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>