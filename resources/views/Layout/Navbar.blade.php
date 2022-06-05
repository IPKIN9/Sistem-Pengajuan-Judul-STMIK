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
        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Master Data</span>
        </li>
        <li class="menu-item
        {{ Route::is('dosen.index') ? 'active' : '' }}
        {{ Route::is('mahasiswa.index') ? 'active' : '' }}
        ">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-layout"></i>
                <div data-i18n="Layouts">Master Data</div>
            </a>

            <ul class="menu-sub 
            {{ Route::is('dosen.index') ? 'show' : '' }} 
            {{ Route::is('mahasiswa.index') ? 'show' : '' }}
            ">
                <li class="menu-item {{ Route::is('dosen.index') ? 'active' : '' }}">
                    <a href="{{route ('dosen.index')}}" class="menu-link">
                        <i class="menu-icon tf-icons bx bx-collection"></i>
                        <div data-i18n="Basic">Data Dosen</div>
                    </a>
                </li>
                <li class="menu-item {{ Route::is('mahasiswa.index') ? 'active' : '' }}">
                    <a href="{{route ('mahasiswa.index')}}" class="menu-link">
                        <i class="menu-icon tf-icons bx bx-collection"></i>
                        <div data-i18n="Basic">Data Mahasiswa</div>
                    </a>
                </li>
            </ul>
        </li>

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