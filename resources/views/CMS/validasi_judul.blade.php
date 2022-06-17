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
                    console.log(result);
                    $.each(result, function(i, item) {
                        $('#table').DataTable().row.add([
                            i + 1,
                            item.mahasiswa_role.nama,
                            item.mahasiswa_role.nim,
                            item.mahasiswa_role.jurusan,
                            item.mahasiswa_role.angkatan,
                            `<td>
                                <a href="{{ config('app.url') }}/CMS/validasi_judul/${item.id_mahasiswa}">
                                    <button type="button" class="btn-sm btn rounded-pill btn-secondary">
                                        <span class="tf-icons bx bx-list-ul"></span>&nbsp; Judul
                                    </button>
                                </a>
                            </td>`
                        ]).draw();
                    });
                });
            });
        });
    </script>
@endsection
