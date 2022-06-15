<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="menu-inner py-1">
        <!-- Dashboard -->
        <li class="menu-item {{ Route::is('dashboard.index') ? 'active' : '' }}">
            <a href="" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Dashboard</div>
            </a>
        </li>

        <!-- Layouts -->
        @hasrole('suadmin')
            <li class="menu-header small text-uppercase">
                <span class="menu-header-text">Master Data</span>
            </li>
            <li
                class="menu-item
        {{ Route::is('dosen.index') ? 'open' : '' }} 
        {{ Route::is('mahasiswa.index') ? 'open' : '' }}
        {{ Route::is('si.index') ? 'open' : '' }}
        {{ Route::is('admin.index') ? 'open' : '' }}
        {{ Route::is('judul.index') ? 'open' : '' }}
        {{ Route::is('jurnal.index') ? 'open' : '' }}
        {{ Route::is('pengajuan.index') ? 'open' : '' }}
        {{ Route::is('skripsi.index') ? 'open' : '' }}
        ">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons bx bx-layout"></i>
                    <div data-i18n="Layouts">Master Data</div>
                </a>

                <ul class="menu-sub">
                    <li class="menu-item {{ Route::is('dosen.index') ? 'active' : '' }}">
                        <a href="{{ route('dosen.index') }}" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-collection"></i>
                            <div data-i18n="Basic">Data Dosen</div>
                        </a>
                    </li>
                    <li class="menu-item {{ Route::is('mahasiswa.index') ? 'active' : '' }}">
                        <a href="{{ route('mahasiswa.index') }}" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-collection"></i>
                            <div data-i18n="Basic">Data Mahasiswa</div>
                        </a>
                    </li>
                    <li class="menu-item {{ Route::is('si.index') ? 'active' : '' }}">
                        <a href="{{ route('si.index') }}" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-collection"></i>
                            <div data-i18n="Basic">Data Sistem Informasi</div>
                        </a>
                    </li>
                    <li class="menu-item {{ Route::is('admin.index') ? 'active' : '' }}">
                        <a href="{{ route('admin.index') }}" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-collection"></i>
                            <div data-i18n="Basic">Data Admin</div>
                        </a>
                    </li>
                    <li class="menu-item {{ Route::is('judul.index') ? 'active' : '' }}">
                        <a href="{{ route('judul.index') }}" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-collection"></i>
                            <div data-i18n="Basic">Data Judul</div>
                        </a>
                    </li>
                    <li class="menu-item {{ Route::is('jurnal.index') ? 'active' : '' }}">
                        <a href="{{ route('jurnal.index') }}" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-collection"></i>
                            <div data-i18n="Basic">Data Jurnal</div>
                        </a>
                    </li>
                    <li class="menu-item {{ Route::is('pengajuan.index') ? 'active' : '' }}">
                        <a href="{{ route('pengajuan.index') }}" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-collection"></i>
                            <div data-i18n="Basic">Data Pengajuan</div>
                        </a>
                    </li>
                    <li class="menu-item {{ Route::is('skripsi.index') ? 'active' : '' }}">
                        <a href="{{ route('skripsi.index') }}" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-collection"></i>
                            <div data-i18n="Basic">Data Skripsi</div>
                        </a>
                    </li>
                </ul>
            </li>
        @endhasrole

        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Pages</span>
        </li>
        <li class="menu-item">
            <a href="" class="menu-link">
                <i class="menu-icon tf-icons bx bx-collection"></i>
                <div data-i18n="Basic">Contoh</div>
            </a>
        </li>

    </ul>
</nav>
