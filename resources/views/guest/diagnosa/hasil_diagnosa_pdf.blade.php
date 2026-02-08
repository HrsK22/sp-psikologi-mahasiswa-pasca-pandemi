<!DOCTYPE html>
<html>
<head>
    <title>Laporan Hasil Diagnosa</title>
    <style>
        body { font-family: sans-serif; font-size: 11pt; color: #333; line-height: 1.6; }
        .header { text-align: center; margin-bottom: 25px; border-bottom: 3px solid #4e54c8; padding-bottom: 15px; }
        .header h1 { margin: 0; font-size: 18pt; color: #4e54c8; text-transform: uppercase; }
        .header p { margin: 5px 0; font-size: 10pt; color: #666; }
        
        .section-title { font-weight: bold; font-size: 13pt; margin-top: 25px; margin-bottom: 10px; color: #333; border-left: 5px solid #4e54c8; padding-left: 10px; }
        
        .result-box { background-color: #f0f4ff; border: 1px solid #dbeafe; padding: 15px; border-radius: 5px; margin-bottom: 20px; }
        .result-name { font-size: 16pt; font-weight: bold; color: #1e3a8a; display: block; margin-bottom: 5px;}
        .result-code { background-color: #1e3a8a; color: white; padding: 3px 8px; font-size: 9pt; border-radius: 4px; }

        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        table, th, td { border: 1px solid #ddd; }
        th { background-color: #f8f9fa; padding: 8px; text-align: left; font-size: 10pt; }
        td { padding: 8px; font-size: 10pt; }
        
        .footer { position: fixed; bottom: 0; left: 0; right: 0; font-size: 9pt; color: #999; text-align: center; padding: 10px; border-top: 1px solid #eee; }
    </style>
</head>
<body>

    <div class="header">
        <h1>Laporan Kesehatan Mental</h1>
        <p>Sistem Pakar Deteksi Dini Gangguan Psikologis Mahasiswa</p>
        <p>Tanggal Cetak: {{ $tanggal }}</p>
    </div>

    <!-- HASIL DIAGNOSA -->
    <div class="section-title">Hasil Analisa</div>
    <div class="result-box">
        <span class="result-name">{{ $penyakit->nama_penyakit }}</span>
        <span class="result-code">{{ $penyakit->kode_penyakit }}</span>
    </div>

    <!-- GEJALA -->
    <div class="section-title">Gejala yang Dilaporkan</div>
    <table>
        <thead>
            <tr>
                <th style="width: 30px; text-align: center;">No</th>
                <th style="width: 70px; text-align: center;">Kode</th>
                <th>Gejala yang Dialami</th>
            </tr>
        </thead>
        <tbody>
            @foreach($gejalas as $gejala)
            <tr>
                <td style="text-align: center;">{{ $loop->iteration }}</td>
                <td style="text-align: center;"><b>{{ $gejala->kode_gejala }}</b></td>
                <td>{{ $gejala->nama_gejala }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <!-- SOLUSI -->
    <div class="section-title">Saran & Solusi Penanganan</div>
    <div style="background: #fff; border: 1px solid #eee; padding: 15px; border-radius: 5px;">
        {!! nl2br(e($penyakit->deskripsi_solusi)) !!}
    </div>

    <div class="footer">
        Dicetak secara otomatis oleh Sistem Pakar Psikologi. <br>
        Harap konsultasikan hasil ini dengan profesional untuk diagnosa medis yang akurat.
    </div>

</body>
</html>