<x-layouts.admin :$title :$header>

    <x-ui.card title="Form Edit Penyakit">
        
        <form action="{{ route('penyakit.update', $penyakit->id_penyakit) }}" method="POST">
            @csrf
            @method('PUT')
            
            {{-- INPUT KODE PENYAKIT --}}
            <x-forms.input 
                label="Kode Penyakit" 
                name="kode_penyakit" 
                :value="$penyakit->kode_penyakit" 
            />

            {{-- INPUT NAMA PENYAKIT --}}
            <x-forms.input 
                label="Nama Penyakit" 
                name="nama_penyakit" 
                :value="$penyakit->nama_penyakit" 
            />

            {{-- INPUT SOLUSI --}}
            <x-forms.textarea
                label="Solusi / Saran"
                name="deskripsi_solusi"
                :value="$penyakit->deskripsi_solusi"
                rows="5"
            />

            {{-- TOMBOL AKSI --}}
            <div class="d-flex justify-content-between mt-4">
                
                {{-- Tombol Batal --}}
                <x-ui.button href="{{ route('penyakit.index') }}" color="secondary" size="sm">
                    <i class="fas fa-arrow-left me-1"></i> Batal
                </x-ui.button>

                {{-- Tombol Simpan --}}
                <x-ui.button type="submit" color="success" size="sm">
                    <i class="fas fa-save me-1"></i> Simpan Perubahan
                </x-ui.button>
                
            </div>
        </form>

    </x-ui.card>

</x-layouts.admin>