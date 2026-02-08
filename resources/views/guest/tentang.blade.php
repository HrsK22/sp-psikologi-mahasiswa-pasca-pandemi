@extends('layouts.guest')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            
            {{-- Header Judul --}}
            <div class="text-center mb-5">
                <h2 class="fw-bold display-6 text-primary">Tentang Kami</h2>
                <p class="lead text-muted">
                    Tim pengembang Sistem Pakar Deteksi Gangguan Psikologis.
                </p>
            </div>

            <div class="card shadow border-0 rounded-4">
                <div class="card-header bg-primary text-white py-3 rounded-top-4">
                    <h5 class="card-title mb-0 text-center">
                        <i class="fas fa-users me-2"></i> Kelompok 2 - TI22B
                    </h5>
                </div>
                <div class="card-body p-4">
                    
                    <div class="table-responsive">
                        <table class="table table-hover align-middle">
                            <thead class="table-light">
                                <tr>
                                    <th class="text-center" width="10%">No</th>
                                    <th width="50%">Nama Mahasiswa</th>
                                    <th width="40%" class="text-center">NIM</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="text-center">1</td>
                                    <td class="fw-medium">Shifa Maharani</td>
                                    <td class="text-center"><span class="badge bg-light text-dark border">220511052</span></td>
                                </tr>
                                <tr>
                                    <td class="text-center">2</td>
                                    <td class="fw-medium">Vina Pikria Aenun</td>
                                    <td class="text-center"><span class="badge bg-light text-dark border">220511034</span></td>
                                </tr>
                                <tr>
                                    <td class="text-center">3</td>
                                    <td class="fw-medium">Roy Zikin</td>
                                    <td class="text-center"><span class="badge bg-light text-dark border">220511125</span></td>
                                </tr>
                                <tr>
                                    <td class="text-center">4</td>
                                    <td class="fw-medium">Nurul Fatekha Syarifudin</td>
                                    <td class="text-center"><span class="badge bg-light text-dark border">230511221</span></td>
                                </tr>
                                <tr>
                                    <td class="text-center">5</td>
                                    <td class="fw-medium">Haris Kurniawan</td>
                                    <td class="text-center"><span class="badge bg-light text-dark border">220511085</span></td>
                                </tr>
                                <tr>
                                    <td class="text-center">6</td>
                                    <td class="fw-medium">Ibnu Alwan</td>
                                    <td class="text-center"><span class="badge bg-light text-dark border">220511014</span></td>
                                </tr>
                                <tr>
                                    <td class="text-center">7</td>
                                    <td class="fw-medium">Fedo Orvala Pradipa</td>
                                    <td class="text-center"><span class="badge bg-light text-dark border">220511129</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    {{-- <div class="text-center mt-4">
                        <a href="{{ route('diagnosa.index') }}" class="btn btn-outline-primary rounded-pill px-4">
                            <i class="fas fa-arrow-left me-2"></i> Kembali ke Diagnosa
                        </a>
                    </div> --}}

                </div>
            </div>

        </div>
    </div>
</div>
@endsection