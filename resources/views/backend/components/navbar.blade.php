<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="{{ url('dashboard') }}">
                <i class="icon-grid menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>

        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ url('back/user') }}">
                <i class="bi bi-person-fill menu-icon"></i>
                <span class="menu-title">User</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic2" aria-expanded="false" aria-controls="ui-basic2">
                <i class="icon-layout menu-icon"></i>
                <span class="menu-title">Uji Agregate Halus</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic2">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> 
                        <a class="nav-link" href="{{ url('/back/berat-isi-halus') }}">Berat Isi</a>
                    </li>
                    <li class="nav-item"> 
                        <a class="nav-link" href="#">Analisa Saringan</a>
                    </li>
                    <li class="nav-item"> 
                        <a class="nav-link" href="#">Pengujian SSD</a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                <i class="icon-layout menu-icon"></i>
                <span class="menu-title">Uji Agregate Kasar</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> 
                        <a class="nav-link" href="#">Berat Isi</a>
                    </li>
                    <li class="nav-item"> 
                        <a class="nav-link" href="#">Analisa Saringan</a>
                    </li>
                    <li class="nav-item"> 
                        <a class="nav-link" href="#">Pengujian SSD</a>
                    </li>
                    <li class="nav-item"> 
                        <a class="nav-link" href="#">Gradasi</a>
                    </li>
                    <li class="nav-item"> 
                        <a class="nav-link" href="#">Los Angeles</a>
                    </li>
                </ul>
            </div>
        </li>
        
        <li class="nav-item">
            <a class="nav-link" href="{{ url('back/user') }}">
                <i class="bi bi-file-earmark menu-icon"></i>
                <span class="menu-title">Dokumen Ref</span>
            </a>
        </li>
    </ul>
</nav>
