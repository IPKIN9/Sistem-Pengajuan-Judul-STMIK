@extends('Web.UserDashboard')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Forms/</span> Pengajuan</h4>
        @if ($errors->any())
            <div class="alert alert-danger">
                <p>Data tidak berhasil disimpan, Pastikan semua field terisi</p>
            </div>
        @endif
        <!-- Basic Layout -->
        <div class="row">
            <div class="col-xl">
                <div class="card-body">
                    <figure class="text-center mt-2">
                        <blockquote class="blockquote">
                            <input required class="form-control" type="search" value="Cari Nim ..." id="search-nim">
                        </blockquote>
                        <div id="alert-found"></div>
                        <button id="btn-search-nim" class="btn btn-sm btn-info">Cari</button>
                    </figure>
                    <hr>
                    <div id="profile-view"></div>
                    <hr>
                    <form id="formInput" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" id="id_mahasiswa" name="id_mahasiswa">
                        <input type="hidden" name="id_tanggal" value="{{ $id }}">
                        <div id="formInputData"></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        });

        $(document).on('click', '#btn-search-nim', function() {
            let _id = $('#search-nim').val();
            let url = `{{ config('app.url') }}` + `/api/mahasiswa/nim/${_id}`

            $('#profile-view').html('');
            $('#formInputData').html('');

            $.ajax({
                type: 'GET',
                url: url,
                success: function(result) {
                    $('#id_mahasiswa').val(result.data.id);

                    $('#alert-found').html(`
                        <figcaption  class="blockquote-footer text-success">
                          <cite title="Source Title">${result.message}</cite>
                        </figcaption>
                      `);

                    $('#profile-view').append($(`
                      <dl class="row" style="margin-bottom: -11px">
                          <dt class="col-sm-3">Nama</dt>
                          <dd class="col-sm-9 text-muted">
                              <p>${result.data.nama}</p>
                          </dd>
                      </dl>
                      <dl class="row" style="margin-bottom: -11px">
                          <dt class="col-sm-3">Jurusan</dt>
                          <dd class="col-sm-9 text-muted">
                              <p>${result.data.jurusan}</p>
                          </dd>
                      </dl>
                      <dl class="row" style="margin-bottom: -11px">
                          <dt class="col-sm-3">Angkatan</dt>
                          <dd class="col-sm-9 text-muted">
                              <p>${result.data.angkatan}</p>
                          </dd>
                      </dl>
                    `).hide()
                        .fadeIn(300));

                    $('#formInput').attr('action', `{{ config('app.url') }}` + `/pengajuan_process`);
                    $('#formInput').attr('method', `POST`);

                    $.each([1, 2, 3], function(i, value) {
                        $('#formInputData').append($(`
                        <div class="mb-3">
                            <label class="form-label" for="basic-icon-default-fullname">Judul ${value}</label>
                            <div class="input-group input-group-merge">
                                <span id="basic-icon-default-fullname2" class="input-group-text"><i
                                        class='bx bx-info-circle'></i></span>
                                <input type="text" class="form-control" name="nama_judul[]" id=""
                                    placeholder="Judul Proposal"
                                    aria-describedby="basic-icon-default-fullname2">
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="input-group input-group-merge">
                                <span id="basic-icon-default-message2" class="input-group-text"><i
                                        class="bx bx-comment"></i></span>
                                <textarea id="basic-icon-default-message" name="descJudul[]" class="form-control"
                                    placeholder="Masukan latar belakang judul kalian sesuai dengan tema"
                                    aria-label="Masukan latar belakang judul kalian sesuai dengan tema" rows="3"></textarea>
                            </div>
                        </div>
                        <input class="form-control" type="file" name=jurnal[] id="formFile">
                        <hr>
                      `).hide()
                            .fadeIn(300));
                    });
                    $('#formInputData').append(`
                      <div class="text-center mt-2">
                        <button type="submit" class="btn btn-primary">Kirim Pengajuan<i class='bx bxs-send' ></i></button>
                      </div>
                    `);
                },
                error: function(result) {
                    $('#alert-found').html(
                        `<figcaption  class="blockquote-footer text-danger">
                          <cite title="Source Title">${result.responseJSON.message}</cite>
                        </figcaption>
                      `);
                }
            })
        })
    </script>
@endsection
