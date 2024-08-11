@php
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=export_gaji_per_jabatan.xls");
@endphp

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Laporan Data Jabatan</title>

    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td,
        th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }
    </style>
</head>

<body>
    <h2 style="text-align: center">Laporan Data Jabatan</h2>
    <hr>
    <table>
        <tr>
            <th>NO.</th>
            <th>NAMA JABATAN</th>
            <th>GAJI POKOK</th>
            <th>TUNJANGAN</th>
            <th>UANG MAKAN</th>
        </tr>
        @php
        $no = 1;
        @endphp
        @foreach ($jabatan as $jb)
        <tr>
            <td>{{ $no++ }}</td>
            <td>{{ $jb->nama_jabatan }}</td>
            <td>{{ $jb->gapok_jabatan }}</td>
            <td>{{ $jb->tunjangan_jabatan }}</td>
            <td>{{ $jb->uang_makan_perhari }}</td>
        </tr>
        @endforeach
    </table>
</body>

</html>