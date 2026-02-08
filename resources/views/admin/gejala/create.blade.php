<x-layouts.admin :$title :$header>

    <x-ui.card title="Form Tambah Gejala">
        
        <form action="{{ route('gejala.store') }}" method="POST">
            @csrf
            
            {{-- INPUT 1: KODE GEJALA --}}
            {{-- Tidak perlu lagi nulis @error atau class is-invalid manual --}}
            <x-forms.input 
                label="Kode Gejala" 
                name="kode_gejala" 
                placeholder="Contoh: G01" 
            />

            {{-- INPUT 2: NAMA GEJALA --}}
            <x-forms.input 
                label="Nama Gejala" 
                name="nama_gejala" 
                placeholder="Contoh: Daun menguning" 
            />
{{-- 
            <x-forms.textarea
                label="Deskripsi Gejala"
                name="deskripsi"
                placeholder="Deskripsikan gejala secara singkat"
                rows="5"
            /> --}}

            {{-- TOMBOL AKSI --}}
            <div class="d-flex justify-content-between mt-4">
                {{-- Tombol Kembali --}}
                <x-ui.button href="{{ route('gejala.index') }}" color="secondary" size="sm">
                    <i class="fas fa-arrow-left me-1"></i> Batal
                </x-ui.button>

                {{-- Tombol Simpan --}}
                <x-ui.button type="submit" color="success" size="sm">
                    <i class="fas fa-save me-1"></i> Simpan Data
                </x-ui.button>
            </div>

        </form>

    </x-ui.card>

</x-layouts.admin>