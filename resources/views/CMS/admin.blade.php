@extends('Layout.TemplateDash')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-xl-12">
            <h4 class="text-muted">Data Admin</h4>
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
                                        <th>Jabatan</th>
                                        <th>NIDN</th>
                                        <th>Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $no = 1;
                                    @endphp
                                    @foreach ($admin as $d)
                                    <tr>
                                        <th scope="row">{{ $no++ }}</th>
                                        <td>{{ $d->nama }}</td>
                                        <td>{{ $d->nidn }}</td>
                                        <td>{{ $d->jabatan }}</td>
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
                                <h5 class="mb-0">Input Data Admin</h5>
                            </div>
                            <div class="card-body">
                                <form id="formSimpan">
                                    @csrf
                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label" for="basic-default-name">Nama</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="nama" id="nama"
                                                placeholder="Input Nama Lengkap">
                                            <p class="text-danger miniAlert text-capitalize" id="alertNama"></p>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label" for="basic-default-name">Jabatan</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="jabatan" id="jabatan"
                                                placeholder="Input Jabatan">
                                            <p class="text-danger miniAlert text-capitalize" id="alertJabatan"></p>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label" for="basic-default-name">NIDN</label>
                                        <div class="col-sm-10">
                                            <input type="number" class="form-control" name="nidn" id="nidn"
                                                placeholder="Input NIDN">
                                            <p class="text-danger miniAlert text-capitalize" id="alertNidn"></p>
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
                let url = `{{ config('app.url') }}` + "/api/admin";
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
                            $('#alertNama').html(errorRes.data.nama);
                            $('#alertJabatan').html(errorRes.data.jabatan);
                            $('#alertNidn').html(errorRes.data.nidn);
                        }
                    }
                });
            });

            $(document).on('click', '#editId', function() {
                let dataId = $(this).data('id');
                let url = `{{ config('app.url') }}` + "/api/admin/" + dataId;
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
                                <label class="col-sm-2 col-form-label" for="basic-default-name">Nama</label>
                                <div class="col-sm-10">
                                    <input type="hidden" id="adminId" value="` + data.id + `">
                                    <input type="text" class="form-control" name="nama" value="` + data.nama + `">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label"
                                    for="basic-default-name">Jabatan</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="jabatan" value="` + data.jabatan + `">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="basic-default-name">NIDN</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="nidn" value="` + data.nidn + `">
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
                let dataId = $('#adminId').val();
                let url = `{{ config('app.url') }}` + "/api/admin/" + dataId;
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
        });
</script>
@endsection