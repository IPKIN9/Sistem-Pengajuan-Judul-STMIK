@extends('Layout.TemplateDash')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-xl-12">
            <h4 class="text-muted">Data Jurnal</h4>
            <div class="nav-align-top mb-4">
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="navs-pills-justified-home">
                        <div class="table-responsive">
                            <table class="table" id="table">
                                <thead>
                                    <tr class="text-nowrap">
                                        <th>No</th>
                                        <th style="width: 50%">Judul</th>
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
                                        <td>
                                            <a href="{{ asset('storage/jurnal/'.$d->path_file) }}"
                                                class="btn rounded-pill btn-outline-success" id="InfoId"
                                                target="_blank"><i class='bx bxs-low-vision'></i></a>
                                        </td>
                                        <td>
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
            
        });
</script>
@endsection