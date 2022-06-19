@extends('Web.UserDashboard')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-lg-12 mb-4 order-0">
                <div class="card">
                    <div class="d-flex align-items-end row">
                        <div class="col-sm-8">
                            <div class="card-body">
                                <h4 class="card-title text-success">Selamat Datang Di Aplikasi JUDULKU</h4>
                                @if (session('status'))
                                    <p>{{ session('status') }}</p>
                                @endif
                                @if ($data['persyaratan'])
                                    <h6 class="card-title text-primary">Persyaratan</h6>
                                    <p class="mt-2">
                                        @nl2br($data['persyaratan']->persyaratan)
                                    </p>
                                    <div class="col-sm-4">
                                        <a href="{{ asset('storage/format_file/' . $data['persyaratan']->format_file) }}"
                                            target="_blank" type="button" class="btn btnsm btn-info">Unduh Format
                                            Jurnal</a>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="col-sm-4 text-center text-sm-left">
                            <div class="card-body pb-0 px-0 px-md-4">
                                <img src="../assets/img/illustrations/man-with-laptop-light.png" height="140"
                                    alt="View Badge User" data-app-dark-img="illustrations/man-with-laptop-dark.png"
                                    data-app-light-img="illustrations/man-with-laptop-light.png" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
                                            <span class="avatar-initial rounded bg-label-primary"><i
                                                    class="bx bx-mobile-alt"></i></span>
                                        </div>
                                        <div
                                            class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                            <div class="me-2">
                                                <h6 class="mb-0">Jadwal Sesi {{ $d->sesi }}</h6>
                                                <small class="text-muted">{{ date('d-M', strtotime($d->tgl_buka)) }}
                                                    Sampai
                                                    {{ date('d-M-Y', strtotime($d->tgl_tutup)) }}</small>
                                            </div>
                                            <div class="user-progress">
                                                <small>
                                                    @if ($d->tgl_buka <= date('Y-m-d') and $d->tgl_tutup >= date('Y-m-d'))
                                                        <a href="{{ route('pengajuan_form', $d->id) }}"
                                                            class="btn btn-primary btn-sm">Buka</a>
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
                    <div class="card-body mt-2">
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <div class="d-flex flex-column align-items-center gap-1">
                                <span>Download Pengumuman</span>
                            </div>
                        </div>
                        <ul class="p-0 m-0">
                            <li class="d-flex mb-4 pb-1">
                                <div class="avatar flex-shrink-0 me-3">
                                    <span class="avatar-initial rounded bg-label-primary"><i
                                            class='bx bxs-file-pdf'></i></span>
                                </div>
                                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                    <div class="me-2">
                                        <h6 class="mb-0">Sesi Pertama</h6>
                                        <small class="text-muted">15-Juni-2022</small>
                                    </div>
                                    <div class="user-progress">
                                        <small class=""><a href="#"
                                                class="btn rounded-pill btn-icon btn-primary btn-sm">
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
@endsection
