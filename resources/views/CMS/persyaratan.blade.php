@extends('Layout.TemplateDash')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-xl-12">
                <h4 class="text-muted">Data Persyaratan</h4>
                <div class="nav-align-top mb-4">
                    <div class="tab-content">
                        <div class="col-xxl">
                            <div class="card-header d-flex align-items-center justify-content-between">
                                <h5 class="mb-0">Data Persyaratan</h5>
                            </div>
                            <div class="card-body">
                                <form id="formSimpan" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label"
                                            for="basic-default-message">Persyaratan</label>
                                        <div class="col-sm-10">
                                            <textarea name="persyaratan" id="persyaratan" class="form-control" placeholder="Input Persyaratan"
                                                aria-describedby="basic-icon-default-message2" rows="8">
@if ($data != null)
@nl2br($data->persyaratan)
@endif
</textarea>
                                            <p class="text-danger miniAlert text-capitalize" id="alertPersyaratan"></p>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label" for="basic-default-name">Format File</label>
                                        <div class="col-sm-6">
                                            <input type="file" class="form-control" name="format_file" id="format_file"
                                                placeholder="Upload File">
                                            <input type="hidden" name="old_file"
                                                value="@if ($data != null) {{ $data->format_file }} @else kosong @endif">
                                            <p class="text-danger miniAlert text-capitalize" id="alertFormatFile"></p>
                                        </div>
                                        <label class="col-sm-2 col-form-label" for="basic-default-name">Download
                                            File</label>
                                        <div class="col-sm-2">
                                            <a href="@if ($data != null) {{ asset('storage/format_file/' . $data->format_file) }} @endif"
                                                class="btn rounded-pill btn-outline-primary" id="InfoId"
                                                target="_blank"><i class='bx bxs-cloud-download'></i></a>
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
                let url = `{{ config('app.url') }}` + "/api/persyaratan";
                let data = new FormData($('#formSimpan')[0]);
                $.ajax({
                    url: url,
                    method: "POST",
                    data: data,
                    cache: false,
                    contentType: false,
                    processData: false,
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
                            $('#alertPersyaratan').html(errorRes.data.persyaratan);
                            $('#alertFormatFile').html(errorRes.data.format_file);
                        }
                    }
                });
            });
        });
    </script>
@endsection
