@props(['route', 'icon', 'label', 'active' => null])

@php
    // Jika prop 'active' diisi (misal: 'gejala.*'), gunakan itu.
    // Jika tidak, fallback menggunakan 'route' (misal: 'gejala.index').
    $checkActive = $active ?? $route;

    // Cek apakah route saat ini cocok dengan pattern
    $isActive = Request::routeIs($checkActive);
    
    $classes = $isActive ? 'nav-link active' : 'nav-link link-dark';
@endphp

<li class="nav-item">
    <a href="{{ route($route) }}" {{ $attributes->merge(['class' => $classes]) }}>
        <i class="{{ $icon }} fa-fw me-2"></i> {{ $label }}
    </a>
</li>