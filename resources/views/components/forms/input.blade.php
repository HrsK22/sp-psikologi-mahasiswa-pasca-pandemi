@props([
    'label', 
    'name', 
    'type' => 'text', 
    'value' => null,
    'placeholder' => '',
    'icon' => null, // <--- Props baru (Default null/kosong)
])

<div class="mb-3">
    <label for="{{ $name }}" class="form-label">{{ $label }}</label>
    
    {{-- LOGIKA: Apakah pakai Icon? --}}
    @if($icon)
        <div class="input-group">
            <span class="input-group-text">
                <i class="{{ $icon }}"></i>
            </span>
    @endif

        {{-- INPUT FIELD (Kode Asli) --}}
        <input 
            type="{{ $type }}" 
            name="{{ $name }}" 
            id="{{ $name }}"
            placeholder="{{ $placeholder }}"
            value="{{ old($name, $value) }}"
            {{ $attributes->merge([
                'class' => 'form-control ' . ($errors->has($name) ? 'is-invalid' : '')
            ]) }}
        >
        
        {{-- Jika error, letakkan pesan error DI DALAM input-group agar rapi (opsional, tergantung selera CSS) --}}
        {{-- Namun biasanya Bootstrap menyarankan invalid-feedback sejajar dengan input --}}
        @error($name)
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror

    @if($icon)
        </div> {{-- Tutup input-group --}}
    @endif
</div>