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
    <table style="border-collapse: collapse;" width="100%">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>NIM</th>
                <th>Jurusan</th>
                <th>Judul</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @php
                $no = 1;
            @endphp
            @foreach ($data as $item)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $item['nama'] }}</td>
                    <td>{{ $item['nim'] }}</td>
                    <td>{{ $item['jurusan'] }}</td>
                    <td>{{ $item['judul']['nama_judul'] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
