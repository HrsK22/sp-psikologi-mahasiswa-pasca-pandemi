<x-layouts.admin :$title :$header>

    <x-ui.card title="Detail Data Gejala">
        
        {{-- 
            TRIK CERDAS:
            Kita tetap pakai <x-forms.input>, tapi kita tambahkan kata 'readonly'.
            Otomatis inputnya jadi tidak bisa diedit.
            
            Kita tetap butuh 'name' karena itu props wajib di component input, 
            meskipun di sini tidak ada form submission.
        --}}

        {{-- KODE GEJALA --}}
        <x-forms.input 
            label="Kode Gejala" 
            name="kode_gejala" 
            :value="$gejala->kode_gejala" 
            readonly 
        />

        {{-- NAMA GEJALA --}}
        <x-forms.input 
            label="Nama Gejala" 
            name="nama" 
            :value="$gejala->nama_gejala" 
            readonly 
        />

        {{-- TOMBOL KEMBALI --}}
        <div class="mt-4">
            <x-ui.button href="{{ route('gejala.index') }}" color="secondary" size="sm">
                <i class="fas fa-arrow-left me-1"></i> Kembali
            </x-ui.button>
        </div>

    </x-ui.card>

</x-layouts.admin>