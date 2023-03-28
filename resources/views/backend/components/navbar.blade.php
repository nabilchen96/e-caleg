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
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                <i class="icon-layout menu-icon"></i>
                <span class="menu-title">Pengujian</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> 
                        <a class="nav-link" href="#">Agregate</a>
                    </li>
                    <li class="nav-item"> 
                        <a class="nav-link" href="#">Soil</a>
                    </li>
                    <li class="nav-item"> 
                        <a class="nav-link" href="#">Concrete</a>
                    </li>
                    <li class="nav-item"> 
                        <a class="nav-link" href="#">Concrete</a>
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
