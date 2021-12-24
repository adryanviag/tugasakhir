<aside class="main-sidebar sidebar-dark-success elevation-4">
    <a href="{{ url('/') }}" class="brand-link">
        <img src="{{ url('logo.png') }}" alt="logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Fakultas <strong>MIPA</strong></span>
    </a>

    <div class="sidebar">
        <div class="user-panel mt-2 mb-2 align-items-center d-flex">
            <div class="image">
                <img src="{{ url('ava.png') }}" class="img-circle" alt="User Image">
            </div>
            <div class="info">
                <div class="d-block">
                    <span style="color: salmon;">User :</span> <span style="color: lightgreen;">{{ auth()->user()->username }}</span>
                </div>
                <span style="color: salmon;">Unit :</span> <span style="color:lightgreen">{{ auth()->user()->unit->Desk }}</span>
            </div>
        </div>

        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column text-sm" data-widget="treeview" role="menu"
                data-accordion="false">
                <li class="nav-item">
                    <a href="{{ url('/') }}" class="nav-link @if ($title === 'Dashboard') active @endif">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                @can('admin')
                    <li class="nav-header">FILES</li>
                    <li class="nav-item">
                        <a href="{{ route('klasifikasi.index') }}" class="nav-link @if ($title === 'Klasifikasi')active @endif">
                            <i class="nav-icon fas fa-layer-group"></i>
                            <p>
                                Klasifikasi
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('lokasi.index') }}" class="nav-link @if ($title === 'Lokasi') active @endif">
                            <i class="nav-icon fas fa-archive"></i>
                            <p>
                                Lokasi
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('instansi.index') }}" class="nav-link @if ($title === 'Instansi') active @endif">
                            <i class="nav-icon fas fa-id-card-alt"></i>
                            <p>
                                Instansi
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('unitkerja.index') }}" class="nav-link @if ($title === 'Unit Kerja') active @endif">
                            <i class="nav-icon fas fa-users-cog"></i>
                            <p>
                                Unit Kerja
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('isidisposisi.index') }}" class="nav-link @if ($title === 'Isi Disposisi') active @endif">
                            <i class="nav-icon fas fa-paste"></i>
                            <p>
                                Isi Disposisi
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('user.index') }}" class="nav-link @if ($title === 'User') active @endif">
                            <i class="nav-icon fas fa-users"></i>
                            <p>
                                User
                            </p>
                        </a>
                    </li>
                @endcan
                <li class="nav-header">PROSES</li>
                @can('admin')
                    <li class="nav-item">
                        <a href="{{ route('suratmasuk.index') }}" class="nav-link @if ($title === 'Surat Masuk') active @endif">
                            <i class="nav-icon fas fa-inbox"></i>
                            <p>Surat Masuk</p>
                        </a>
                    </li>
                @endcan
                <li class="nav-item">
                    <a href="{{ route('terimadisposisi.index') }}" class="nav-link @if ($title === 'Terima Disposisi') active @endif">
                        <i class="nav-icon fas fa-envelope"></i>
                        <p>Terima Disposisi</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('statusdisposisi.index') }}" class="nav-link @if ($title === 'Status Disposisi') active @endif">
                        <i class="nav-icon fas fa-paper-plane"></i>
                        <p>Status Disposisi</p>
                    </a>
                </li>
                <li class="nav-header">AKUN</li>
                <li class="nav-item">
                    <a href="/ganti-pass/{{ auth()->user()->username }}" class="nav-link @if ($title === 'Ganti Password') active @endif">
                        <i class="nav-icon fas fa-lock"></i>
                        <p>Ganti Password</p>
                    </a>
                </li>
                <li class="nav-item mb-3">
                    <form method="post" action="/logout">
                        @csrf
                        <button type="submit" class="nav-link btn btn-danger">
                            <i style="color: white;" class="nav-icon fa fa-sign-out-alt"></i>
                            <p style="color: white;">Logout</p>
                        </button>
                    </form>
                </li>
            </ul>
        </nav>
    </div>
</aside>
