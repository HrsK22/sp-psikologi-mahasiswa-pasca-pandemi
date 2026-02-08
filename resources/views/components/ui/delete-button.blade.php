@props(['action'])

{{-- 
    PERBAIKAN:
    1. Kita hapus tag <form> di sini (karena form-nya pindah ke dalam Modal).
    2. Kita hapus onclick="return confirm()" (agar alert browser hilang).
    3. Kita tambahkan data-bs-toggle="modal" (untuk memanggil modal).
--}}

<x-ui.button 
    type="button" 
    color="danger" 
    size="sm" 
    title="Hapus Data"
    data-bs-toggle="modal" 
    data-bs-target="#modalDelete" 
    data-action="{{ $action }}"
>
    <i class="fas fa-trash"></i>
</x-ui.button>