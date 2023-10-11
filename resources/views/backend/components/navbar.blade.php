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
                <a class="nav-link" href="{{ url('user') }}">
                    <i class="bi bi-person-circle menu-icon"></i>
                    <span class="menu-title">User</span>
                </a>

            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('jaringan') }}">
                    <i class="bi bi-wifi menu-icon"></i>
                    <span class="menu-title">Jaringan</span>
                </a>

            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('shift') }}">
                    <i class="bi bi-box-seam menu-icon"></i>
                    <span class="menu-title">Shift</span>
                </a>

            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('jadwal') }}">
                    <i class="bi bi-calendar menu-icon"></i>
                    <span class="menu-title">Jadwal</span>
                </a>

            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('absensi') }}">
                    <i class="bi bi-file-earmark-text menu-icon"></i>
                    <span class="menu-title">Absensi</span>
                </a>

            </li>
        @endif
    </ul>
</nav>
