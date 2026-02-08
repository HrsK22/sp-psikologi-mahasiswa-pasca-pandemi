<x-layouts.auth :title="$title">

    <x-auth.card 
        title="Selamat Datang" 
        subtitle="Silakan masuk untuk melanjutkan" 
        icon="fas fa-brain"
    >
        <form action="{{ route('login.post') }}" method="POST">
            @csrf

            {{-- 
                1. INPUT EMAIL 
                - Kita tambahkan atribut 'autofocus' (ini akan otomatis masuk via $attributes->merge)
                - Menggunakan icon amplop
            --}}
            <x-forms.input 
                label="Alamat Email" 
                name="email" 
                type="email" 
                placeholder="contoh@email.com" 
                icon="fas fa-envelope" 
                autofocus 
            />

            <x-forms.input 
                label="Kata Sandi" 
                name="password" 
                type="password" 
                placeholder="Masukkan kata sandi" 
                icon="fas fa-lock" 
            />

            {{-- TOMBOL SUBMIT --}}
            <div class="d-grid mt-4">
                <button type="submit" class="btn btn-primary btn-lg">Masuk</button>
            </div>
        </form>

        {{-- SLOT FOOTER LINK --}}
        <x-slot:footer>
            @if($showRegisterLink)
            Belum punya akun? <a href="{{ route('register') }}" class="fw-bold text-decoration-none">Daftar di sini</a>
            @endif
        </x-slot:footer>
    </x-auth.card>

</x-layouts.auth>