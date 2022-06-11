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

            $(document).on('click', '#deleteId', function() {
                let dataId = $(this).data('id');
                let url = `{{ config('app.url') }}` + "/api/jurnal/" + dataId;
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