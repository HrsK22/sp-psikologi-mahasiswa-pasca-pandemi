<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BasisPengetahuan;
use App\Models\Gejala;
use App\Models\Penyakit;
use Illuminate\Http\Request;

class BasisPengetahuanController extends Controller
{
    public function index(Request $request)
    {
        $title = 'Basis Pengetahuan';
        $header = 'Kelola Aturan (Rules) & CF Pakar';

        // Eager load relasi 'penyakit' dan 'gejala' agar query efisien
        $query = BasisPengetahuan::with(['penyakit', 'gejala']);

        // Fitur Pencarian (Berdasarkan nama penyakit atau gejala)
        if ($request->has('keyword') && $request->keyword != '') {
            $keyword = $request->keyword;
            $query->whereHas('penyakit', function($q) use ($keyword) {
                $q->where('nama_penyakit', 'like', '%' . $keyword . '%');
            })->orWhereHas('gejala', function($q) use ($keyword) {
                $q->where('nama_gejala', 'like', '%' . $keyword . '%');
            });
        }

        // Urutkan berdasarkan Penyakit agar rapi
        $basisPengetahuans = $query->get()->sortBy('penyakit.kode_penyakit'); 
        // Note: pagination bisa ditambahkan manual jika data sangat banyak
        // Disini saya gunakan get() dan sortBy collection agar grouping terlihat jelas
        
        return view('admin.basis_pengetahuan.index', compact('basisPengetahuans', 'title', 'header'));
    }

    public function create()
    {
        $title = 'Tambah Aturan';
        $header = 'Form Tambah Basis Pengetahuan Baru';

        // Kirim data untuk Dropdown
        $penyakits = Penyakit::all();
        $gejalas = Gejala::all();

        return view('admin.basis_pengetahuan.create', compact('title', 'header', 'penyakits', 'gejalas'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_penyakit' => 'required|exists:penyakits,id_penyakit',
            'id_gejala'   => 'required|exists:gejalas,id_gejala',
            'cf_pakar'    => 'required|numeric|min:0|max:1',
        ]);
        // dd($validated);
        // Cek duplikasi aturan (Gejala X untuk Penyakit Y tidak boleh double)
        $exists = BasisPengetahuan::where('id_penyakit', $request->id_penyakit)
                                  ->where('id_gejala', $request->id_gejala)
                                  ->exists();

        if ($exists) {
            return back()
                ->withInput()
                ->with('error', 'Aturan untuk Gejala dan Penyakit ini sudah ada!'); 
        }

        BasisPengetahuan::create($validated);

        return redirect()->route('basis_pengetahuan.index')
                         ->with('success', 'Aturan baru berhasil ditambahkan!');
    }

    public function show($id)
    {
        $title = "Detail Aturan";
        $header = "Detail Data Basis Pengetahuan";

        $basis = BasisPengetahuan::with(['penyakit', 'gejala'])->findOrFail($id);
        return view('admin.basis_pengetahuan.show', compact('basis', 'title', 'header'));
    }

    public function edit($id)
    {
        $title = 'Edit Aturan';
        $header = 'Form Edit Basis Pengetahuan';

        $basis = BasisPengetahuan::findOrFail($id);
        $penyakits = Penyakit::all();
        $gejalas = Gejala::all();

        return view('admin.basis_pengetahuan.edit', compact('basis', 'title', 'header', 'penyakits', 'gejalas'));
    }

    public function update(Request $request, $id)
    {
        $basis = BasisPengetahuan::findOrFail($id);

        $validated = $request->validate([
            'id_penyakit' => 'required|exists:penyakits,id_penyakit',
            'id_gejala'   => 'required|exists:gejalas,id_gejala',
            'cf_pakar'    => 'required|numeric|min:0|max:1',
        ]);

        // Cek duplikasi jika mengubah pasangan penyakit-gejala
        if ($basis->id_penyakit != $request->id_penyakit || $basis->id_gejala != $request->id_gejala) {
            $exists = BasisPengetahuan::where('id_penyakit', $request->id_penyakit)
                                      ->where('id_gejala', $request->id_gejala)
                                      ->where('id_basis_pengetahuan', '!=', $id)
                                      ->exists();
            if ($exists) {
                return back()->withErrors(['msg' => 'Aturan kombinasi ini sudah ada!']);
            }
        }

        $basis->update($validated);

        return redirect()->route('basis_pengetahuan.index')
                         ->with('success', 'Data Aturan berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $basis = BasisPengetahuan::findOrFail($id);
        $basis->delete();

        return redirect()->route('basis_pengetahuan.index')
                         ->with('success', 'Data Aturan berhasil dihapus!');
    }
}