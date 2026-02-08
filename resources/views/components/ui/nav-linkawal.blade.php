@props(['route', 'icon', 'label'])

@php
    // Mengecek apakah route saat ini sesuai dengan parameter route yang dikirim
    // Ini mendukung pattern seperti 'penyakit.*' agar menu tetap aktif saat di halaman edit/create
    $isActive = Request::routeIs($route);
    $classes = $isActive ? 'nav-link active' : 'nav-link link-dark';
@endphp

<li class="nav-item">
    <a href="{{ route($route) }}" {{ $attributes->merge(['class' => $classes]) }}>
        <i class="{{ $icon }} fa-fw me-2"></i> {{ $label }}
    </a>
</li>