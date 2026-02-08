<x-layouts.admin :$title :$header>

    <x-ui.card title="Detail Aturan">
        
        {{-- PENYAKIT (READONLY) --}}
        <x-forms.input 
            label="Penyakit" 
            name="penyakit_display" 
            :value="'[' . $basis->penyakit->kode_penyakit . '] ' . $basis->penyakit->nama_penyakit" 
            readonly 
        />

        {{-- GEJALA (READONLY) --}}
        <x-forms.input 
            label="Gejala" 
            name="gejala_display" 
            :value="'[' . $basis->gejala->kode_gejala . '] ' . $basis->gejala->nama_gejala" 
            readonly 
        />

        {{-- CF PAKAR (READONLY) --}}
        <x-forms.input 
            label="Nilai CF Pakar" 
            name="cf_pakar" 
            :value="$basis->cf_pakar" 
            readonly 
        />

        {{-- TOMBOL KEMBALI --}}
        <div class="mt-4">
            <x-ui.button href="{{ route('basis_pengetahuan.index') }}" color="secondary" size="sm">
                <i class="fas fa-arrow-left me-1"></i> Kembali
            </x-ui.button>
        </div>

    </x-ui.card>

</x-layouts.admin>