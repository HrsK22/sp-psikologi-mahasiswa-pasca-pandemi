<x-layouts.admin :$title :$header>
    
    <x-ui.card title="Data Gejala">
        
        <div class="d-flex flex-wrap justify-content-between align-items-center mb-3">
            <x-ui.button href="{{ route('gejala.create') }}" color="primary" size="sm" class="mb-2">
                <i class="fas fa-plus me-1"></i> Tambah Gejala
            </x-ui.button>
            
            <div class="col-12 col-md-auto">
                <x-ui.search-bar :action="route('gejala.index')" placeholder="Cari gejala..." />
            </div>
        </div>

        <x-ui.table>
            
            {{-- Slot Header --}}
            <x-slot:header>
                <th>No</th>
                <th>Kode Gejala</th>
                <th>Nama Gejala</th>
                <th>Aksi</th>
            </x-slot:header>

            {{-- Slot Body --}}
            @forelse ($gejalas as $item)
                <tr>
                    <td>{{ ($gejalas->currentPage() - 1) * $gejalas->perPage() + $loop->iteration }}</td>
                    
                    {{-- Badge Component --}}
                    <td><x-ui.badge>{{ $item->kode_gejala }}</x-ui.badge></td>
                    
                    <td>{{ $item->nama_gejala }}</td>
                    
                    <td>
                        <div class="d-flex gap-1">
                            {{-- Button Edit --}}
                            <x-ui.button href="{{ route('gejala.edit', $item->id_gejala) }}" color="warning" size="sm" class="text-white" title="Edit">
                                <i class="fas fa-pencil-alt"></i>
                            </x-ui.button>
                            
                            {{-- Button Detail --}}
                            <x-ui.button href="{{ route('gejala.show', $item->id_gejala) }}" color="info" size="sm" class="text-white" title="Detail">
                                <i class="fas fa-eye"></i>
                            </x-ui.button>
                            
                            {{-- Delete Button Component --}}
                            {{-- Perhatikan: Kita kirim route destroy ke sini --}}
                            <x-ui.delete-button :action="route('gejala.destroy', $item->id_gejala)" />
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center py-4 text-muted">
                        Data tidak ditemukan.
                    </td>
                </tr>
            @endforelse

        </x-ui.table>

        <div class="d-flex justify-content-end mt-3">
            {{ $gejalas->links() }}
        </div>

    </x-ui.card>

    {{-- 3. MODAL DELETE (Ditaruh di luar Card, tapi masih di dalam Layout) --}}
    {{-- Cukup dipanggil satu kali saja untuk menghandle semua baris data --}}
    @push('modals')
        <x-ui.modal-delete />
    @endpush

</x-layouts.admin>