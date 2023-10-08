<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="{{ url('dashboard') }}">
                <i class="icon-grid menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>

        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                <i class="icon-layout menu-icon"></i>
                <span class="menu-title">Master</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> 
                        <a class="nav-link" href="{{ url('user') }}">User</a>
                    </li>
                    <li class="nav-item"> 
                        <a class="nav-link" href="#">Tahun</a>
                    </li>
                    <li class="nav-item"> 
                        <a class="nav-link" href="{{ url('jadwal') }}">Jadwal</a>
                    </li>
                    <li class="nav-item"> 
                        <a class="nav-link" href="#">Dosen</a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#tahap1" aria-expanded="false" aria-controls="ui-basic">
                <i class="bi bi-box-seam menu-icon"></i>
                <span class="menu-title">Pengusulan</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="tahap1">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> 
                        <a class="nav-link" href="{{url('judul')}}">Judul</a>
                    </li>
                    <li class="nav-item"> 
                        <a class="nav-link" href="{{ url('proposal') }}">Proposal</a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#tahap2" aria-expanded="false" aria-controls="ui-basic">
                <i class="bi bi-box-seam menu-icon"></i>
                <span class="menu-title">Pelaksanaan</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="tahap2">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> 
                        <a class="nav-link" href="#">RAB</a>
                    </li>
                    <li class="nav-item"> 
                        <a class="nav-link" href="#">Kontrak</a>
                    </li>
                    <li class="nav-item"> 
                        <a class="nav-link" href="#">Surat Izin</a>
                    </li>
                    <li class="nav-item"> 
                        <a class="nav-link" href="#">Sem. Antara</a>
                    </li>
                    <li class="nav-item"> 
                        <a class="nav-link" href="#">Luaran</a>
                    </li>
                    <li class="nav-item"> 
                        <a class="nav-link" href="#">Sem. Hasil</a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#tahap3" aria-expanded="false" aria-controls="ui-basic">
                <i class="bi bi-box-seam menu-icon"></i>
                <span class="menu-title">Pengawasan</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="tahap3">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> 
                        <a class="nav-link" href="#">Monev</a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ url('notifikasi') }}">
                <i class="bi bi-chat-left-text menu-icon"></i>
                <span class="menu-title">Notifikasi</span>
            </a>

        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">
                <i class="bi bi-sd-card menu-icon"></i>
                <span class="menu-title">Database Dok</span>
            </a>

        </li>
    </ul>
</nav>
