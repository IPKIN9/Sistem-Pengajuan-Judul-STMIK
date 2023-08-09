@extends('Layout.TemplateDash')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-xl-12">
                <h4 class="text-muted">Data Sistem Informasi</h4>
                <div class="nav-align-top mb-4">
                    <ul class="nav nav-pills mb-3 nav-fill" role="tablist">
                        <li class="nav-item">
                            <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab"
                                data-bs-target="#navs-pills-justified-home" aria-controls="navs-pills-justified-home"
                                aria-selected="true">
                                <i class="tf-icons bx bx-home"></i> Data Table
                            </button>
                        </li>
                        <li class="nav-item">
                            <button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
                                data-bs-target="#navs-pills-justified-profile" aria-controls="navs-pills-justified-profile"
                                aria-selected="false">
                                <i class="tf-icons bx bx-user"></i> Input Data
                            </button>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="navs-pills-justified-home" role="tabpanel">
                            <div class="table-responsive text-nowrap">
                                <table class="table" id="table">
                                    <thead>
                                        <tr class="text-nowrap">
                                            <th>No</th>
                                            <th>Tanggal Buka</th>
                                            <th>Tanggal Tutup</th>
                                            <th>Sesi</th>
                                            <th>Opsi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $no = 1;
                                        @endphp
                                        @foreach ($SI as $d)
                                            <tr>
                                                <th scope="row">{{ $no++ }}</th>
                                                <td>{{ $d->tgl_buka }}</td>
                                                <td>{{ $d->tgl_tutup }}</td>
                                                <td>{{ $d->sesi }}</td>
                                                <td>
                                                    <button type="button" id="editId" data-id="{{ $d->id }}"
                                                        data-bs-toggle="modal" data-bs-target="#modalUpdate"
                                                        class="btn rounded-pill btn-outline-primary"><i
                                                            class='bx bx-message-square-edit'></i></button>
                                                    <button type="button" id="deleteId" data-id="{{ $d->id }}"
                                                        class="btn rounded-pill btn-outline-danger"><i
                                                            class='bx bx-trash'></i></button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="navs-pills-justified-profile" role="tabpanel">
                            <div class="col-xxl">
                                <div class="card-header d-flex align-items-center justify-content-between">
                                    <h5 class="mb-0">Input Data Sistem Informasi</h5>
                                </div>
                                <div class="card-body">
                                    <form id="formSimpan">
                                        @csrf
                                        <div class="row mb-3">
                                            <label class="col-sm-2 col-form-label" for="basic-default-name">Tanggal
                                                Buka</label>
                                            <div class="col-sm-10">
                                                <input type="date" class="form-control" name="tgl_buka" id="tgl_buka"
                                                    placeholder="Input Tanggal Buka">
                                                <p class="text-danger miniAlert text-capitalize" id="alertTglBuka"></p>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label class="col-sm-2 col-form-label" for="basic-default-name">Tanggal
                                                Tutup</label>
                                            <div class="col-sm-10">
                                                <input type="date" class="form-control" name="tgl_tutup" id="tgl_tutup"
                                                    placeholder="Input Tanggal Tutup">
                                                <p class="text-danger miniAlert text-capitalize" id="alertTglTutup"></p>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label class="col-sm-2 col-form-label" for="basic-default-name">Sesi</label>
                                            <div class="col-sm-10">
                                                <input type="number" class="form-control" name="sesi" id="sesi"
                                                    placeholder="Input Sesi">
                                                <p class="text-danger miniAlert text-capitalize" id="alertSesi"></p>
                                            </div>
                                        </div>
                                        <div class="row justify-content-end">
                                            <div class="col-sm-10">
                                                <button type="button" class="btn btn-primary" id="saveId">Save</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('#table').DataTable();

            $('#saveId').on('click', function() {
                let url = `{{ config('app.url') }}` + "/api/sistem_informasi";
                let data = $('#formSimpan').serialize();
                $.ajax({
                    url: url,
                    method: "POST",
                    data: data,
                    success: function(result) {
                        Swal.fire({
                            title: result.response.title,
                            text: result.response.message,
                            icon: result.response.icon,
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Oke'
                        }).then((result) => {
                            location.reload();
                        });
                    },
                    error: function(result) {
                        let data = result.responseJSON
                        let errorRes = data.errors
                        Swal.fire({
                            icon: data.response.icon,
                            title: data.response.title,
                            text: data.response.message,
                        });
                        if (errorRes.length >= 1) {
                            $('.miniAlert').html('');
                            $('#alertTglBuka').html(errorRes.data.tgl_buka);
                            $('#alertTglTutup').html(errorRes.data.tgl_tutup);
                            $('#alertSesi').html(errorRes.data.sesi);
                            $('#alertPersyaratan').html(errorRes.data.persyaratan);
                        }
                    }
                });
            });

            $(document).on('click', '#editId', function() {
                let dataId = $(this).data('id');
                let url = `{{ config('app.url') }}` + "/api/sistem_informasi/" + dataId;
                $.ajax({
                    url: url,
                    type: 'GET',
                    success: function(result) {
                        let data = result.data;
                        $('#modalUpdate').modal('show');
                        $('.modal-title').html('Perubahan Data');
                        $('#formUpdate').html('');
                        $('#formUpdate').append(`
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="basic-default-name">Tanggal Buka</label>
                                <div class="col-sm-10">
                                    <input type="hidden" id="SiId" value="` + data.id + `">
                                    <input type="date" class="form-control" name="tgl_buka" value="` + data.tgl_buka + `">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="basic-default-name">Tanggal Tutup</label>
                                <div class="col-sm-10">
                                    <input type="date" class="form-control" name="tgl_tutup" value="` + data
                            .tgl_tutup + `">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label"
                                    for="basic-default-name">Sesi</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="sesi" value="` + data.sesi + `">
                                </div>
                            </div>
                        `);
                    },
                    error: function(result) {
                        let data = result.responseJSON
                        Swal.fire({
                            icon: data.response.icon,
                            title: data.response.title,
                            text: data.response.message,
                        });
                    }

                });
            });
            $('#buttonUpdate').on('click', function() {
                let dataId = $('#SiId').val();
                let url = `{{ config('app.url') }}` + "/api/sistem_informasi/" + dataId;
                let data = $('#formUpdate').serialize();
                let modalClose = () => {
                    $('#modalUpdate').modal('hide');
                }
                $.ajax({
                    url: url,
                    method: "patch",
                    data: data,
                    success: function(result) {
                        modalClose();
                        Swal.fire({
                            title: result.response.title,
                            text: result.response.message,
                            icon: result.response.icon,
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Oke'
                        }).then((result) => {
                            location.reload();
                        });
                    },
                    error: function(result) {
                        let data = result.responseJSON
                        modalClose();
                        Swal.fire({
                            icon: data.response.icon,
                            title: data.response.title,
                            text: data.response.message,
                        });
                    }
                });
            });

            $(document).on('click', '#deleteId', function() {
                let dataId = $(this).data('id');
                let url = `{{ config('app.url') }}` + "/api/sistem_informasi/" + dataId;
                Swal.fire({
                    title: 'Anda Yakin?',
                    text: "Data ini mungkin terhubung ke tabel yang lain!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    cancelButtonText: 'Batal',
                    confirmButtonText: 'Hapus'
                }).then((res) => {
                    if (res.isConfirmed) {
                        $.ajax({
                            url: url,
                            type: 'delete',
                            success: function(result) {
                                let data = result.data;
                                Swal.fire({
                                    title: result.response.title,
                                    text: result.response.message,
                                    icon: result.response.icon,
                                    cancelButtonColor: '#d33',
                                    confirmButtonText: 'Oke'
                                }).then((result) => {
                                    location.reload();
                                });
                            },
                            error: function(result) {
                                let data = result.responseJSON
                                Swal.fire({
                                    icon: data.response.icon,
                                    title: data.response.title,
                                    text: data.response.message,
                                });
                            }
                        });
                    }
                })
            });
        });
    </script>
@endsection
