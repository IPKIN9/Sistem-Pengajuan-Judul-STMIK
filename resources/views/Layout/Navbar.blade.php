<ul class="menu-inner py-1" style="overflow: auto">
    <!-- Dashboard -->
    <li class="menu-item {{ Route::is('home') ? 'active' : '' }} mt-4">
        <a href="{{route ('home')}}" class="menu-link">
            <div data-i18n="Analytics">Dashboard</div>
        </a>
    </li>

    <!-- Layouts -->
    @hasrole('suadmin')
    <li class="menu-header small text-uppercase">
        <span class="menu-header-text">List User</span>
    </li>
    <li class="menu-item {{ Route::is('admin.index') ? 'active' : '' }}">
        <a href="{{ route('admin.index') }}" class="menu-link">
            <div data-i18n="Basic">Profile User</div>
        </a>
    </li>
    <li class="menu-item {{ Route::is('register.index') ? 'active' : '' }}">
        <a href="{{ route('register.index') }}" class="menu-link">
            <div data-i18n="Basic">Data Akun</div>
        </a>
    </li>
    <li class="menu-header small text-uppercase">
        <span class="menu-header-text">Master Data</span>
    </li>
    <li class="menu-item
    {{ Route::is('dosen.index') ? 'open' : '' }} 
    {{ Route::is('mahasiswa.index') ? 'open' : '' }}
    {{ Route::is('persyaratan.index') ? 'open' : '' }}
    ">
        <a href="javascript:void(0);" class="menu-link menu-toggle">
            <i class="menu-icon tf-icons bx bx-layout"></i>
            <div data-i18n="Layouts">Master Data</div>
        </a>

        <ul class="menu-sub">
            <li class="menu-item {{ Route::is('dosen.index') ? 'active' : '' }}">
                <a href="{{ route('dosen.index') }}" class="menu-link">
                    <div data-i18n="Basic">Data Dosen</div>
                </a>
            </li>
            <li class="menu-item {{ Route::is('mahasiswa.index') ? 'active' : '' }}">
                <a href="{{ route('mahasiswa.index') }}" class="menu-link">
                    <div data-i18n="Basic">Data Mahasiswa</div>
                </a>
            </li>
            <li class="menu-item {{ Route::is('persyaratan.index') ? 'active' : '' }}">
                <a href="{{ route('persyaratan.index') }}" class="menu-link">
                    <div data-i18n="Basic">Data Persyaratan</div>
                </a>
            </li>

        </ul>
    </li>
    @endhasrole

    <li class="menu-header small text-uppercase">
        <span class="menu-header-text">Data Lainnya</span>
    </li>
    <li class="menu-item {{ Route::is('si.index') ? 'active' : '' }}">
        <a href="{{ route('si.index') }}" class="menu-link">
            <div data-i18n="Basic">Jadwal Pengajuan</div>
        </a>
    </li>
    <li class="menu-item {{ Route::is('pengajuan.index') ? 'active' : '' }}">
        <a href="{{ route('pengajuan.index') }}" class="menu-link">
            <div data-i18n="Basic">Pengajuan</div>
        </a>
    </li>
    <li class="menu-item {{ Route::is('skripsi.index') ? 'active' : '' }}">
        <a href="{{ route('skripsi.index') }}" class="menu-link">
            <div data-i18n="Basic">Data Skripsi</div>
        </a>
    </li>
    <li class="menu-item {{ Route::is('judul.validation') ? 'active' : '' }}">
        <a href="{{ route('judul.validation') }}" class="menu-link">
            <div data-i18n="Basic">Validasi Judul</div>
        </a>
    </li>

</ul>