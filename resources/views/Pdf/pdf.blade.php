<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Export PDF</title>
</head>

<body>
    <h3 style="text-align: center;">PENGUMUMAN PENGAJUAN JUDUL</h3>
    <hr>
    <table border="1" style="border-collapse: collapse; text-align: center;" width="100%">
        <thead>
            <tr>
                <th style="width: 5%; !important">No</th>
                <th style="width: 10%; !important">Nama</th>
                <th style="width: 10%; !important">NIM</th>
                <th style="width: 10%; !important">Jurusan</th>
                <th style="width: 55%; !important">Judul</th>
                <th style="width: 10%; !important">Status</th>
            </tr>
        </thead>
        <tbody>
            @php
                $no = 1;
            @endphp
            @foreach ($data as $item)
                <tr
                    style="@if ($item['judul']['status'] == 'diterima') background: #3EC70B; @else background: #F94C66; @endif !important">
                    <td>{{ $no++ }}</td>
                    <td>{{ $item['nama'] }}</td>
                    <td>{{ $item['nim'] }}</td>
                    <td>{{ $item['jurusan'] }}</td>
                    <td>{{ $item['judul']['nama_judul'] }}</td>
                    <td>
                        {{ $item['judul']['status'] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
