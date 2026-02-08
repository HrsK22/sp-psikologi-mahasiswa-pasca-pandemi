<?php

namespace App\Http\Controllers;

use App\Models\Gejala;
use App\Models\Penyakit;
use App\Models\BasisPengetahuan;
use App\Models\Riwayat;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf; 
use Illuminate\Support\Facades\Auth;

class DiagnosaController extends Controller
{
    /**
     * Tampilkan Halaman Form Diagnosa
     */
    public function index()
    {
        $gejalas = Gejala::all();
        
        return view('guest.diagnosa.index', [
            'title' => 'Diagnosa Gangguan Psikologis',
            'gejalas' => $gejalas
        ]);
    }

    /**
     * Proses Perhitungan Diagnosa
     */
    public function proses(Request $request)
    {
        // 1. Ambil input array 'diagnosa' dari form
        // Format: [ 1 => "1", 2 => "0", 3 => "1", ... ]
        $diagnosa = $request->input('diagnosa');

        // Validasi: Pastikan ada data yang dikirim
        if (!$diagnosa || !is_array($diagnosa)) {
            return redirect()->back()->with('error', 'Silakan jawab pertanyaan kuesioner terlebih dahulu.');
        }

        // 2. Filter hanya gejala yang bernilai "1" (Ya)
        // array_filter akan membuang yang nilainya "0" (Tidak)
        $selectedGejalaIds = array_keys(array_filter($diagnosa, function($value) {
            return $value == '1';
        }));

        // Validasi: User harus menjawab "Ya" setidaknya pada satu gejala
        if (empty($selectedGejalaIds)) {
            return redirect()->back()->with('error', 'Tidak ada gejala yang dipilih (Semua jawaban Tidak). Sistem tidak dapat mendiagnosa.');
        }

        // -------------------------------------------------------------
        // ALGORITMA FORWARD CHAINING
        // -------------------------------------------------------------
        $rules = BasisPengetahuan::whereIn('id_gejala', $selectedGejalaIds)
                    ->with('penyakit') 
                    ->get();

        if ($rules->isEmpty()) {
            return redirect()->back()->with('error', 'Kombinasi gejala yang Anda alami tidak mengarah pada diagnosa spesifik dalam basis pengetahuan kami.');
        }

        $groupedRules = $rules->groupBy('id_penyakit');

        // -------------------------------------------------------------
        // PERHITUNGAN CERTAINTY FACTOR (CF)
        // -------------------------------------------------------------
        $finalResults = []; 

        foreach ($groupedRules as $penyakitId => $penyakitRules) {
            
            $cfCombine = 0; 

            foreach ($penyakitRules as $rule) {
                $cfPakar = $rule->cf_pakar;
                $cfUser = 1.0; // User menjawab "Ya" = 1.0

                $currentCf = $cfPakar * $cfUser;

                // Rumus CF Sequential: CF_new = CF_old + CF_current * (1 - CF_old)
                if ($cfCombine == 0) {
                    $cfCombine = $currentCf;
                } else {
                    $cfCombine = $cfCombine + $currentCf * (1 - $cfCombine);
                }
            }

            $finalResults[$penyakitId] = $cfCombine;
        }

        // -------------------------------------------------------------
        // HASIL AKHIR
        // -------------------------------------------------------------
        
        arsort($finalResults);

        $winnerId = array_key_first($finalResults);
        $winnerValue = $finalResults[$winnerId];

        $penyakitTerpilih = Penyakit::find($winnerId);

        // (Opsional) Simpan Riwayat jika diperlukan
        // ...

        return view('guest.diagnosa.hasil', [
            'title' => 'Hasil Diagnosa',
            'penyakit' => $penyakitTerpilih,
            'nilai_cf' => number_format($winnerValue * 100, 2), 
            'gejala_id_array' => $selectedGejalaIds,
            'semua_hasil' => $finalResults 
        ]);
    }

    /**
     * Cetak PDF Hasil Diagnosa
     */
    public function cetak(Request $request)
    {
        $idPenyakit = $request->input('id_penyakit');
        $gejalaIds = $request->input('gejala_ids');

        if (!$idPenyakit || !$gejalaIds) {
            return redirect()->route('diagnosa.index');
        }

        $penyakit = Penyakit::findOrFail($idPenyakit);
        $gejalas = Gejala::whereIn('id_gejala', $gejalaIds)->get();

        $data = [
            'title' => 'Laporan Hasil Diagnosa',
            'penyakit' => $penyakit,
            'gejalas' => $gejalas,
            'tanggal' => date('d F Y')
        ];

        $pdf = Pdf::loadView('guest.diagnosa.hasil_diagnosa_pdf', $data);
        
        return $pdf->download('Hasil-Diagnosa-Psikologi.pdf');
    }
}