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
                                        <th>Judul</th>
                                        <th>Nama Jurnal</th>
                                        <th>Sumber</th>
                                        <th>Deskripsi Jurnal</th>
                                        <th>ISSN</th>
                                        <th>Tahun Terbit</th>
                                        <th>File</th>
                                        <th>Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $no = 1;
                                    @endphp
                                    @foreach ($jurnal ['jurnal'] as $d)
                                    <tr>
                                        <th scope="row">{{ $no++ }}</th>
                                        <td>{{ $d->judulRole->nama_judul }}</td>
                                        <td>{{ $d->nama_jurnal }}</td>
                                        <td>{{ $d->sumber }}</td>
                                        <td>{{ $d->descJurnal }}</td>
                                        <td>{{ $d->ISSN }}</td>
                                        <td>{{ $d->tahunterbit }}</td>
                                        <td>{{ $d->path_file }}</td>
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
                                <h5 class="mb-0">Input Data Jurnal</h5>
                            </div>
                            <div class="card-body">
                                <form id="formSimpan">
                                    @csrf
                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label" for="basic-default-message">Judul</label>
                                        <div class="col-sm-10">
                                            <select name="id_judul" id="id_judul" class="form-control">
                                                <option selected disabled>Pilih Judul</option>
                                                @foreach ($jurnal ['judul'] as $d)
                                                <option value="{{$d->id}}">{{$d->nama_judul}}</option>
                                                @endforeach
                                            </select>
                                            <p class="text-danger miniAlert text-capitalize" id="alertIdJudul"></p>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label" for="basic-default-name">Nama
                                            Jurnal</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="nama_jurnal" id="nama_jurnal"
                                                placeholder="Input Nama Jurnal">
                                            <p class="text-danger miniAlert text-capitalize" id="alertNamaJurnal"></p>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label" for="basic-default-message">Deskripsi
                                            Jurnal</label>
                                        <div class="col-sm-10">
                                            <textarea name="descJurnal" id="descJurnal" class="form-control"
                                                placeholder="Input Deskripsi Jurnal"
                                                aria-describedby="basic-icon-default-message2"></textarea>
                                            <p class="text-danger miniAlert text-capitalize" id="alertDescJurnal"></p>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label" for="basic-default-name">ISSN</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="ISSN" id="ISSN"
                                                placeholder="Input ISSN">
                                            <p class="text-danger miniAlert text-capitalize" id="alertISSN"></p>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label" for="basic-default-name">Tahun Terbit</label>
                                        <div class="col-sm-10">
                                            <input type="years" class="form-control" name="tahunterbit" id="tahunterbit"
                                                placeholder="Input Tahun Terbit">
                                            <p class="text-danger miniAlert text-capitalize" id="alertTahunTerbit"></p>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label" for="basic-default-name">File</label>
                                        <div class="col-sm-10">
                                            <input type="file" class="form-control" name="path_file" id="path_file">
                                            <p class="text-danger miniAlert text-capitalize" id="alertPathFile"></p>
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
            
        });
</script>
@endsection