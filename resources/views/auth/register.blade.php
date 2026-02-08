<x-layouts.auth :title="$title">

    <x-auth.card 
        title="Buat Akun Baru" 
        subtitle="Isi form di bawah untuk mendaftar" 
        icon="fas fa-user-plus"
    >

        {{-- Pastikan action route-nya sesuai dengan route register Anda --}}
        <form action="{{ route('register') }}" method="POST">
            @csrf

            {{-- 1. INPUT NAMA LENGKAP --}}
            <x-forms.input 
                label="Nama Lengkap" 
                name="name" 
                placeholder="Masukkan nama lengkap Anda" 
                icon="fas fa-user" 
            />

            {{-- 2. INPUT EMAIL --}}
            <x-forms.input 
                label="Alamat Email" 
                name="email" 
                type="email" 
                placeholder="contoh@email.com" 
                icon="fas fa-envelope" 
            />

            {{-- 3. INPUT PASSWORD --}}
            <x-forms.input 
                label="Kata Sandi" 
                name="password" 
                type="password" 
                placeholder="Buat kata sandi" 
                icon="fas fa-lock" 
            />
            
            {{-- 4. INPUT KONFIRMASI PASSWORD --}}
            {{-- Note: name="password_confirmation" tidak butuh @error biasanya, jadi aman --}}
            <x-forms.input 
                label="Konfirmasi Kata Sandi" 
                name="password_confirmation" 
                type="password" 
                placeholder="Ulangi kata sandi" 
                icon="fas fa-lock" 
            />

            {{-- TOMBOL SUBMIT --}}
            <div class="d-grid mt-4">
                <button type="submit" class="btn btn-primary btn-lg">Daftar</button>
            </div>

        </form>

        {{-- SLOT FOOTER --}}
        {{-- Link menuju halaman login --}}
        <x-slot:footer>
            Sudah punya akun? <a href="{{ route('login') }}" class="fw-bold text-decoration-none">Masuk di sini</a>
        </x-slot:footer>

    </x-auth.card>

</x-layouts.auth>