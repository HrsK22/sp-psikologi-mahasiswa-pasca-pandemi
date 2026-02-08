<x-layouts.admin :$title :$header>
    
    <x-ui.card title="Data Penyakit">
        
        <div class="d-flex flex-wrap justify-content-between align-items-center mb-3">
            <x-ui.button href="{{ route('penyakit.create') }}" color="primary" size="sm" class="mb-2">
                <i class="fas fa-plus me-1"></i> Tambah Penyakit
            </x-ui.button>
            
            <div class="col-12 col-md-auto">
                <x-ui.search-bar :action="route('penyakit.index')" placeholder="Cari penyakit..." />
            </div>
        </div>

        <x-ui.table>
            
            {{-- Slot Header --}}
            <x-slot:header>
                <th>No</th>
                <th>Kode Penyakit</th>
                <th>Nama Penyakit</th>
                <th>Solusi</th>
                <th>Aksi</th>
            </x-slot:header>

            {{-- Slot Body --}}
            @forelse ($penyakits as $item)
                <tr>
                    <td>{{ ($penyakits->currentPage() - 1) * $penyakits->perPage() + $loop->iteration }}</td>
                    
                    {{-- Badge Component --}}
                    <td><x-ui.badge color='danger'>{{ $item->kode_penyakit }}</x-ui.badge></td>
                    
                    <td>{{ $item->nama_penyakit }}</td>
                    
                    {{-- Limit text solusi agar tidak terlalu panjang di tabel --}}
                    <td>{{ Str::limit($item->deskripsi_solusi, 50) }}</td>
                    
                    <td>
                        <div class="d-flex gap-1">
                            {{-- Button Edit --}}
                            <x-ui.button href="{{ route('penyakit.edit', $item->id_penyakit) }}" color="warning" size="sm" class="text-white" title="Edit">
                                <i class="fas fa-pencil-alt"></i>
                            </x-ui.button>
                            
                            {{-- Button Detail --}}
                            <x-ui.button href="{{ route('penyakit.show', $item->id_penyakit) }}" color="info" size="sm" class="text-white" title="Detail">
                                <i class="fas fa-eye"></i>
                            </x-ui.button>
                            
                            {{-- Delete Button Component --}}
                            <x-ui.delete-button :action="route('penyakit.destroy', $item->id_penyakit)" />
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center py-4 text-muted">
                        Data tidak ditemukan.
                    </td>
                </tr>
            @endforelse

        </x-ui.table>

        <div class="d-flex justify-content-end mt-3">
            {{ $penyakits->links() }}
        </div>

    </x-ui.card>

    {{-- MODAL DELETE --}}
    @push('modals')
        <x-ui.modal-delete />
    @endpush

</x-layouts.admin>