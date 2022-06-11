@extends('Layout.TemplateDash')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-xl-12">
            <h4 class="text-muted">Data Judul Mahasiswa</h4>
            <div class="nav-align-top mb-4">
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="navs-pills-justified-home">
                        <div class="table-responsive">
                            <table class="table" id="table">
                                <thead>
                                    <tr class="text-nowrap">
                                        <th>No</th>
                                        <th>Nama Mahasiswa</th>
                                        <th>Judul</th>
                                        <th>Deskripsi Judul</th>
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
                                            <button type="button" id="infoId" data-id="{{ $d->id }}"
                                                data-bs-toggle="modal" data-bs-target="#modalUpdate"
                                                class="btn rounded-pill btn-outline-primary"><i
                                                    class='bx bxs-low-vision'></i></button>
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
             
            $(document).on('click', '#infoId', function() {
                let dataId = $(this).data('id');
                let url = `{{ config('app.url') }}` + "/api/judul/" + dataId;
                $.ajax({
                    url: url,
                    type: 'GET',
                    success: function(result) {
                        let data = result.data;
                        $("#buttonUpdate").remove();
                        $('#modalUpdate').modal('show');
                        $('.modal-title').html('Info Data');
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