@props([
    'title', 
    'value', 
    'icon', 
    'color' => 'primary',     // Default warna biru jika tidak diisi
])

<div class="col-lg-3 col-md-6">
    <div class="card shadow-sm h-100">
        <div class="card-body d-flex align-items-center">
            <i class="{{ $icon }} stat-card-icon text-{{ $color }}"></i>
            <div>
                <div class="fw-bold text-muted">{{ $title }}</div>
                <div class="fs-4">{{ $value }}</div>
            </div>
        </div>
    </div>
</div>
