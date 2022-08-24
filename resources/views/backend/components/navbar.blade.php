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
        @if (Auth::user()->role == 'Admin')
            <li class="nav-item">
                <a class="nav-link" href="{{ url('back/slider') }}">
                    <i class="bi bi-images menu-icon"></i>
                    <span class="menu-title">Slider</span>
                </a>
            </li>
        @endif
        <li class="nav-item">
            <a class="nav-link" href="{{ url('back/product') }}">
                <i class="bi bi-box-seam menu-icon"></i>
                <span class="menu-title">Produk</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ url('back/beritas') }}">
                <i class="bi bi-newspaper menu-icon"></i>
                <span class="menu-title">Berita</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ url('back/diskusi-produk') }}">
                <i class="bi bi-chat-right-text menu-icon"></i>
                <span class="menu-title">Diskusi Produk</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ url('back/diskusi-berita') }}">
                <i class="bi bi-chat-right-text menu-icon"></i>
                <span class="menu-title">Diskusi Berita</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ url('back/profil') }}-{{ Auth::user()->id ?? 2 }}">
                <i class="bi bi-person-fill menu-icon"></i>
                <span class="menu-title">User Profil</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="https://drive.google.com/file/d/1PYG9t6BHHg1Xck_YQpt8j0jhNBnhhsB-/view?usp=sharing">
                <i class="icon-paper menu-icon"></i>
                <span class="menu-title">Panduan</span>
            </a>
        </li>
    </ul>
</nav>
