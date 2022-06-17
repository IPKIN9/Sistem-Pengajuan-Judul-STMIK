@extends('Layout.TemplateDash')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-xl-12">
                <h4 class="text-muted">Data Pengajuan Judul Mahasiswa</h4>
                <div class="nav-align-top mb-4">
                    <div class="tab-content">
                        <div class="col-md-12">
                            <div class="card mb-4">
                                <h5 class="card-header">List Mahasiswa</h5>
                                <div class="card-body demo-vertical-spacing demo-only-element">
                                    <div class="input-group input-group-merge">
                                        <span class="input-group-text" id="basic-addon-search31"><i
                                                class="bx bx-search"></i></span>
                                        <input type="text" class="form-control" placeholder="Search..."
                                            aria-label="Search..." aria-describedby="basic-addon-search31">
                                    </div>
                                    <div class="card-body">
                                        @foreach ($dbResult['data']['mahasiswa'] as $d)
                                            <figure class="mt-2">
                                                <blockquote class="blockquote">
                                                    <h5 class="mb-0">{{ $d->nama }}</h5>
                                                </blockquote>
                                                <figcaption class="blockquote-footer">
                                                    <cite title="Source Title">{{ $d->nim }}</cite>
                                                </figcaption>
                                            </figure>
                                            <hr>
                                            <dl class="row mt-2">
                                                <dt class="col-sm-4">Sistem informasi pencarian buku berbasis website</dt>
                                                <dd class="col-sm-8">A description list is perfect for defining terms.</dd>
                                            </dl>
                                            <dl class="row mt-2">
                                                <dt class="col-sm-4">Sistem informasi pencarian buku berbasis website</dt>
                                                <dd class="col-sm-8">A description list is perfect for defining terms.</dd>
                                            </dl>
                                            <dl class="row mt-2">
                                                <dt class="col-sm-4">Sistem informasi pencarian buku berbasis website</dt>
                                                <dd class="col-sm-8">A description list is perfect for defining terms.</dd>
                                            </dl>
                                        @endforeach
                                    </div>
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

        });
    </script>
@endsection
