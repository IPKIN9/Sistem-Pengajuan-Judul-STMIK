@extends('Layout.TemplateDash')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-xl-12">
            <h4 class="text-muted">Data Skripsi</h4>
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
                    <div class="tab-pane fade show active" id="navs-pills-justified-home">
                        <div class="table-responsive">
                            <table class="table" id="table">
                                <thead>
                                    <tr class="text-nowrap">
                                        <th>No</th>
                                        <th>Judul</th>
                                        <th>Peneliti</th>
                                        <th>Tempat Penelitian</th>
                                        <th>Abstrak</th>
                                        <th>Pembimbing 1</th>
                                        <th>Pembimbing 2</th>
                                        <th>Tanggal Terbit</th>
                                        <th>Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $no = 1;
                                    @endphp
                                    @foreach ($skripsi as $d)
                                    <tr>
                                        <th scope="row">{{ $no++ }}</th>
                                        <td>{{ $d->nama_judul }}</td>
                                        <td>{{ $d->peneliti }}</td>
                                        <td>{{ $d->tempat_penelitian }}</td>
                                        <td>{{ $d->abstrak }}</td>
                                        <td>{{ $d->pembimbing1 }}</td>
                                        <td>{{ $d->pembimbing2 }}</td>
                                        <td>{{ $d->tgl_terbit }}</td>
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
                                <h5 class="mb-0">Input Data Skripsi</h5>
                            </div>
                            <div class="card-body">
                                <form id="formSimpan">
                                    @csrf
                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label" for="basic-default-message">Judul</label>
                                        <div class="col-sm-10">
                                            <textarea name="nama_judul" id="nama_judul" class="form-control"
                                                placeholder="Input Judul"
                                                aria-describedby="basic-icon-default-message2"></textarea>
                                            <p class="text-danger miniAlert text-capitalize" id="alertNamaJudul"></p>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label" for="basic-default-name">Peneliti</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="peneliti" id="peneliti"
                                                placeholder="Input Peneliti">
                                            <p class="text-danger miniAlert text-capitalize" id="alertPeneliti"></p>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label" for="basic-default-name">Tempat
                                            Penelitian</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="tempat_penelitian"
                                                id="tempat_penelitian" placeholder="Input Tempat Penelitian">
                                            <p class="text-danger miniAlert text-capitalize" id="alertTempatPenelitian">
                                            </p>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label"
                                            for="basic-default-message">Abstrak</label>
                                        <div class="col-sm-10">
                                            <textarea name="abstrak" id="abstrak" class="form-control"
                                                placeholder="Input Abstrak"
                                                aria-describedby="basic-icon-default-message2"></textarea>
                                            <p class="text-danger miniAlert text-capitalize" id="alertAbstrak"></p>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label" for="basic-default-name">Pembimbing
                                            1</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="pembimbing1" id="pembimbing1"
                                                placeholder="Input Pembimbing 1">
                                            <p class="text-danger miniAlert text-capitalize" id="alertPembimbing1"></p>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label" for="basic-default-name">Pembimbing
                                            2</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="pembimbing2" id="pembimbing2"
                                                placeholder="Input Pembimbing 2">
                                            <p class="text-danger miniAlert text-capitalize" id="alertPembimbing2"></p>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label" for="basic-default-name">Tanggal
                                            Terbit</label>
                                        <div class="col-sm-10">
                                            <input type="date" class="form-control" name="tgl_terbit" id="tgl_terbit"
                                                placeholder="Input Tanggal Terbit">
                                            <p class="text-danger miniAlert text-capitalize" id="alertTanggalTerbit">
                                            </p>
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
                let url = `{{ config('app.url') }}` + "/api/skripsi";
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
                            $('#alertNamaJudul').html(errorRes.data.nama_judul);
                            $('#alertPeneliti').html(errorRes.data.peneliti);
                            $('#alertTempatPenelitian').html(errorRes.data.tempat_penelitian);
                            $('#alertAbstrak').html(errorRes.data.abstrak);
                            $('#alertPembimbing1').html(errorRes.data.pembimbing1);
                            $('#alertPembimbing2').html(errorRes.data.pembimbing2);
                            $('#alertTanggalTerbit').html(errorRes.data.tgl_terbit);
                        }
                    }
                });
            });
        });
</script>
@endsection