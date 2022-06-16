<!DOCTYPE html>
<!-- beautify ignore:start -->
<html
  lang="en"
  class="light-style layout-menu-fixed"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="../assets/"
  data-template="vertical-menu-template-free"
>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <title>Without menu - Layouts | Sneat - Bootstrap 5 HTML Admin Template - Pro</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('/assets/img/favicon/favicon.ico') }}" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="{{ asset('/assets/vendor/fonts/boxicons.css') }}" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ asset('/assets/vendor/css/core.css') }}" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ asset('/assets/vendor/css/theme-default.css') }}" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{ asset('/assets/css/demo.css') }}" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{ asset('/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />

    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="{{ asset('/assets/vendor/js/helpers.js') }}"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="{{ asset('/assets/js/config.js') }}"></script>
  </head>

  <body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar layout-without-menu">
      <div class="layout-container">
        <!-- Layout container -->
        <div class="layout-page">
          <!-- Navbar -->

          <nav
            class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
            id="layout-navbar"
          >
            <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
              <!-- Search -->
              <div class="navbar-nav align-items-center">
                <div class="nav-item d-flex align-items-center">
                  <i class="bx bx-search fs-4 lh-0"></i>
                  <input
                    type="text"
                    class="form-control border-0 shadow-none"
                    placeholder="Cari Namamu Disini..."
                    aria-label="Search..."
                  />
                </div>
              </div>
              <!-- /Search -->

              <ul class="navbar-nav flex-row align-items-center ms-auto">

                <!-- User -->
                <li class="nav-item">
                    <span class="app-brand-logo demo">
                        <img style="width: 100px" height="auto" src="{{ asset('img/logostmik4.png') }}" alt="">
                    </span>
                </li>
                <!--/ User -->
              </ul>
            </div>
          </nav>

          <!-- / Navbar -->

          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
                <div class="row">
                    <div class="col-lg-12 mb-4 order-0">
                        <div class="card">
                            <div class="d-flex align-items-end row">
                                <div class="col-sm-7">
                                    <div class="card-body">
                                        <h4 class="card-title text-primary">Selamat Datang Di Aplikasi JUDULKU</h4>
                                        <p class="mb-4">
                                            Aplikasi ini dibangun agar mempermudah mahasiswa untuk mengajukan judul <span>Proposal Skripsi</span> pada kampus STMIK Adhi Guna
                                        </p>
                                    </div>
                                </div>
                                <div class="col-sm-5 text-center text-sm-left">
                                    <div class="card-body pb-0 px-0 px-md-4">
                                        <img src="../assets/img/illustrations/man-with-laptop-light.png" height="140"
                                            alt="View Badge User" data-app-dark-img="illustrations/man-with-laptop-dark.png"
                                            data-app-light-img="illustrations/man-with-laptop-light.png" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @if ($data['persyaratan'])
                    <div class="col-lg-12 mb-4 order-0">
                        <div class="card">
                            <div class="d-flex align-items-end row">
                                <div class="col-sm-12">
                                    <div class="card-body">
                                        <h4 class="card-title text-primary">Persyaratan</h4>
                                        <p class="mb-4">
                                            @nl2br($data['persyaratan'])
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
                <div class="row">
                    <!-- Transactions -->
                    <div class="col-md-8 col-lg-8 order-0 mb-4">
                        <div class="card h-100">
                            <div class="card-header d-flex align-items-center justify-content-between">
                                <h5 class="card-title m-0 me-2">Jadwal</h5>
                            </div>
                            <div class="card-body">
                              @if (count($data['jadwal_list']) > 0)
                              <ul class="p-0 m-0">
                                @foreach ($data['jadwal_list'] as $d)
                                <li class="d-flex mb-4 pb-1">
                                  <div class="avatar flex-shrink-0 me-3">
                                    <span class="avatar-initial rounded bg-label-primary"><i class="bx bx-mobile-alt"></i></span>
                                  </div>
                                  <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                    <div class="me-2">
                                      <h6 class="mb-0">Jadwal Sesi {{ $d->sesi }}</h6>
                                      <small class="text-muted">{{ date('d-M', strtotime($d->tgl_buka)) }} Sampai {{ date('d-M-Y', strtotime($d->tgl_tutup)) }}</small>
                                    </div>
                                    <div class="user-progress">
                                      <small>
                                        @if ($d->tgl_buka <= date('Y-m-d') and $d->tgl_tutup >= date('Y-m-d'))
                                        <a href="" class="btn btn-primary btn-sm">Buka</a>
                                        @elseif ($d->tgl_buka > date('Y-m-d') and $d->tgl_tutup > date('Y-m-d'))
                                        <small class="text-muted">Belum Buka</small>
                                        @else
                                        <small class="text-danger">Sudah Tutup</small>
                                        @endif
                                      </small>
                                    </div>
                                  </div>
                                </li>
                                @endforeach
                              </ul>
                              @else
                              <ul class="p-0 m-0">
                                  <li class="d-flex mb-4 pb-1">
                                      <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                          <div class="me-2">
                                              <p class="mb-0">
                                              Pengajuan Judul Belum Dibuka
                                          </div>
                                          <div class="user-progress d-flex align-items-center gap-1">
                                              <span class="text-muted"><i class='bx bx-dots-horizontal-rounded'></i></span>
                                          </div>
                                      </div>
                                  </li>
                              </ul>
                              @endif
                            </div>
                        </div>
                    </div>
                    <!--/ Transactions -->
                     <!-- Order Statistics -->
                     <div class="col-md-4 col-lg-4 col-xl-4 order-2 mb-4">
                        <div class="card h-100">
                            <div class="card-header d-flex align-items-center justify-content-between pb-0">
                                <div class="card-title mb-0">
                                    <h5 class="m-0 me-2">Pengumuman</h5>
                                </div>
                            </div>
                            <div class="card-body mt-2" >
                                <div class="d-flex justify-content-between align-items-center mb-4">
                                    <div class="d-flex flex-column align-items-center gap-1">
                                        <span>Download Pengumuman</span>
                                    </div>
                                </div>
                                <ul class="p-0 m-0">
                        <li class="d-flex mb-4 pb-1">
                          <div class="avatar flex-shrink-0 me-3">
                            <span class="avatar-initial rounded bg-label-primary"><i class='bx bxs-file-pdf'></i></span>
                          </div>
                          <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                            <div class="me-2">
                              <h6 class="mb-0">Sesi Pertama</h6>
                              <small class="text-muted">15-Juni-2022</small>
                            </div>
                            <div class="user-progress">
                              <small class=""><a href="#" class="btn rounded-pill btn-icon btn-primary btn-sm">
                              <i class='bx bx-cloud-download'></i>
                              </a></small>
                            </div>
                          </div>
                        </li>
                      </ul>
                            </div>
                        </div>
                    </div>
                    <!--/ Order Statistics -->
                </div>
            </div>
            <!-- / Content -->

            <!-- Footer -->
            <footer class="content-footer footer bg-footer-theme">
              <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
                <div class="mb-2 mb-md-0">
                  ©
                  <script>
                      document.write(new Date().getFullYear());
                  </script>
                  , made with ❤️ by
                  <a href="https://themeselection.com" target="_blank" class="footer-link fw-bolder">ThemeSelection</a>
                </div>
              </div>
            </footer>
            <!-- / Footer -->

            <div class="content-backdrop fade"></div>
          </div>
          <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
      </div>
    </div>

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="{{ asset('/assets/vendor/libs/jquery/jquery.js') }}"></script>
    <script src="{{ asset('/assets/vendor/libs/popper/popper.js') }}"></script>
    <script src="{{ asset('/assets/vendor/js/bootstrap.js') }}"></script>
    <script src="{{ asset('/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>

    <script src="{{ asset('/assets/vendor/js/menu.js') }}"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->

    <!-- Main JS -->
    <script src="{{ asset('/assets/js/main.js') }}"></script>

    <!-- Page JS -->

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
  </body>
</html>
