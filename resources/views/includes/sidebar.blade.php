<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ url('/home') }}" class="brand-link">
        <span class="brand-text font-weight-light"><p></i> APLIKASI PENGGAJIAN</span></p>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
            with font-awesome or any other icon font library -->
            
                <li class="nav-item">
                    <a href="{{ url('/home') }}" class="nav-link @yield('dashboard')">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item @yield('master-data')">
                    <a href="#" class="nav-link ">
                        <i class="nav-icon fas fa-database"></i>
                        <p>
                            Master Data
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('pengguna.index') }}" class="nav-link @yield('pengguna')">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Data Pengguna</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('jabatan.index') }} " class="nav-link @yield('jabatan')">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Data Jabatan</p>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a href="{{ route('karyawan.index') }}" class="nav-link @yield('karyawan')">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Data Karyawan</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('absensi.index') }}" class="nav-link @yield('absensi')">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Data Absensi</p>
                            </a>
                        </li>
                       
                        <li class="nav-item">
                            <a href="{{ route('lembur.index') }}" class="nav-link @yield('lembur')">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Data Lembur</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="{{ route('penggajian.index') }}" class="nav-link @yield('penggajian')">
                        <i class="nav-icon fas fa-dollar-sign"></i>
                        <p>
                            Penggajian
                        </p>
                    </a>
                </li>
                <li class="nav-item @yield('laporan')">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-book"></i>
                        <p>
                            Laporan
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('laporan.index') }}" class="nav-link @yield('lap_penggajian')">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Laporan Penggajian</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('laporan_jabatan.index') }}" class="nav-link @yield('lap_penggajian_jabatan')">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Laporan Per-Jabatan</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('jurnalUmum.index') }}" class="nav-link @yield('lap_jurnal_umum')">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Laporan Jurnal Umum</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="{{ route('level.index') }}" class="nav-link @yield('role')">
                        <i class="nav-icon fas fa-user-shield"></i>
                        <p>
                            Level
                        </p>
                    </a>
                </li>
        
                <li class="nav-item">
                    <a href="{{ route('slipgaji.index') }}" class="nav-link @yield('penggajian')">
                        <i class="nav-icon fas fa-dollar-sign"></i>
                        <p>
                            Slip Gaji
                        </p>
                    </a>
                </li>
            
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>