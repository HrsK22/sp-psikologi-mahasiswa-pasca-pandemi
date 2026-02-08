<x-layouts.admin :$title :$header>

    <x-ui.card title="Detail Data Penyakit">
        
        {{-- KODE PENYAKIT --}}
        <x-forms.input 
            label="Kode Penyakit" 
            name="kode_penyakit" 
            :value="$penyakit->kode_penyakit" 
            readonly 
        />

        {{-- NAMA PENYAKIT --}}
        <x-forms.input 
            label="Nama Penyakit" 
            name="nama_penyakit" 
            :value="$penyakit->nama_penyakit" 
            readonly 
        />

        {{-- SOLUSI --}}
        <x-forms.textarea
            label="Solusi / Saran"
            name="deskripsi_solusi"
            :value="$penyakit->deskripsi_solusi"
            readonly
            rows="5"
        />

        {{-- TOMBOL KEMBALI --}}
        <div class="mt-4">
            <x-ui.button href="{{ route('penyakit.index') }}" color="secondary" size="sm">
                <i class="fas fa-arrow-left me-1"></i> Kembali
            </x-ui.button>
        </div>

    </x-ui.card>

</x-layouts.admin>