@extends('layouts.guest')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-10">

            {{-- Header --}}
            <div class="text-center mb-5">
                <h2 class="fw-bold display-6 text-primary">Hasil Diagnosa</h2>
                <p class="lead text-muted">Berikut adalah hasil analisa sistem berdasarkan gejala yang Anda pilih.</p>
            </div>

            <div class="row">
                {{-- Kolom Kiri: Hasil Penyakit --}}
                <div class="col-md-8 mb-4">
                    <div class="card shadow border-0 rounded-4 h-100">
                        <div class="card-header bg-success text-white py-3 rounded-top-4">
                            <h5 class="card-title mb-0"><i class="fas fa-clipboard-check me-2"></i> Hasil Analisa</h5>
                        </div>
                        <div class="card-body p-4">
                            <div class="alert alert-light border-start border-success border-4" role="alert">
                                {{-- Nama Penyakit --}}
                                <h4 class="alert-heading fw-bold text-success mb-1">{{ $penyakit->nama_penyakit }}</h4>
                                <span class="badge bg-success mb-2">{{ $penyakit->kode_penyakit }}</span>
                                <p class="mb-0 text-muted">
                                    Berdasarkan gejala yang dipilih, sistem mengindikasikan kondisi ini.
                                </p>
                            </div>

                            <hr class="my-4">

                            {{-- Solusi --}}
                            <h5 class="fw-bold text-dark mb-3"><i class="fas fa-lightbulb text-warning me-2"></i> Solusi & Penanganan</h5>
                            <div class="bg-light p-3 rounded border">
                                {!! nl2br(e($penyakit->deskripsi_solusi)) !!}
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Kolom Kanan: Aksi & Tingkat Keyakinan --}}
                <div class="col-md-4 mb-4">
                    <div class="card shadow border-0 rounded-4 h-100">
                        <div class="card-header bg-secondary text-white py-3 rounded-top-4">
                            <h5 class="card-title mb-0"><i class="fas fa-cog me-2"></i> Detail & Aksi</h5>
                        </div>
                        <div class="card-body p-4 d-flex flex-column align-items-center">
                            
                            {{-- TAMPILAN TINGKAT KEYAKINAN (DIPINDAHKAN KE SINI) --}}
                            <div class="text-center mb-4 pb-3 border-bottom w-100">
                                <h6 class="text-uppercase text-muted mb-2" style="font-size: 0.85rem; letter-spacing: 1px;">Tingkat Keyakinan</h6>
                                <h1 class="display-3 fw-bold text-primary mb-0">{{ $nilai_cf }}%</h1>
                            </div>
                            
                            <p class="text-muted text-center mb-4 small">
                                Anda dapat mengunduh hasil diagnosa ini atau melakukan pengecekan ulang.
                            </p>

                            <div class="d-grid gap-3 w-100 print-hide">
                                <a href="{{ route('diagnosa.index') }}" class="btn btn-primary rounded-pill px-4 py-2 shadow">
                                    <i class="fas fa-redo-alt me-2"></i> Diagnosa Ulang
                                </a>
                                
                                {{-- FORM CETAK PDF --}}
                                <form action="{{ route('diagnosa.cetak') }}" method="POST" target="_blank" class="d-grid">
                                    @csrf
                                    <input type="hidden" name="id_penyakit" value="{{ $penyakit->id_penyakit }}">
                                    
                                    @foreach($gejala_id_array as $id_gejala)
                                        <input type="hidden" name="gejala_ids[]" value="{{ $id_gejala }}">
                                    @endforeach

                                    <button type="submit" class="btn btn-outline-danger rounded-pill px-4 py-2 shadow">
                                        <i class="fas fa-file-pdf me-2"></i> Unduh PDF
                                    </button>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

@push('styles')
<style>
    @media print {
        header, footer, .print-hide { display: none !important; }
        .card { border: 1px solid #ddd !important; box-shadow: none !important; }
        .bg-light { background-color: #fff !important; }
    }
</style>
@endpush
@endsection