<div class="table-responsive">
    <table {{ $attributes->merge(['class' => 'table table-hover table-bordered align-middle']) }}>
        <thead class="table-light">
            <tr>
                {{-- Slot khusus untuk judul kolom (thead) --}}
                {{ $header }}
            </tr>
        </thead>
        <tbody>
            {{-- Slot untuk isi tabel (tbody) --}}
            {{ $slot }}
        </tbody>
    </table>
</div>