@extends('Layout.TemplateDash')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-xl-12">
                <h4 class="text-muted">Data Admin</h4>
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
                        <div class="tab-pane fade show active">
                            <div class="table-responsive text-nowrap">
                                <table class="table" id="table">
                                    <thead>
                                        <tr class="text-nowrap">
                                            <th style="width: 10px">No</th>
                                            <th>Usename</th>
                                            <th style="width: 25px">Opsi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $no = 1;
                                        @endphp
                                        @foreach ($user as $d)
                                            <tr>
                                                <th scope="row">{{ $no++ }}</th>
                                                <td>{{ $d->username }}</td>
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
                        <div class="tab-pane fade" id="navs-pills-justified-profile" role="tabpanel">
                            <div class="col-xxl">
                                <div class="card-header d-flex align-items-center justify-content-between">
                                    <h5 class="mb-0">Input Data Akun</h5>
                                </div>
                                <div class="card-body">
                                    <form id="formSimpan">
                                        @csrf
                                        <div class="row mb-3">
                                            <label class="col-sm-2 col-form-label"
                                                for="basic-default-message">Profile</label>
                                            <div class="col-sm-10">
                                                <div class="input-group">
                                                    <button class="btn btn-outline-primary dropdown-toggle" type="button"
                                                        data-bs-toggle="dropdown" aria-expanded="false">
                                                        Pilih Data
                                                    </button>
                                                    <ul class="dropdown-menu" style="">
                                                        <li><button type="button" id="btnData" data-id="admin"
                                                                class="dropdown-item">Admin</button></li>
                                                        <li><button type="button" id="btnData" data-id="dosen"
                                                                class="dropdown-item">Dosen</button></li>
                                                    </ul>
                                                    <select name="id_profile" id="id_profile" class="form-control">
                                                        <option selected disabled>Pilih Profile</option>
                                                    </select>
                                                    <p class="text-danger miniAlert text-capitalize" id="alertProfile"></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label class="col-sm-2 col-form-label" for="basic-default-name">Username</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="username" id="username"
                                                    placeholder="Input Username">
                                                <p class="text-danger miniAlert text-capitalize" id="alertUsername"></p>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label class="col-sm-2 col-form-label" for="basic-default-name">Password</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="password" id="password"
                                                    placeholder="Input Password">
                                                <p class="text-danger miniAlert text-capitalize" id="alertPassword"></p>
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

            $(document).on('click', '#btnData', function() {
                let _id = $(this).data('id');
                let url = '';
                if (_id == "admin") {
                    url = `{{ config('app.url') }}` + "/api/akun/admin";
                } else {
                    url = `{{ config('app.url') }}` + "/api/akun/dosen";
                }

                $.get(url, function(result) {
                    $('#id_profile').html('');
                    $.each(result, function(i, value) {
                        $('#id_profile').append(`
                        <option value="${value.id}">${value.nama}</option>
                    `)
                    })
                });

            });
            $('#saveId').on('click', function() {
                let url = `{{ config('app.url') }}` + "/api/akun/createAkun";
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
                            $('#alertProfile').html(errorRes.data.id_profile);
                            $('#alertUsername').html(errorRes.data.username);
                            $('#alertPassword').html(errorRes.data.password);
                        }
                    }
                });
            });
        })
    </script>
@endsection
