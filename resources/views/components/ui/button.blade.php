@props([
    'type' => 'button',  // submit, button, reset
    'href' => null,      // Jika diisi, berubah jadi <a>
    'color' => 'primary', // primary, secondary, danger, warning, etc
    'outline' => false,  // true jika ingin style btn-outline-...
    'size' => 'sm'       // sm, md, lg
])

@php
    // Menentukan class dasar Bootstrap
    $baseClass = 'btn';
    
    // Logika warna (solid atau outline)
    $colorClass = $outline ? "btn-outline-{$color}" : "btn-{$color}";
    
    // Logika ukuran
    $sizeClass = $size ? "btn-{$size}" : "";
    
    // Gabungkan semua class
    $classes = "$baseClass $colorClass $sizeClass";
@endphp

@if($href)
    {{-- Render sebagai Link <a> --}}
    <a href="{{ $href }}" {{ $attributes->merge(['class' => $classes]) }}>
        {{ $slot }}
    </a>
@else
    {{-- Render sebagai Button <button> --}}
    <button type="{{ $type }}" {{ $attributes->merge(['class' => $classes]) }}>
        {{ $slot }}
    </button>
@endif