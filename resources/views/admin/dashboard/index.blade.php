<x-layouts.admin :title="$title" :header="$header">
    <div class="row g-4 mb-4">
        <x-ui.stat-card 
            title="Gejala"
            :value=$totalGejala
            icon="fas fa-clipboard-list"
            color="secondary"
        />

        <x-ui.stat-card 
            title="Total Penyakit"
            :value=$totalPenyakit
            icon="fas fa-brain"
            color="danger"
        />

        <x-ui.stat-card 
            title="Total Basis Pengetahuan"
            :value=$totalBasisPengetahuan
            icon="fas fa-project-diagram"
            color="info"
        />
    </div>
</x-layouts.admin>
