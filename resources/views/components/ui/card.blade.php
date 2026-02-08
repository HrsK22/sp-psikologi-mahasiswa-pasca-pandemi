@props([
    'title' => null // Title bersifat opsional, default-nya kosong
])

<div {{ $attributes->merge(['class' => 'card mb-4 shadow-sm']) }}>
    <div class="card-body">
        {{-- Jika title diisi, maka tampilkan judulnya --}}
        @if($title)
            <h5 class="card-title mb-4">{{ $title }}</h5>
        @endif

        {{-- Area ini (slot) akan diisi oleh tabel, tombol, form, dll --}}
        {{ $slot }}
    </div>
</div>