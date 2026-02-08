<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Penyakit;
use Illuminate\Http\Request;

class PenyakitController extends Controller
{
    public function index(Request $request)
    {
        $title = 'Data Penyakit';
        $header = 'Kelola Data Penyakit & Solusi';

        $query = Penyakit::query();

        if ($request->has('keyword') && $request->keyword != '') {
            $keyword = $request->keyword;
            $query->where('nama_penyakit', 'like', '%' . $keyword . '%')
                  ->orWhere('kode_penyakit', 'like', '%' . $keyword . '%');
        }

        $penyakits = $query->oldest()->paginate(10);
        
        return view('admin.penyakit.index', compact('penyakits', 'title', 'header'));
    }

    public function create()
    {
        $title = 'Tambah Penyakit';
        $header = 'Form Tambah Penyakit Baru';

        return view('admin.penyakit.create', compact('title', 'header'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'kode_penyakit' => 'required|unique:penyakits,kode_penyakit|max:10',
            'nama_penyakit' => 'required|string|max:255',
            'deskripsi_solusi' => 'required|string',
        ]);

        Penyakit::create($validated);

        return redirect()->route('penyakit.index')
                         ->with('success', 'Data Penyakit berhasil ditambahkan!');
    }

    public function show($id)
    {
        $title = 'Detail Penyakit';
        $header = 'Detail Data Penyakit';

        $penyakit = Penyakit::findOrFail($id);

        return view('admin.penyakit.show', compact('penyakit', 'title', 'header'));
    }

    public function edit($id)
    {
        $title = 'Edit Penyakit';
        $header = 'Form Edit Data Penyakit';

        $penyakit = Penyakit::findOrFail($id);

        return view('admin.penyakit.edit', compact('penyakit', 'title', 'header'));
    }

    public function update(Request $request, $id)
    {
        $penyakit = Penyakit::findOrFail($id);

        $validated = $request->validate([
            'kode_penyakit' => 'required|max:10|unique:penyakits,kode_penyakit,'.$id.',id_penyakit',
            'nama_penyakit' => 'required|string|max:255',
            'deskripsi_solusi' => 'required|string',
        ]);

        $penyakit->update($validated);

        return redirect()->route('penyakit.index')
                         ->with('success', 'Data Penyakit berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $penyakit = Penyakit::findOrFail($id);
        $penyakit->delete();

        return redirect()->route('penyakit.index')
                         ->with('success', 'Data Penyakit berhasil dihapus!');
    }
}