<!-- Sidebar -->
<ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar" style="background-color: #ff4d6d;">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">SMK Jujutsu</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ request()->is('/') ? 'active' : '' }}">
        <a class="nav-link" href="/">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span class="{{ request()->is('/') ? 'font-weight-bold' : '' }}">Dashboard</span>
        </a>
    </li>

    <!-- Nav Item - Tables -->
    <li class="nav-item {{ request()->is('users*') ? 'active' : '' }}">
        <a class="nav-link" href="/users">
            <i class="fas fa-fw fa-user"></i>
            <span class="{{ request()->is('users*') ? 'font-weight-bold' : '' }}">User</span>
        </a>
    </li>

    <li class="nav-item {{ request()->is('siswas*') ? 'active' : '' }}">
        <a class="nav-link" href="/siswas">
            <i class="fas fa-fw fa-user"></i>
            <span class="{{ request()->is('siswas*') ? 'font-weight-bold' : '' }}">Siswa</span>
        </a>
    </li>

    <li class="nav-item {{ request()->is('gurus*') ? 'active' : '' }}">
        <a class="nav-link" href="/gurus">
            <i class="fas fa-fw fa-user"></i>
            <span class="{{ request()->is('gurus*') ? 'font-weight-bold' : '' }}">Guru</span>
        </a>
    </li>

    <li class="nav-item {{ request()->is('mapels*') ? 'active' : '' }}">
        <a class="nav-link" href="/mapels">
            <i class="fas fa-fw fa-user"></i>
            <span class="{{ request()->is('mapels*') ? 'font-weight-bold' : '' }}">Mata Pelajaran</span>
        </a>
    </li>

</ul>
<!-- End of Sidebar -->
