@extends('Layout.TemplateDash')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-xl-12">
            <h4 class="text-muted">Data Dosen</h4>
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
                                        <th>Nama</th>
                                        <th>NIDN</th>
                                        <th>Jabatan</th>
                                        <th>Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $no = 1;
                                    @endphp
                                    @foreach ($judul ['judul'] as $d)
                                    <tr>
                                        <th scope="row">{{ $no++ }}</th>
                                        <td>{{ $d->mahasiswaRole->nama }}</td>
                                        <td>{{ $d->nama_judul }}</td>
                                        <td>{{ $d->descJudul }}</td>
                                        <td>
                                            <button type="button" id="editId" data-id="{{ $d->id }}"
                                                data-bs-toggle="modal" data-bs-target="#modalUpdate"
                                                class="btn rounded-pill btn-outline-primary">Edit</button>
                                            <button type="button" id="deleteId" data-id="{{ $d->id }}"
                                                class="btn rounded-pill btn-outline-danger">Delete</button>
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
                                <h5 class="mb-0">Input Data Judul</h5>
                            </div>
                            <div class="card-body">
                                <form id="formSimpan">
                                    @csrf
                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label" for="basic-default-message">Nama
                                            Mahasiswa</label>
                                        <div class="col-sm-10">
                                            <select name="id_mahasiswa" id="id_mahasiswa" class="form-control">
                                                <option selected disabled>Pilih Nama Mahasiswa</option>
                                                @foreach ($judul ['mahasiswa'] as $d)
                                                <option value="{{$d->id}}">{{$d->nama}}</option>
                                                @endforeach
                                            </select>
                                            <p class="text-danger miniAlert text-capitalize" id="alertIdMahasiswa"></p>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label" for="basic-default-name">Nama
                                            Judul</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="nama_judul" id="nama_judul"
                                                placeholder="Input Nama Judul">
                                            <p class="text-danger miniAlert text-capitalize" id="alertNamaJudul"></p>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label" for="basic-default-message">Deskripsi
                                            Judul</label>
                                        <div class="col-sm-10">
                                            <textarea name="descJudul" id="descJudul" class="form-control"
                                                placeholder="Input Deskripsi judul"
                                                aria-describedby="basic-icon-default-message2"></textarea>
                                            <p class="text-danger miniAlert text-capitalize" id="alertDescJudul"></p>
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
                let url = `{{ config('app.url') }}` + "/api/judul";
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
                            $('#alertIdMahasiswa').html(errorRes.data.id_mahasiswa);
                            $('#alertNamaJudul').html(errorRes.data.nama_judul);
                            $('#alertDescJudul').html(errorRes.data.descJudul);
                        }
                    }
                });
            });

            $(document).on('click', '#editId', function() {
                let dataId = $(this).data('id');
                let url = `{{ config('app.url') }}` + "/api/judul/" + dataId;
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
                                <label class="col-sm-2 col-form-label" for="basic-default-message">Nama
                                    Mahasiswa</label>
                                    <input type="hidden" id="judulId" value="` + data.id + `">
                                    <div class="col-sm-10">
                                    <select name="id_mahasiswa" id="id_mahasiswaUpdate" class="form-control">
                                        <option selected disabled>Pilih Nama Mahasiswa</option>
                                        @foreach ($judul ['mahasiswa'] as $d)
                                        <option value="{{$d->id}}">{{$d->nama}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="basic-default-name">Nama Judul</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="nama_judul" value="` + data.nama_judul + `">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label"
                                    for="basic-default-message">Deskripsi Judul</label>
                                <div class="col-sm-10">
                                    <textarea name="descJudul" id="descJudul" class="form-control" placeholder="Input Deskripsi judul"
                                        aria-describedby="basic-icon-default-message2">`+ data.descJudul+`</textarea>
                                </div>
                            </div>
                            `);
                            $('#id_mahasiswaUpdate').val(data.id_mahasiswa);
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
                let dataId = $('#judulId').val();
                let url = `{{ config('app.url') }}` + "/api/judul/" + dataId;
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
                let url = `{{ config('app.url') }}` + "/api/judul/" + dataId;
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