{{-- Perhatikan: action kita kosongkan dulu, karena nanti diisi oleh Javascript --}}
<x-ui.modal id="modalDelete" title="Konfirmasi Hapus" action="#" method="DELETE">
    
    <div class="text-center py-3">
        <div class="fs-1 text-danger mb-3">
            <i class="fas fa-exclamation-triangle"></i>
        </div>
        <p class="mb-1 fw-bold">Apakah Anda yakin ingin menghapus data ini?</p>
        <p class="text-muted small">Tindakan ini tidak dapat dibatalkan.</p>
    </div>

    <x-slot:footer>
        <button type="submit" class="btn btn-danger btn-sm">
            <i class="fas fa-trash me-1"></i> Ya, Hapus!
        </button>
    </x-slot:footer>

</x-ui.modal>

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const modalDelete = document.getElementById('modalDelete');
        if (modalDelete) {
            modalDelete.addEventListener('show.bs.modal', function (event) {
                // Ambil URL dari tombol yang diklik
                const button = event.relatedTarget;
                const url = button.getAttribute('data-action');
                
                // Cari form di dalam modal dan update action-nya
                const form = modalDelete.querySelector('form');
                if (form) form.setAttribute('action', url);
            });
        }
    });
</script>
@endpush