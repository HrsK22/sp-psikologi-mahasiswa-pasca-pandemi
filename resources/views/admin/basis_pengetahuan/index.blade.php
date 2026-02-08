<x-layouts.admin :$title :$header>
    
    <x-ui.card title="Data Basis Pengetahuan (Aturan)">
        
        <div class="d-flex flex-wrap justify-content-between align-items-center mb-3">
            <x-ui.button href="{{ route('basis_pengetahuan.create') }}" color="primary" size="sm" class="mb-2">
                <i class="fas fa-plus me-1"></i> Tambah Aturan
            </x-ui.button>
            
            <div class="col-12 col-md-auto">
                <x-ui.search-bar :action="route('basis_pengetahuan.index')" placeholder="Cari aturan..." />
            </div>
        </div>

        <x-ui.table>
            
            {{-- Slot Header --}}
            <x-slot:header>
                <th>No</th>
                <th>Penyakit</th>
                <th>Gejala</th>
                <th>CF Pakar</th>
                <th>Aksi</th>
            </x-slot:header>

            {{-- Slot Body --}}
            @forelse ($basisPengetahuans as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    
                    {{-- Relasi Penyakit --}}
                    <td>
                        <x-ui.badge color="info">{{ $item->penyakit->kode_penyakit }}</x-ui.badge> 
                        {{ $item->penyakit->nama_penyakit }}
                    </td>
                    
                    {{-- Relasi Gejala --}}
                    <td>
                        <x-ui.badge color="secondary">{{ $item->gejala->kode_gejala }}</x-ui.badge> 
                        {{ Str::limit($item->gejala->nama_gejala, 50) }}
                    </td>
                    
                    {{-- Nilai CF --}}
                    <td><x-ui.badge color="success">{{ $item->cf_pakar }}</x-ui.badge></td>
                    
                    <td>
                        <div class="d-flex gap-1">
                            {{-- Button Edit --}}
                            <x-ui.button href="{{ route('basis_pengetahuan.edit', $item->id_basis) }}" color="warning" size="sm" class="text-white" title="Edit">
                                <i class="fas fa-pencil-alt"></i>
                            </x-ui.button>
                            
                            {{-- Button Detail --}}
                            <x-ui.button href="{{ route('basis_pengetahuan.show', $item->id_basis) }}" color="info" size="sm" class="text-white" title="Detail">
                                <i class="fas fa-eye"></i>
                            </x-ui.button>
                            
                            {{-- Delete Button --}}
                            <x-ui.delete-button :action="route('basis_pengetahuan.destroy', $item->id_basis)" />
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

        {{-- Note: Basis Pengetahuan biasanya banyak, pagination optional tapi di controller kita pakai get() all. 
             Jika ingin pagination, tinggal ganti di controller dan tambahkan links() disini --}}

    </x-ui.card>

    @push('modals')
        <x-ui.modal-delete />
    @endpush

</x-layouts.admin>