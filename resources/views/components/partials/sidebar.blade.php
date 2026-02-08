<nav id="sidebar" class="p-3 d-flex flex-column">
    <!-- Brand/Logo -->
    <a href="#" class="d-flex flex-column align-items-center text-dark text-decoration-none mb-4">
        <i class="fas fa-brain fa-3x text-primary mb-2"></i>
        <span class="fw-bold text-center">Sistem Pakar Deteksi Gangguan Psikologis</span>
    </a>

    <div class="sidebar-nav-wrapper">
        <!-- Navigation Links -->
        <ul class="nav nav-pills flex-column mb-auto">
            <x-ui.nav-link route="dashboard.index" icon="fas fa-home" label="Dashboard" />
            <!-- Pemisah Teks untuk Master Data -->
            <li class="nav-heading px-3 mt-3 mb-1 text-muted text-uppercase small">
                Master Data
            </li>

            <x-ui.nav-link route="gejala.index" active="gejala.*" icon="fas fa-clipboard-list" label="Gejala" />
            <x-ui.nav-link route="penyakit.index" active="penyakit.*" icon="fas fa-brain" label="Penyakit" />
            <x-ui.nav-link route="basis_pengetahuan.index" active="basis-pengetahuan.*" icon="fas fa-project-diagram" label="Basis Pengetahuan" />

    </div>
    @auth
    <!-- User Profile Section -->
    <div class="profile-section mt-auto">
        <div class="d-flex align-items-center">
            <!-- Avatar dinamis berdasarkan inisial nama user -->
            <img src="https://placehold.co/60x60/7E57C2/white?text={{ substr(Auth::user()->name, 0, 1) }}" class="rounded-circle me-3" alt="User Avatar" onerror="this.onerror=null;this.src='https://placehold.co/60x60/EFEFEF/333?text=U';">
            
            <div class="me-auto">
                <!-- Menampilkan nama user yang sedang login -->
                <h6 class="mb-0 fw-bold">{{ Auth::user()->name }}</h6>
                <!-- Menampilkan nama role dari user yang login, dengan fallback 'User' -->
                <small class="text-muted profile-role">{{ Auth::user()->role ?? 'User' }}</small>
            </div>
            
            <!-- Tombol Logout -->
            <a href="{{ route('logout') }}" class="logout-link" title="Logout" 
            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="fas fa-sign-out-alt fa-fw fs-5"></i>
            </a>

            <!-- Form tersembunyi untuk proses logout (metode POST) -->
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </div>
    </div>
    @endauth 
</nav>