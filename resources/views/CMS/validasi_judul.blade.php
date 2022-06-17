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
                            <div class="col-md-4">
                                <select class="form-select" id="selectSesi" aria-label="Default select example">
                                    <option disabled selected="">Open this select menu</option>
                                    @foreach ($data as $d)
                                        <option value="1">Sesi {{ $d->sesi }} | Tgl
                                            {{ date('d-M', strtotime($d->tgl_buka)) }} Sampai
                                            {{ date('d-M-Y', strtotime($d->tgl_tutup)) }}</option>
                                    @endforeach
                                </select>
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
                });
            });
        });

        $(document).on('click', '#btn-detail', function() {
            let _id = $(this).data('id');
            let url = `{{ config('app.url') }}` + "/api/judul_validation/detail/" + _id;

            $.get(url, function(result) {
                $('#modalUpdate').modal('show');
                $('#buttonUpdate').remove();
                $('#formUpdate').html('');
                $('.modal-title').html('');
                $('#formUpdate').append(`
                <div class="card-body">
                    <small class="text-light fw-semibold">judul source</small>
                    <figure class="mt-2">
                    <blockquote class="blockquote">
                        <p class="mb-0">List judul mahasiswa yang mengajukan.</p>
                    </blockquote>
                    <figcaption class="blockquote-footer">
                        Someone famous in <cite title="Source Title">Source Title</cite>
                    </figcaption>
                    </figure>
                </div>
                <div class="card-body" id="list-judul">
                </div>
                `);
                $.each(result, function(i, item) {
                    $('#list-judul').append(`
                        <dl class="row">
                            <dt class="col-sm-3">${item.nama_judul}</dt>
                            <dd class="col-sm-9">
                                <p>${item.descJudul}</p>
                            </dd>
                        </dl>
                    `);
                });
            });
        })
    </script>
@endsection
