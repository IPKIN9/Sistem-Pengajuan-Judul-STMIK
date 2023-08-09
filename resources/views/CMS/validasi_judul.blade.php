@extends('Layout.TemplateDash')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-xl-12">
                <h4 class="text-muted">List Data Yang Mengajukan Judul</h4>
                <div class="nav-align-top mb-4">
                    <div class="tab-content">
                        <figure class="mb-4">
                            <blockquote class="blockquote">
                                <p class="mb-0">Pilih tanggal pengajuan</p>
                            </blockquote>
                            <div class="row">
                                <div class="col-md-4">
                                    <select class="form-select" id="selectSesi" aria-label="Default select example">
                                        <option disabled selected="">Open this select menu</option>
                                        @foreach ($data as $d)
                                            <option value="{{ $d->id }}">Sesi {{ $d->sesi }} | Tgl
                                                {{ date('d-M', strtotime($d->tgl_buka)) }} Sampai
                                                {{ date('d-M-Y', strtotime($d->tgl_tutup)) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-4" id="btnRilisPlace">
                                </div>
                            </div>
                        </figure>
                        <div class="tab-pane fade show active" id="navs-pills-justified-home" role="tabpanel">
                            <div class="table-responsive text-nowrap">
                                <table class="table" id="table">
                                    <thead>
                                        <tr class="text-nowrap">
                                            <th style="width: 15px">No</th>
                                            <th>Nama</th>
                                            <th>Nim</th>
                                            <th>Jurusan</th>
                                            <th>Angkatan</th>
                                            <th>Opsi</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tbBody">

                                    </tbody>
                                </table>
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

            $('#selectSesi').on('change', function() {
                $('#table').DataTable().clear();
                let _id = $(this).val();
                let url = `{{ config('app.url') }}` + "/api/judul_validation/" + _id;

                $.get(url, function(result) {
                    $.each(result, function(i, item) {
                        $('#table').DataTable().row.add([
                            i + 1,
                            item.mahasiswa_role.nama,
                            item.mahasiswa_role.nim,
                            item.mahasiswa_role.jurusan,
                            item.mahasiswa_role.angkatan,
                            `<td>
                                <button id="btn-detail" type="button" data-id="${item.id_mahasiswa}/${item.detail_tanggal}" class="btn-sm btn rounded-pill btn-secondary">
                                    <span class="tf-icons bx bx-list-ul"></span>&nbsp; Judul
                                </button>
                            </td>`
                        ]).draw();
                    });
                    $('#btnRilisPlace').html(`
                        <button type="button" id="btnRilis" class="btn btn-outline-primary">Rilis
                        Pengumuman</button>
                    `);
                });
            });
        });

        $(document).on('click', '#btn-detail', function() {
            let _id = $(this).data('id');
            let url = `{{ config('app.url') }}` + "/api/judul_validation/detail/" + _id;

            $.get(url, function(result) {
                $('#modalUpdate').modal('show');
                $('#formUpdate').html('');
                $('.modal-title').html('');
                $('#formUpdate').append(`
                <div class="card-body">
                    <small class="text-light fw-semibold">judul source</small>
                    <figure class="mt-2">
                    <blockquote class="blockquote">
                        <p class="mb-0">List judul mahasiswa yang mengajukan.</p>
                    </blockquote>
                    </figure>
                </div>
                <div class="card-body" id="list-judul">
                </div>
                `);
                $.each(result, function(i, item) {
                    $('#list-judul').append(`
                        <dl class="row">
                            <input type="hidden" name="idJudul[]" value="${item.id}">
                            <dt class="col-sm-4">${item.nama_judul}</dt>
                            <dd class="col-sm-8 row">
                                <p class="col-sm-8">${item.descJudul}</p>
                                <div class="col-sm-3 btn-group" role="group">
                                    <select name="status[]" id="statusId${item.id}" class="form-select form-select-sm">
                                        <option value="on_process" >Dalam Proses</option>
                                        <option value="diterima" >Diterima</option>
                                        <option value="konfirmasi" >Konfirmasi Kembali</option>
                                        <option value="ditolak" >Ditolak</option>
                                    </select>
                                </div>
                                <div class="col-sm-1 float-right">
                                    <a href="{{ asset('storage/jurnal/${item.jurnal}') }}" target="_blank"
                                        class="btn rounded-pill btn-icon btn-primary btn-sm">
                                        <i class='bx bx-cloud-download'></i>
                                    </a>
                                </div>
                            </dd>
                        </dl>
                    `);
                    $('#statusId' + item.id).val(item.status);
                });
            });
        });

        $(document).on('click', '#buttonUpdate', function() {
            let _id = 1;
            let url = `{{ config('app.url') }}` + "/api/judul_validation/" + _id;
            let data = $('#formUpdate').serialize();
            $.ajax({
                type: 'PATCH',
                url: url,
                data: data,
                success: function(result) {
                    $('#modalUpdate').modal('toggle');
                    let data = result.data;
                    Swal.fire({
                        title: result.response.title,
                        text: result.response.message,
                        icon: result.response.icon,
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Oke'
                    });
                },
                error: function(result) {
                    $('#modalUpdate').modal('toggle');
                    let data = result.responseJSON
                    Swal.fire({
                        icon: data.response.icon,
                        title: data.response.title,
                        text: data.response.message,
                    });
                }
            });
        });

        $(document).on('click', '#btnRilis', function() {
            $('#btnRilis').html(`
                <div class="spinner-border spinner-border-sm text-secondary" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
            `);
            $('#selectSesi').prop('disabled', true);
            $('#btnRilis').prop('disabled', true);

            let _id = $('#selectSesi').val();
            let url = `{{ config('app.url') }}` + "/api/sistem_informasi/" + _id;
            let data = {
                'rilis': 1
            };
            $.ajax({
                url: url,
                method: "patch",
                data: data,
                success: function(result) {
                    Swal.fire({
                        title: result.response.title,
                        text: result.response.message,
                        icon: result.response.icon,
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Oke'
                    }).then((result) => {
                        $('#btnRilis').html('Rilis Pengumuman');
                        $('#selectSesi').prop('disabled', false);
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
                    $('#btnRilis').html('Rilis Pengumuman');
                    $('#btnRilis').prop('disabled', false);
                    $('#selectSesi').prop('disabled', false);
                }
            });
        });
    </script>
@endsection
