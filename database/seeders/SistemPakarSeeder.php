<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Gejala;
use App\Models\Penyakit;
use App\Models\BasisPengetahuan;

class SistemPakarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Bersihkan data lama (Truncate) agar tidak duplikat saat di-seed ulang
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        BasisPengetahuan::truncate();
        Penyakit::truncate();
        Gejala::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        // ---------------------------------------------------
        // 2. Insert Data Penyakit (Solusi)
        // ---------------------------------------------------
        $dataPenyakit = [
            [
                'kode_penyakit' => 'S001',
                'nama_penyakit' => 'Stres Ringan',
                'deskripsi_solusi' => "1. Tarik nafas dalam-dalam (teknik pernapasan 4-7-8).\n2. Minum air putih yang cukup.\n3. Dengarkan musik relaksasi selama 30 menit.\n4. Tersenyum dan cari hiburan ringan.\n5. Keluar sebentar mencari udara segar di lingkungan kampus/kos."
            ],
            [
                'kode_penyakit' => 'S002',
                'nama_penyakit' => 'Stres Sedang',
                'deskripsi_solusi' => "1. Curhat/keluarkan unek-unek kepada teman dekat atau pembimbing akademik.\n2. Lakukan olahraga ringan (jogging/jalan santai).\n3. Luangkan waktu khusus untuk hobi (me time).\n4. Perbaiki pola tidur (minimal 7 jam)."
            ],
            [
                'kode_penyakit' => 'S003',
                'nama_penyakit' => 'Stres Berat',
                'deskripsi_solusi' => "1. Ubah mindset negatif menjadi positif (Cognitive Reframing).\n2. Hubungi keluarga atau orang terdekat untuk dukungan emosional.\n3. Lakukan hal spiritual atau meditasi.\n4. SANGAT DISARANKAN: Segera konsultasi ke psikolog kampus atau profesional."
            ],
            [
                'kode_penyakit' => 'S004',
                'nama_penyakit' => 'Tidak Stres (Sehat)',
                'deskripsi_solusi' => "Alhamdulillah, kondisi mental Anda stabil. Pertahankan pola hidup sehat dan tetap berpikir positif."
            ]
        ];

        foreach ($dataPenyakit as $penyakit) {
            Penyakit::create($penyakit);
        }

        // ---------------------------------------------------
        // 3. Insert Data Gejala
        // ---------------------------------------------------
        $dataGejala = [
            ['kode_gejala' => 'G001', 'nama_gejala' => 'Apakah Anda merasa kondisi fisik Anda bugar untuk kuliah offline?'],
            ['kode_gejala' => 'G002', 'nama_gejala' => 'Apakah Anda kesulitan bangun pagi untuk mengejar jadwal kuliah?'],
            ['kode_gejala' => 'G003', 'nama_gejala' => 'Apakah di tengah kesibukan kuliah saat ini Anda masih sempat melakukan hobi?'],
            ['kode_gejala' => 'G004', 'nama_gejala' => 'Apakah Anda rutin berolahraga ringan sebelum beraktivitas?'],
            ['kode_gejala' => 'G005', 'nama_gejala' => 'Apakah Anda menjaga pola gerak tubuh di masa transisi ini?'],
            ['kode_gejala' => 'G006', 'nama_gejala' => 'Apakah Anda merasa lelah/burnout dengan mobilitas kuliah luring (pulang-pergi kampus)?'],
            ['kode_gejala' => 'G007', 'nama_gejala' => 'Apakah Anda selalu cemas memantau info/tugas akademik di grup WhatsApp/E-learning?'],
            ['kode_gejala' => 'G008', 'nama_gejala' => 'Apakah Anda merasa cemas memikirkan ketertinggalan materi pasca-pandemi?'],
            ['kode_gejala' => 'G009', 'nama_gejala' => 'Apakah Anda sudah mulai bersosialisasi aktif dengan teman kampus secara langsung?'],
            ['kode_gejala' => 'G010', 'nama_gejala' => 'Apakah Anda mudah merasa kesal dengan keramaian atau lingkungan kampus?'],
            ['kode_gejala' => 'G011', 'nama_gejala' => 'Apakah Anda merasa cemas/takut berinteraksi sosial secara tatap muka (Social Anxiety)?'],
            ['kode_gejala' => 'G012', 'nama_gejala' => 'Apakah badan Anda sering terasa demam/lelah mendadak setelah beraktivitas?'],
            ['kode_gejala' => 'G013', 'nama_gejala' => 'Apakah Anda sering merasa pusing/sakit kepala karena tugas?'],
            ['kode_gejala' => 'G014', 'nama_gejala' => 'Apakah Anda sering mengalami keringat dingin saat cemas?'],
            ['kode_gejala' => 'G015', 'nama_gejala' => 'Apakah nafsu makan Anda tidak teratur akhir-akhir ini?'],
            ['kode_gejala' => 'G016', 'nama_gejala' => 'Apakah Anda mengalami insomnia/susah tidur karena memikirkan kuliah?'],
            ['kode_gejala' => 'G017', 'nama_gejala' => 'Apakah tubuh terasa pegal/kaku akibat aktivitas kampus?'],
            ['kode_gejala' => 'G018', 'nama_gejala' => 'Apakah Anda mengalami gangguan pencernaan (maag/asam lambung) saat stres?'],
            ['kode_gejala' => 'G019', 'nama_gejala' => 'Apakah Anda gugup berlebihan saat harus presentasi atau bertemu dosen?'],
            ['kode_gejala' => 'G020', 'nama_gejala' => 'Apakah Anda merasa putus asa menghadapi tantangan akademik pasca-pandemi?'],
        ];

        foreach ($dataGejala as $gejala) {
            Gejala::create($gejala);
        }

        // ---------------------------------------------------
        // 4. Insert Basis Pengetahuan (Rules & CF Pakar)
        // ---------------------------------------------------
        // Mengambil ID agar relasi aman (antisipasi jika ID tidak urut 1,2,3...)
        $getIDPenyakit = fn($kode) => Penyakit::where('kode_penyakit', $kode)->first()->id_penyakit;
        $getIDGejala   = fn($kode) => Gejala::where('kode_gejala', $kode)->first()->id_gejala;

        $rules = [
            // --- S001: Stres Ringan ---
            ['S001', 'G001', 0.62], ['S001', 'G002', 0.68], ['S001', 'G003', 0.88],
            ['S001', 'G004', 0.51], ['S001', 'G005', 0.85], ['S001', 'G006', 0.44],
            ['S001', 'G007', 0.84], ['S001', 'G008', 0.41], ['S001', 'G009', 0.79],
            ['S001', 'G010', 0.49],

            // --- S002: Stres Sedang ---
            ['S002', 'G006', 0.84], ['S002', 'G007', 0.41], ['S002', 'G008', 0.79],
            ['S002', 'G010', 0.48], ['S002', 'G011', 0.79], ['S002', 'G012', 0.66],
            ['S002', 'G013', 0.82], ['S002', 'G014', 0.51], ['S002', 'G016', 0.73],
            ['S002', 'G019', 0.42],

            // --- S003: Stres Berat ---
            ['S003', 'G006', 0.41], ['S003', 'G007', 0.79], ['S003', 'G008', 0.49],
            ['S003', 'G010', 0.79], ['S003', 'G011', 0.66], ['S003', 'G012', 0.82],
            ['S003', 'G013', 0.51], ['S003', 'G014', 0.55], ['S003', 'G015', 0.73],
            ['S003', 'G016', 0.45], ['S003', 'G017', 0.69], ['S003', 'G018', 0.42],
            ['S003', 'G019', 0.50], ['S003', 'G020', 0.66],

            // --- S004: Tidak Stres (Sehat) ---
            ['S004', 'G001', 0.51], ['S004', 'G002', 0.85], ['S004', 'G003', 0.44],
            ['S004', 'G004', 0.84], ['S004', 'G005', 0.41], ['S004', 'G006', 0.79],
        ];

        foreach ($rules as $rule) {
            BasisPengetahuan::create([
                'id_penyakit' => $getIDPenyakit($rule[0]),
                'id_gejala'   => $getIDGejala($rule[1]),
                'cf_pakar'    => $rule[2]
            ]);
        }
    }
}