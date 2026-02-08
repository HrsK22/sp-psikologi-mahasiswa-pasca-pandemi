@props([
    'id', 
    'title', 
    'action' => null,   // URL Form (jika modal ini adalah form)
    'method' => 'POST', // Method Form (POST, GET, PUT, DELETE)
    'size' => null      // Ukuran modal (modal-lg, modal-xl)
])

<div class="modal fade" id="{{ $id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered {{ $size }}">
        <div class="modal-content border-0 shadow">
            
            {{-- Header Modal --}}
            <div class="modal-header">
                <h5 class="modal-title fw-bold">{{ $title }}</h5>
                {{-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> --}}
            </div>

            {{-- LOGIKA PEMBUNGKUS FORM --}}
            {{-- Jika ada 'action', kita bungkus isinya dengan tag <form> --}}
            @if($action)
                <form action="{{ $action }}" method="{{ $method === 'GET' ? 'GET' : 'POST' }}">
                    @if($method !== 'GET')
                        @csrf
                        {{-- Handle method spoofing (PUT/DELETE) --}}
                        @if(in_array($method, ['PUT', 'PATCH', 'DELETE']))
                            @method($method)
                        @endif
                    @endif
            @endif

                {{-- Body Modal (Slot Utama) --}}
                <div class="modal-body">
                    {{ $slot }}
                </div>

                {{-- Footer Modal (Slot Footer) --}}
                <div class="modal-footer bg-light">
                    <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Tutup</button>
                    {{ $footer ?? '' }} {{-- Slot opsional untuk tombol aksi --}}
                </div>

            @if($action)
                </form>
            @endif

        </div>
    </div>
</div>