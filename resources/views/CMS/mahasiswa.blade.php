@extends('Layout.TemplateDash')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            @if (session('status'))
                <div class="alert alert-primary">
                    {{ session('status') }}
                </div>
            @endif
            <div class="col-xl-12">
                <h4 class="text-muted">Data Mahasiswa</h4>
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
                                            <th></th>
                                            <th>Nama</th>
                                            <th>NIM</th>
                                            <th>Jurusan</th>
                                            <th>Handphone</th>
                                            <th>Alamat</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Angkatan</th>
                                            <th>Kelas</th>
                                            <th>Opsi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $no = 1;
                                        @endphp
                                        @foreach ($mahasiswa as $d)
                                            <tr>
                                                <th scope="row">{{ $no++ }}</th>
                                                <td>{{ $d->nama }}</td>
                                                <td>{{ $d->nim }}</td>
                                                <td>{{ $d->jurusan }}</td>
                                                <td>{{ $d->hp }}</td>
                                                <td>{{ $d->alamat }}</td>
                                                <td>{{ $d->jk }}</td>
                                                <td>{{ $d->angkatan }}</td>
                                                <td>{{ $d->kelas }}</td>
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
                                    <h5 class="mb-0">Input Data Mahasiswa</h5>
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
                                            <label class="col-sm-2 col-form-label" for="basic-default-name">NIM</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="nim" id="nim"
                                                    placeholder="Input NIM">
                                                <p class="text-danger miniAlert text-capitalize" id="alertNim"></p>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label class="col-sm-2 col-form-label"
                                                for="basic-default-message">Jurusan</label>
                                            <div class="col-sm-10">
                                                <select name="jurusan" id="jurusan" class="form-control">
                                                    <option selected disabled>Pilih Jurusan</option>
                                                    <option value="Teknik Informatika">Teknik Informatika</option>
                                                    <option value="Sistem Informasi">Sistem Informasi</option>
                                                </select>
                                                <p class="text-danger miniAlert text-capitalize" id="alertJurusan"></p>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label class="col-sm-2 col-form-label"
                                                for="basic-default-name">Handphone</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="hp" id="hp"
                                                    placeholder="Input No Handphone">
                                                <p class="text-danger miniAlert text-capitalize" id="alertHp"></p>
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label class="col-sm-2 col-form-label"
                                                for="basic-default-message">Alamat</label>
                                            <div class="col-sm-10">
                                                <textarea name="alamat" id="alamat" class="form-control" placeholder="Input alamat lengkap"
                                                    aria-describedby="basic-icon-default-message2"></textarea>
                                                <p class="text-danger miniAlert text-capitalize" id="alertAlamat"></p>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label class="col-sm-2 col-form-label" for="basic-default-message">Jenis
                                                Kelamin</label>
                                            <div class="col-sm-10">
                                                <select name="jk" id="jk" class="form-control">
                                                    <option selected disabled>Pilih Jenis Kelamin</option>
                                                    <option value="Laki-Laki">Laki-Laki</option>
                                                    <option value="Perempuan">Perempuan</option>
                                                </select>
                                                <p class="text-danger miniAlert text-capitalize" id="alertJk"></p>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label class="col-sm-2 col-form-label" for="basic-default-name">Angkatan</label>
                                            <div class="col-sm-10">
                                                <input type="number" class="form-control" name="angkatan" id="angkatan"
                                                    placeholder="Input Tahun Angkatan">
                                                <p class="text-danger miniAlert text-capitalize" id="alertAngkatan"></p>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label class="col-sm-2 col-form-label" for="basic-default-name">Kelas</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="kelas" id="kelas"
                                                    placeholder="Kelas">
                                                <p class="text-danger miniAlert text-capitalize" id="alertKelas"></p>
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
                let url = "http://127.0.0.1:8000/api/mahasiswa/";
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
                            $('#alertNim').html(errorRes.data.nim);
                            $('#alertJurusan').html(errorRes.data.jurusan);
                            $('#alertJk').html(errorRes.data.jk);
                            $('#alertHp').html(errorRes.data.hp);
                            $('#alertAlamat').html(errorRes.data.alamat);
                            $('#alertAngkatan').html(errorRes.data.angkatan);
                            $('#alertKelas').html(errorRes.data.kelas);
                        }
                    }
                });
            });

            $(document).on('click', '#editId', function() {
                let dataId = $(this).data('id');
                let url = {!! json_encode(url('/api/mahasiswa')) !!} + "/" + dataId;
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
                                    <input type="hidden" id="mahasiswaId" value="` + data.id + `">
                                    <input type="text" class="form-control" name="nama" value="` + data.nama + `"
                                        placeholder="Input Nama Lengkap">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="basic-default-name">NIM</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="nim" value="` + data.nim + `"
                                        placeholder="Input NIM">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label"
                                    for="basic-default-message">Jurusan</label>
                                <div class="col-sm-10">
                                    <select name="jurusan" id="jurusanUpdate" class="form-control">
                                        <option selected disabled>Pilih Jurusan</option>
                                        <option value="Teknik Informatika">Teknik Informatika</option>
                                        <option value="Sistem Informasi">Sistem Informasi</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label"
                                    for="basic-default-name">Handphone</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="hp" value="` + data.hp + `"
                                        placeholder="Input No Handphone">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label"
                                    for="basic-default-message">Alamat</label>
                                <div class="col-sm-10">
                                    <textarea name="alamat" class="form-control"
                                        placeholder="Input alamat lengkap"
                                        aria-describedby="basic-icon-default-message2">` + data.alamat + `</textarea>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="basic-default-message">Jenis
                                    Kelamin</label>
                                <div class="col-sm-10">
                                    <select name="jk" id="jkUpdate" class="form-control">
                                        <option selected disabled>Pilih Jenis Kelamin</option>
                                        <option value="Laki-Laki">Laki-Laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="basic-default-name">Angkatan</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" name="angkatan" value="` + data
                            .angkatan + `"
                                        placeholder="Input Tahun Angkatan"> 
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="basic-default-name">Kelas</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="kelas" value="` + data.kelas + `"
                                        placeholder="Kelas"> 
                                </div>
                            </div>
                    `);
                        $('#jurusanUpdate').val(data.jurusan);
                        $('#jkUpdate').val(data.jk);
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
                let dataId = $('#mahasiswaId').val();
                let url = {!! json_encode(url('/api/mahasiswa')) !!} + "/" + dataId;
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
