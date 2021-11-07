<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="/">FMIPA UNRI</a>
    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse"
        data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
</header>
<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3">
        <ul class="nav flex-column mb-2">
            <li class="nav-item">
                <a class="nav-link {{ $title === 'Dashboard' ? 'active' : '' }}" aria-current="page" href="/">
                    <span data-feather="home"></span>
                    Dashboard
                </a>
            </li>
        </ul>
        @can('admin')
        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mb-1 text-muted">
            <span>FILE</span>
        </h6>
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link {{ $title === 'Klasifikasi' ? 'active' : '' }}" aria-current="page"
                    href="/klasifikasi">
                    <span data-feather="git-branch"></span>
                    Klasifikasi
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ $title === 'Lokasi' ? 'active' : '' }}" href="/lokasi">
                    <span data-feather="map"></span>
                    Lokasi
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ $title === 'Instansi' ? 'active' : '' }}" href="/instansi">
                    <span data-feather="layers"></span>
                    Instansi
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ $title === 'Unit Kerja' ? 'active' : '' }}" href="/unitkerja">
                    <span data-feather="users"></span>
                    Unit Kerja
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ $title === 'Isi Disposisi' ? 'active' : '' }}" href="/isidisposisi">
                    <span data-feather="file-text"></span>
                    Isi Disposisi
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ $title === 'User' ? 'active' : '' }}" href="/user">
                    <span data-feather="users"></span>
                    User
                </a>
            </li>
        </ul>
        @endcan

        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-2 mb-1 text-muted">
            <span>PROSES</span>
        </h6>
        <ul class="nav flex-column mb-2">
            @can('admin')
            <li class="nav-item">
                <a class="nav-link {{ $title === 'Surat Masuk' ? 'active' : '' }}" href="/suratmasuk">
                    <span data-feather="mail"></span>
                    Surat Masuk
                </a>
            </li>
            @endcan
            <li class="nav-item">
                <a class="nav-link {{ $title === 'Terima Disposisi' ? 'active' : '' }}" href="/terimadisposisi">
                    <span data-feather="mail"></span>
                    Terima Disposisi
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ $title === 'Status Disposisi' ? 'active' : '' }}" href="/statusdisposisi">
                    <span data-feather="mail"></span>
                    Status Disposisi
                </a>
            </li>
        </ul>
        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-3 mb-1 text-muted">
            <span>
                <strong class="text-danger">{{ auth()->user()->username }},</strong> Unit: <strong class="text-warning">{{ auth()->user()->unit->Nama }}</strong>
            </span>
        </h6>
        <ul class="nav flex-column mb-2">
            <li class="nav-item active">
                <a class="nav-link {{ $title === 'Ganti Password' ? 'active' : '' }}" href="/ganti-pass/{{ auth()->user()->username }}">
                    <span data-feather="lock"></span>
                    Ganti Password
                </a>
            </li>
            <li class="nav-item">
                <form action="/logout" method="post">
                    @csrf
                    <button class="nav-link border-0 bg-transparent">
                        <span data-feather="log-out"></span>
                        Logout
                    </button>
                </form>
            </li>
        </ul>
        </h6>
    </div>
</nav>
