<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="">SIM Rayon</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">KW</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li
                class="{{ request()->is('dashboard') ? 'active' : '' }}{{ request()->is('dashboard/*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('dashboard.index') }}"><i class="fas fa-home"></i>
                    <span>Dashboard</span></a>
            </li>
            @if(auth()->user()->role == "pemray")
            <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-calendar"></i><span>Jadwal</span></a>
                <ul class="dropdown-menu">
                    <li
                        class="{{ request()->is('piket') ? 'active' : '' }}{{ request()->is('piket/*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('piket.index') }}"><span> Piket</span></a>
                    </li>
                    <li
                        class="{{ request()->is('kumpul_rayon') ? 'active' : '' }}{{ request()->is('kumpul_rayon/*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('kumpul_rayon.index') }}"><span>Kumpul Rayon</span></a>
                    </li>
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-book"></i><span>Absen</span></a>
                <ul class="dropdown-menu">
                    <li
                        class="{{ request()->is('absen_piket') ? 'active' : '' }}{{ request()->is('absen_piket/*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('absen_piket.index') }}"><span>Absen Piket</span></a>
                    </li>
                    <li
                        class="{{ request()->is('absen_rayon') ? 'active' : '' }}{{ request()->is('absen_rayon/*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('absen_rayon.index') }}"><span>Absen Kehadiran</span></a>
                    </li>
                </ul>
            </li>
            <li
                class="{{ request()->is('kegiatan') ? 'active' : '' }}{{ request()->is('kegiatan/*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('kegiatan.index') }}"><i class="fas fa-spa"></i>
                    <span>Kegiatan</span></a>
            </li>
            <li
                class="{{ request()->is('data-siswa') ? 'active' : '' }}{{ request()->is('data-siswa/*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('data-siswa.index') }}"><i class="fas fa-users"></i>
                    <span>Data Siswa</span></a>
            </li>
            <li
                class="{{ request()->is('prestasi') ? 'active' : '' }}{{ request()->is('prestasi/*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('prestasi.index') }}"><i class="fas fa-trophy"></i>
                    <span>Prestasi</span></a>
            </li>
            @endif
            @if(auth()->user()->role=== "bkk" ||auth()->user()->role == "kepsek")
                <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-calendar"></i><span>Jadwal</span></a>
                <ul class="dropdown-menu">
                    <li
                        class="{{ request()->is('kumpul_rayon') ? 'active' : '' }}{{ request()->is('kumpul_rayon/*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('pengguna.jadwal_kumpul') }}"><span>Kumpul Rayon</span></a>
                    </li>
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-book"></i><span>Absen</span></a>
                <ul class="dropdown-menu">
                    <li
                        class="{{ request()->is('absen_rayon') ? 'active' : '' }}{{ request()->is('absen_rayon/*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('pengguna.absen_rayon') }}"><span>Absen Kehadiran</span></a>
                    </li>
                </ul>
            </li>
            <li
                class="{{ request()->is('admin/kegiatan') ? 'active' : '' }}{{ request()->is('admin/kegiatan/*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('kegiatan-admin.index') }}"><i class="fas fa-spa"></i>
                    <span>Kegiatan</span></a>
            </li>
            <li
                class="{{ request()->is('admin/prestasi') ? 'active' : '' }}{{ request()->is('admin/prestasi/*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('prestasi-admin.index') }}"><i class="fas fa-trophy"></i>
                    <span>Prestasi</span></a>
            </li>
            @endif
            @if(auth()->user()->role == "kesiswaan")
            <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-calendar"></i><span>Jadwal</span></a>
                <ul class="dropdown-menu">
                    <li
                        class="{{ request()->is('piket') ? 'active' : '' }}{{ request()->is('piket/*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('pengguna.jadwal_piket') }}"><span> Piket</span></a>
                    </li>
                    <li
                        class="{{ request()->is('kumpul_rayon') ? 'active' : '' }}{{ request()->is('kumpul_rayon/*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('pengguna.jadwal_kumpul') }}"><span>Kumpul Rayon</span></a>
                    </li>
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-book"></i><span>Absen</span></a>
                <ul class="dropdown-menu">
                    <li
                        class="{{ request()->is('absen_piket') ? 'active' : '' }}{{ request()->is('absen_piket/*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('pengguna.absen_piket') }}"><span>Absen Piket</span></a>
                    </li>
                    <li
                        class="{{ request()->is('absen_rayon') ? 'active' : '' }}{{ request()->is('absen_rayon/*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('pengguna.absen_rayon') }}"><span>Absen Kehadiran</span></a>
                    </li>
                </ul>
            </li>
            <li
                class="{{ request()->is('admin/kegiatan') ? 'active' : '' }}{{ request()->is('admin/kegiatan/*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('kegiatan-admin.index') }}"><i class="fas fa-spa"></i>
                    <span>Kegiatan</span></a>
            </li>
            <li
                class="{{ request()->is('admin/prestasi') ? 'active' : '' }}{{ request()->is('admin/prestasi/*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('prestasi-admin.index') }}"><i class="fas fa-trophy"></i>
                    <span>Prestasi</span></a>
            </li>
            <li class="{{ request()->is('rayon') ? 'active' : '' }}{{ request()->is('rayon/*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('rayon.index') }}"><i class="fas fa-building"></i>
                    <span>Rayon</span></a>
            </li>
            <!-- tambah user & pembimbing rayon hanya bisa diakses oleh admin -->
            <li class="{{ request()->is('user') ? 'active' : '' }}{{ request()->is('user/*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('user.index') }}"><i class="fas fa-users"></i> <span>Tambah
                        User</span></a>
            </li>
            <li class="{{ request()->is('siswa') ? 'active' : '' }}{{ request()->is('siswa/*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('siswa.index') }}"><i class="fas fa-users"></i> <span>Tambah
                        Siswa</span></a>
            </li>
            @endif
        </ul>
    </aside>
</div>
