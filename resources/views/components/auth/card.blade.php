@props([
    'title', 
    'subtitle' => null, 
    'icon' => null
])

<div class="card shadow-lg border-0 rounded-lg">
    <div class="card-body p-4 p-md-5">
        
        {{-- Header Auth (Ikon & Judul Tengah) --}}
        <div class="text-center mb-4">
            @if($icon)
                <div class="mb-3">
                    <i class="{{ $icon }} fa-3x text-primary"></i>
                </div>
            @endif
            
            <h2 class="fw-bold mb-1">{{ $title }}</h2>
            
            @if($subtitle)
                <p class="text-muted">{{ $subtitle }}</p>
            @endif
        </div>

        {{-- Slot Utama (Form Login/Register) --}}
        {{ $slot }}

        {{-- Slot Footer (Link "Sudah punya akun?") --}}
        @if(isset($footer))
            <div class="text-center mt-1 auth-card-footer">
                <p class="text-muted mb-0">
                    {{ $footer }}
                </p>
            </div>
        @endif

    </div>
</div>  