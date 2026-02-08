<x-layouts.admin :$title :$header>

    <x-ui.card title="Form Edit Aturan">
        
        <form action="{{ route('basis_pengetahuan.update', $basis->id_basis) }}" method="POST">
            @csrf
            @method('PUT')
            
            {{-- EDIT PENYAKIT --}}
            <x-forms.select label="Penyakit" name="id_penyakit">
                <option value="">-- Pilih Penyakit --</option>
                @foreach ($penyakits as $p)
                    <option value="{{ $p->id_penyakit }}" {{ $basis->id_penyakit == $p->id_penyakit ? 'selected' : '' }}>
                        [{{ $p->kode_penyakit }}] {{ $p->nama_penyakit }}
                    </option>
                @endforeach
            </x-forms.select>

            {{-- EDIT GEJALA --}}
            <x-forms.select label="Gejala" name="id_gejala">
                <option value="">-- Pilih Gejala --</option>
                @foreach ($gejalas as $g)
                    <option value="{{ $g->id_gejala }}" {{ $basis->id_gejala == $g->id_gejala ? 'selected' : '' }}>
                        [{{ $g->kode_gejala }}] {{ Str::limit($g->nama_gejala, 80) }}
                    </option>
                @endforeach
            </x-forms.select>

            {{-- EDIT CF PAKAR --}}
            <x-forms.input 
                label="Nilai CF Pakar" 
                name="cf_pakar" 
                :value="$basis->cf_pakar" 
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
                    <i class="fas fa-save me-1"></i> Simpan Perubahan
                </x-ui.button>
            </div>
        </form>

    </x-ui.card>

</x-layouts.admin>