@extends('layouts.guest')

@section('content')
{{-- HERO SECTION --}}
<section class="py-5 bg-white">
    <div class="container py-5">
        <div class="row align-items-center">
            <div class="col-lg-6 mb-4 mb-lg-0">
                <span class="badge bg-primary-subtle text-primary border border-primary-subtle px-3 py-2 rounded-pill mb-3 fw-bold">
                    <i class="fas fa-robot me-2"></i> Sistem Pakar Psikologi
                </span>
                <h1 class="display-4 fw-bold text-dark mb-4" style="line-height: 1.2;">
                    Deteksi Dini Gangguan <span class="text-primary">Kesehatan Mental</span> Anda
                </h1>
                <p class="lead text-muted mb-5">
                    Sistem ini membantu mahasiswa mendeteksi tingkat stres pasca-pandemi menggunakan metode <strong>Forward Chaining</strong> dan <strong>Certainty Factor</strong> secara akurat.
                </p>
                <div class="d-flex gap-3">
                    <a href="{{ route('diagnosa.index') }}" class="btn btn-primary btn-lg rounded-pill px-4 shadow-sm">
                        <i class="fas fa-stethoscope me-2"></i> Mulai Diagnosa
                    </a>
                    <a href="{{ route('tentang.index') }}" class="btn btn-outline-secondary btn-lg rounded-pill px-4">
                        Tentang Kami
                    </a>
                </div>
            </div>
            <div class="col-lg-6 text-center">
                {{-- Ilustrasi Simpel --}}
                {{-- REVISI: Tambahkan class 'd-none d-md-block' agar seluruh ilustrasi hilang di layar HP --}}
                <div class="position-relative d-none d-md-block">
                    <div class="bg-primary opacity-10 position-absolute top-50 start-50 translate-middle rounded-circle" style="width: 300px; height: 300px; filter: blur(40px); z-index: -1;"></div>
                    <i class="fas fa-brain text-primary" style="font-size: 15rem; opacity: 0.8;"></i>
                    
                    {{-- Kartu Melayang 1 --}}
                    <div class="card border-0 shadow position-absolute top-0 end-0 mt-4 me-lg-4 p-3 d-none d-md-block" style="width: 180px;">
                        <div class="d-flex align-items-center">
                            <div class="bg-success text-white rounded-circle p-2 me-3">
                                <i class="fas fa-check"></i>
                            </div>
                            <div>
                                <small class="text-muted d-block" style="font-size: 0.7rem;">Metode</small>
                                <span class="fw-bold text-dark">Akurat</span>
                            </div>
                        </div>
                    </div>

                    {{-- Kartu Melayang 2 --}}
                    <div class="card border-0 shadow position-absolute bottom-0 start-0 mb-4 ms-lg-4 p-3 d-none d-md-block" style="width: 200px;">
                        <div class="d-flex align-items-center">
                            <div class="bg-warning text-white rounded-circle p-2 me-3">
                                <i class="fas fa-bolt"></i>
                            </div>
                            <div>
                                <small class="text-muted d-block" style="font-size: 0.7rem;">Respon</small>
                                <span class="fw-bold text-dark">Cepat & Tepat</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- FEATURES SECTION --}}
<section class="py-5 bg-light">
    <div class="container py-5">
        <div class="text-center mb-5">
            <h2 class="fw-bold">Mengapa Menggunakan Sistem Ini?</h2>
            <p class="text-muted">Keunggulan teknologi sistem pakar dalam genggaman Anda</p>
        </div>
        <div class="row g-4">
            {{-- Fitur 1 --}}
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm p-4 text-center rounded-4 hover-top">
                    <div class="mb-3 text-primary">
                        <i class="fas fa-network-wired fa-3x"></i>
                    </div>
                    <h5 class="fw-bold">Forward Chaining</h5>
                    <p class="text-muted small">
                        Melacak gejala yang Anda alami secara runtut untuk menemukan diagnosa penyakit yang paling mungkin terjadi.
                    </p>
                </div>
            </div>
            {{-- Fitur 2 --}}
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm p-4 text-center rounded-4 hover-top">
                    <div class="mb-3 text-success">
                        <i class="fas fa-percentage fa-3x"></i>
                    </div>
                    <h5 class="fw-bold">Certainty Factor</h5>
                    <p class="text-muted small">
                        Memberikan hasil dengan tingkat keyakinan (persentase) sehingga Anda tahu seberapa akurat hasil diagnosanya.
                    </p>
                </div>
            </div>
            {{-- Fitur 3 --}}
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm p-4 text-center rounded-4 hover-top">
                    <div class="mb-3 text-danger">
                        <i class="fas fa-user-shield fa-3x"></i>
                    </div>
                    <h5 class="fw-bold">Privasi Terjaga</h5>
                    <p class="text-muted small">
                        Data diagnosa Anda aman dan dapat digunakan sebagai rujukan awal sebelum ke psikolog profesional.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

@push('styles')
<style>
    .hover-top { transition: transform 0.3s ease; }
    .hover-top:hover { transform: translateY(-10px); }
</style>
@endpush
@endsection