<x-layouts.admin :$title :$header>

    <x-ui.card title="Form Tambah Aturan">
        
        <form action="{{ route('basis_pengetahuan.store') }}" method="POST">
            @csrf
            
            {{-- INPUT 1: PILIH PENYAKIT --}}
            <x-forms.select label="Penyakit" name="id_penyakit">
                <option value="">-- Pilih Penyakit --</option>
                @foreach ($penyakits as $p)
                    <option value="{{ $p->id_penyakit }}">
                        [{{ $p->kode_penyakit }}] {{ $p->nama_penyakit }}
                    </option>
                @endforeach
            </x-forms.select>

            {{-- INPUT 2: PILIH GEJALA --}}
            <x-forms.select label="Gejala" name="id_gejala">
                <option value="">-- Pilih Gejala --</option>
                @foreach ($gejalas as $g)
                    <option value="{{ $g->id_gejala }}">
                        [{{ $g->kode_gejala }}] {{ Str::limit($g->nama_gejala, 80) }}
                    </option>
                @endforeach
            </x-forms.select>

            {{-- INPUT 3: CF PAKAR --}}
            <x-forms.input 
                label="Nilai CF Pakar (0.1 - 1.0)" 
                name="cf_pakar" 
                placeholder="Contoh: 0.8" 
                type="number"
                step="0.01"
                min="0"
                max="1"
            />

            {{-- TOMBOL AKSI --}}
            <div class="d-flex justify-content-between mt-4">
                <x-ui.button href="{{ route('basis_pengetahuan.index') }}" color="secondary" size="sm">
                    <i class="fas fa-arrow-left me-1"></i> Batal
                </x-ui.button>

                <x-ui.button type="submit" color="success" size="sm">
                    <i class="fas fa-save me-1"></i> Simpan
                </x-ui.button>
            </div>
        </form>

    </x-ui.card>

</x-layouts.admin>