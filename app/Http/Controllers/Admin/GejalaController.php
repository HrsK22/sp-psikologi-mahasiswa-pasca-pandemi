<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gejala;
use Illuminate\Http\Request;

class GejalaController extends Controller
{
    /**
     * Menampilkan daftar gejala (Read).
     */
    public function index(Request $request)
    {
        $title = 'Data Gejala';
        $header = 'Kelola Data Gejala';

        // Query Builder
        $query = Gejala::query();

        // Fitur Pencarian
        if ($request->has('keyword') && $request->keyword != '') {
            $keyword = $request->keyword;
            $query->where('nama_gejala', 'like', '%' . $keyword . '%')
                  ->orWhere('kode_gejala', 'like', '%' . $keyword . '%');
        }

        // Ambil data dengan pagination (10 data per halaman)
        $gejalas = $query->oldest()->paginate(10);
        
        return view('admin.gejala.index', compact('gejalas', 'title', 'header'));
    }

    /**
     * Menampilkan form tambah gejala (Create - View).
     */
    public function create()
    {
        $title = 'Tambah Gejala';
        $header = 'Form Tambah Gejala Baru';

        return view('admin.gejala.create', compact('title', 'header'));
    }

    /**
     * Menyimpan data gejala baru (Create - Action).
     */
    public function store(Request $request)
    {
        // Validasi
        $validated = $request->validate([
            'kode_gejala' => 'required|unique:gejalas,kode_gejala|max:10',
            'nama_gejala' => 'required|string|max:255', // REVISI: nama -> nama_gejala
        ], [
            'kode_gejala.required' => 'Kode Gejala wajib diisi',
            'kode_gejala.unique' => 'Kode Gejala sudah ada',
            'nama_gejala.required' => 'Nama Gejala wajib diisi',
        ]);

        // Simpan
        Gejala::create($validated);

        return redirect()->route('gejala.index')
                         ->with('success', 'Data Gejala berhasil ditambahkan!');
    }

    /**
     * Menampilkan detail gejala (Show).
     */
    public function show($id)
    {
        $title = 'Detail Gejala';
        $header = 'Detail Data Gejala';

        $gejala = Gejala::findOrFail($id);

        return view('admin.gejala.show', compact('gejala', 'title', 'header'));
    }

    /**
     * Menampilkan form edit gejala (Update - View).
     */
    public function edit($id)
    {
        $title = 'Edit Gejala';
        $header = 'Form Edit Data Gejala';

        $gejala = Gejala::findOrFail($id);

        return view('admin.gejala.edit', compact('gejala', 'title', 'header'));
    }

    /**
     * Memperbarui data gejala (Update - Action).
     */
    public function update(Request $request, $id)
    {
        // Cari data dulu agar fail jika tidak ketemu
        $gejala = Gejala::findOrFail($id);

        // Validasi (kecualikan ID saat ini untuk cek unique)
        // Perhatikan parameter ke-3 validasi unique adalah primary key value
        // Parameter ke-4 adalah nama kolom primary key (id_gejala)
        $validated = $request->validate([
            'kode_gejala' => 'required|max:10|unique:gejalas,kode_gejala,'.$id.',id_gejala',
            'nama_gejala' => 'required|string|max:255',
        ]);

        // Update
        $gejala->update($validated);

        return redirect()->route('gejala.index')
                         ->with('success', 'Data Gejala berhasil diperbarui!');
    }

    /**
     * Menghapus data gejala (Delete).
     */
    public function destroy($id)
    {
        $gejala = Gejala::findOrFail($id);
        
        // Hapus (Rules terkait akan terhapus otomatis karena cascade di migration)
        $gejala->delete();

        return redirect()->route('gejala.index')
                         ->with('success', 'Data Gejala berhasil dihapus!');
    }
}