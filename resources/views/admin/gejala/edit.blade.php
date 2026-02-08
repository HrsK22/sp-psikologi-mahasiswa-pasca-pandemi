<x-layouts.admin :$title :$header>

    <x-ui.card title="Form Edit Gejala">
        
        {{-- Form Action mengarah ke update --}}
        <form action="{{ route('gejala.update', $gejala->id_gejala) }}" method="POST">
            @csrf
            @method('PUT')
            
            {{-- 
                PENTING:
                Perhatikan penggunaan titik dua (:) sebelum 'value'.
                :value="$gejala->kode_gejala"
                
                Ini memberitahu Blade bahwa isi di dalamnya adalah variabel PHP,
                bukan teks biasa.
            --}}

            {{-- INPUT KODE GEJALA --}}
            <x-forms.input 
                label="Kode Gejala" 
                name="kode_gejala" 
                :value="$gejala->kode_gejala" 
            />

            {{-- INPUT NAMA GEJALA --}}
            <x-forms.input 
                label="Nama Gejala" 
                name="nama_gejala" 
                :value="$gejala->nama_gejala" 
            />

            {{-- TOMBOL AKSI --}}
            <div class="d-flex justify-content-between mt-4">
                
                {{-- Tombol Batal --}}
                <x-ui.button href="{{ route('gejala.index') }}" color="secondary" size="sm">
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