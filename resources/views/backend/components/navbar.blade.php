<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="{{ url('dashboard') }}">
                <i class="icon-grid menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>

        </li>
        @if (Auth::user()->role == 'Admin')
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false"
                    aria-controls="ui-basic">
                    <i class="icon-layout menu-icon"></i>
                    <span class="menu-title" style="margin-top: 7px;">Master</span>
                    <i style="margin-top: 7px;" class="menu-arrow"></i>
                </a>
                <div class="collapse" id="ui-basic">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('user') }}">
                                <span class="menu-title">User</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('halaman-dapil') }}">
                                <span class="menu-title">Dapil</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('halaman-kecamatan') }}">
                                <span class="menu-title">Kecamatan</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('kelurahan') }}">
                                <span class="menu-title">Kelurahan</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('partai') }}">
                                <span class="menu-title">Partai</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('jadwal') }}">
                    <i class="bi bi-calendar menu-icon"></i>
                    <span class="menu-title">Jadwal</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('calon') }}">
                    <i class="bi bi-person-circle menu-icon"></i>
                    <span class="menu-title">Calon</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('tps') }}">
                    <i class="bi bi-box-seam menu-icon"></i>
                    <span class="menu-title">TPS</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('suara') }}">
                    <i class="bi bi-volume-up menu-icon"></i>
                    <span class="menu-title">Suara</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#laporan" aria-expanded="false"
                    aria-controls="ui-basic">
                    <i class="bi bi-file-earmark-text menu-icon"></i>
                    <span class="menu-title" style="margin-top: 7px;">Laporan</span>
                    <i style="margin-top: 7px;" class="menu-arrow"></i>
                </a>
                <div class="collapse" id="laporan">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('laporan-dapil') }}">
                                <span class="menu-title">Lap. Dapil</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('laporan-kecamatan') }}">
                                <span class="menu-title">Lap. Kecamatan</span>
                            </a>
                        </li>
                        {{-- <li class="nav-item">
                            <a class="nav-link" href="{{ url('laporan-kursi') }}">
                                <span class="menu-title">Pembagian Kursi</span>
                            </a>
                        </li> --}}
                    </ul>
                </div>
            </li>
        @endif
    </ul>
</nav>
