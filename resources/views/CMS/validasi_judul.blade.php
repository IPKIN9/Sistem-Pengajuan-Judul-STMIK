@extends('Layout.TemplateDash')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-xl-12">
            <h4 class="text-muted">List Data Yang Mengajukan Judul</h4>
            <div class="nav-align-top mb-4">
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="navs-pills-justified-home" role="tabpanel">
                        <div class="table-responsive text-nowrap">
                            <table class="table" id="table">
                                <thead>
                                    <tr class="text-nowrap">
                                        <th>No</th>
                                        <th>Sesi</th>
                                        <th>Tgl Buka</th>
                                        <th>Tgl Tutup</th>
                                        <th>Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no = 1;
                                    @endphp
                                    @foreach ($data as $d)
                                    <tr>
                                        <td>{{$no++}}</td>
                                        <td>Sesi {{$d->sesi}}</td>
                                        <td>{{date('Y-m-d', strtotime($d->tgl_buka))}}</td>
                                        <td>{{date('Y-m-d', strtotime($d->tgl_tutup))}}</td>
                                        <td>
                                            @if ($d->rilis == 0)
                                            <a href="#" type="button" data-id="{{$d->id}}" class="btn btn-sm btn-info">Look</a>
                                            @else
                                            <button disabled data-id="{{$d->id}}" class="btn btn-sm btn-secondary">Look</button>
                                            @endif
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
            $.get()
        });
</script>
@endsection