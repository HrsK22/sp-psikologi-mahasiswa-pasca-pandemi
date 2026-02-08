@props([
    'label', 
    'name', 
    'type' => 'text', 
    'value' => null,  // Default null (untuk form Create)
    'placeholder' => ''
])

<div class="mb-3">
    <label for="{{ $name }}" class="form-label">{{ $label }}</label>
    
    <input 
        type="{{ $type }}" 
        name="{{ $name }}" 
        id="{{ $name }}"
        placeholder="{{ $placeholder }}"
        {{-- 
           Logika Value: 
           old($name, $value) artinya: 
           "Pakai inputan terakhir user (jika error). Kalau tidak ada, pakai data dari database ($value)." 
        --}}
        value="{{ old($name, $value) }}"
        
        {{-- Merge class bawaan dengan class error jika ada --}}
        {{ $attributes->merge([
            'class' => 'form-control ' . ($errors->has($name) ? 'is-invalid' : '')
        ]) }}
    >

    {{-- Pesan Error Otomatis --}}
    @error($name)
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>