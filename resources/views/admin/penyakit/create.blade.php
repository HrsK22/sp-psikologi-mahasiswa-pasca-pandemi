<x-layouts.admin :$title :$header>

    <x-ui.card title="Form Tambah Penyakit">
        
        <form action="{{ route('penyakit.store') }}" method="POST">
            @csrf
            
            {{-- INPUT 1: KODE PENYAKIT --}}
            <x-forms.input 
                label="Kode Penyakit" 
                name="kode_penyakit" 
                placeholder="Contoh: S001" 
            />

            {{-- INPUT 2: NAMA PENYAKIT --}}
            <x-forms.input 
                label="Nama Penyakit" 
                name="nama_penyakit" 
                placeholder="Contoh: Stres Ringan" 
            />

            {{-- INPUT 3: SOLUSI (Pakai Textarea) --}}
            <x-forms.textarea
                label="Solusi / Saran"
                name="deskripsi_solusi"
                placeholder="Masukkan solusi penanganan..."
                rows="5"
            />

            {{-- TOMBOL AKSI --}}
            <div class="d-flex justify-content-between mt-4">
                {{-- Tombol Kembali --}}
                <x-ui.button href="{{ route('penyakit.index') }}" color="secondary" size="sm">
                    <i class="fas fa-arrow-left me-1"></i> Batal
                </x-ui.button>

                {{-- Tombol Simpan --}}
                <x-ui.button type="submit" color="success" size="sm">
                    <i class="fas fa-save me-1"></i> Simpan
                </x-ui.button>
            </div>
        </form>

    </x-ui.card>

</x-layouts.admin>