@props([
    'action',                       // URL tujuan form (misal: route('gejala.index'))
    'placeholder' => 'Cari data...', // Teks placeholder (opsional)
    'name' => 'keyword',            // Nama input (default: keyword)
    'value' => request('keyword')   // Nilai saat ini (default: ambil dari request)
])

<form action="{{ $action }}" method="GET" {{ $attributes->merge(['class' => 'd-flex align-items-center']) }}>
    
    {{-- Input Search --}}
    <input type="text" 
           name="{{ $name }}" 
           class="form-control form-control-sm me-2" 
           placeholder="{{ $placeholder }}" 
           value="{{ $value }}">
    
    {{-- Tombol Cari (Submit) --}}
    {{-- Kita pakai component button yang sudah dibuat sebelumnya --}}
    <x-ui.button type="submit" color="secondary" size="sm" title="Cari">
        <i class="fas fa-search"></i>
    </x-ui.button>
    
    {{-- Tombol Reset (Muncul hanya jika sedang mencari) --}}
    @if($value)
        <x-ui.button href="{{ $action }}" color="danger" size="sm" class="ms-2" title="Reset Pencarian">
            <i class="fas fa-sync-alt"></i>
        </x-ui.button>
    @endif

</form>