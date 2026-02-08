@extends('layouts.guest')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            
            {{-- Header Judul --}}
            <div class="text-center mb-5">
                <h2 class="fw-bold display-6 text-primary">Form Diagnosa</h2>
                <p class="lead text-muted">
                    Jawablah pertanyaan di bawah ini sesuai dengan kondisi yang Anda rasakan.
                </p>
            </div>

            <div class="card shadow border-0 rounded-4">
                <div class="card-header bg-primary text-white py-3 rounded-top-4">
                    <h5 class="card-title mb-0 text-center"><i class="fas fa-list-check me-2"></i> Kuesioner Gejala</h5>
                </div>
                <div class="card-body p-4 p-md-5">

                    {{-- Pesan Error --}}
                    @if(session('error'))
                        <div class="alert alert-warning alert-dismissible fade show mb-4 border-start border-warning border-4" role="alert">
                            <div class="d-flex align-items-center">
                                <i class="fas fa-exclamation-triangle fa-2x me-3"></i>
                                <div>
                                    <strong>Mohon Maaf!</strong><br>
                                    {{ session('error') }}
                                </div>
                            </div>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <form action="{{ route('diagnosa.proses') }}" method="POST">
                        @csrf
                        
                        <div class="row g-3">
                            @foreach($gejalas as $gejala)
                                <div class="col-12">
                                    <div class="p-3 border rounded card-checkbox h-100 d-flex flex-column flex-md-row align-items-md-center justify-content-between">
                                        
                                        {{-- Bagian Pertanyaan --}}
                                        <div class="d-flex align-items-center mb-3 mb-md-0">
                                            <span class="badge bg-light text-dark border me-3">{{ $gejala->kode_gejala }}</span>
                                            <label class="form-check-label fw-medium text-dark cursor-pointer mb-0">
                                                {{ $gejala->nama_gejala }}
                                            </label>
                                        </div>

                                        {{-- Bagian Pilihan Ya/Tidak --}}
                                        <div class="d-flex gap-2">
                                            <input type="radio" class="btn-check" 
                                                   name="diagnosa[{{ $gejala->id_gejala }}]" 
                                                   id="ya-{{ $gejala->id_gejala }}" 
                                                   value="1" required>
                                            <label class="btn btn-outline-primary btn-sm px-4 rounded-pill" for="ya-{{ $gejala->id_gejala }}">
                                                Ya
                                            </label>

                                            <input type="radio" class="btn-check" 
                                                   name="diagnosa[{{ $gejala->id_gejala }}]" 
                                                   id="tidak-{{ $gejala->id_gejala }}" 
                                                   value="0">
                                            <label class="btn btn-outline-secondary btn-sm px-4 rounded-pill" for="tidak-{{ $gejala->id_gejala }}">
                                                Tidak
                                            </label>
                                        </div>

                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <div class="text-center mt-5">
                            <button type="submit" class="btn btn-primary btn-lg px-5 py-3 rounded-pill shadow fw-bold">
                                <i class="fas fa-stethoscope me-2"></i> Analisa Sekarang
                            </button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>

@push('styles')
<style>
    .card-checkbox { transition: all 0.2s ease-in-out; background-color: #fdfdfd; }
    .card-checkbox:hover { background-color: #e9f2ff; border-color: #0d6efd !important; transform: translateY(-2px); box-shadow: 0 4px 6px rgba(0,0,0,0.05); }
    .cursor-pointer { cursor: pointer; }
</style>
@endpush
@endsection